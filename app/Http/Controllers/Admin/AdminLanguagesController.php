<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Language;
use App\OneSky;
use Illuminate\Http\Request;

class AdminLanguagesController extends Controller{

    public function index(){
        return view('admin.languages.index', [
            'languages' => Language::all()
        ]);
    }

    public function delete(Request $request, $id = null){
        $language = Language::find($id);
        return $language->delete() ?
            redirect()->route('languages')->with(['success' => 'Мову успішно видалено!']) :
            redirect()->route('languages')->withErrors(['Не вдалось видалити мову']);
    }

    public function toggle(Request $request, $id = null){
        $language = Language::find($id);
        $language->active = $language->active == '1' ? '0' : '1';
        return $language->save() ?
            redirect()->route('languages')->with(['success' => 'Виконано!']) :
            redirect()->route('languages')->withErrors(['Виникла помилка!']);
    }

    public function add(Request $request){
        if($request->method() === 'POST'){
            $language = new Language();
            $this->validate($request, [
                'locale' => 'required|string',
                'title' => 'required|string',
            ]);
            $language->fill([
                'locale' => $request->input('locale'),
                'title' => $request->input('title'),
                'active' => $request->input('active') == 'on',
            ]);
            return $language->save() ?
                redirect()->route('languages')->with(['success' => 'Мову успішно додано!']) :
                redirect()->back()->withErrors(['Не вдалось додати мову']);
        }

        return view('admin.languages.add');
    }

    public function upload(){
        $oneSky = new OneSky();
        return $oneSky->uploadFile() ?
            redirect()->route('languages')->with(['success' => 'Виконано!']) :
            redirect()->route('languages')->withErrors(['Виникла помилка!']);
    }

    public function download(Request $request, $locale){
        $oneSky = new OneSky();
        if(!isset($locale)) return redirect()->back()->withErrors(['Виникла помилка!']);
        if($locale === 'all'){
            $locales = Language::where('active', true)->get();
            foreach($locales as $lang){
                if($lang->locale !== 'en'){
                    if(!$oneSky->exportTranslations($lang->locale)){
                        return redirect()->route('languages')->withErrors(['Виникла помилка!']);
                    }
                }
            }
            return redirect()->route('languages')->with(['success' => 'Виконано!']);
        }else{
            return $oneSky->exportTranslations($locale) ?
                redirect()->route('languages')->with(['success' => 'Виконано!']) :
                redirect()->route('languages')->withErrors(['Виникла помилка!']);
        }
    }

    public function import($locale = null){
        $asoc = [
            'uk' => 'uk_uk',
            'de' => 'de_de',
            'cs' => 'cs_cz',
            'da' => 'da_dk',
            'el' => 'el_gr',
            'en' => 'en_gb',
            'es' => 'es_es',
            'fr' => 'fr_fr',
            'it' => 'it_it',
            'hr' => 'hr_hr',
            'ja' => 'ja_jp',
            'ka' => 'ka_ge',
            'ko' => 'ko_kr',
            'nl' => 'nl_nl',
            'nn' => 'no_no',
            'pl' => 'pl_pl',
            'pt' => 'pt_pt',
            'ro' => 'ro_ro',
            'ru' => 'ru_ru',
            'tr' => 'tr_tr',
            'zh' => 'zh_cn',
        ];

        foreach($asoc as $lang => $locale){
            $ets2Content = file_get_contents(resource_path('files/locale.scs/ets2/'.$locale.'/local.sii')).
                file_get_contents(resource_path('files/locale.scs/ets2/'.$locale.'/local.override.sii'));
            $atsContent = file_get_contents(resource_path('files/locale.scs/ats/'.$locale.'/local.sii')).
                file_get_contents(resource_path('files/locale.scs/ats/'.$locale.'/local.override.sii'));
            $content = $ets2Content.$atsContent;

            $aliases = json_decode(file_get_contents(resource_path('files/alias_to_cn.json')), true);
            $result = array();
            foreach($aliases as $type => $cn_arr){
                foreach($cn_arr as $cn){
                    $pattern = '%key\[\]:\s"'.$cn.'"\n\tval\[\]:\s"([^"]+)"\n%';
                    preg_match($pattern, $content, $matches);
                    if(!isset($matches[1])) dd('"'.$cn.'" not found!');
                    $result[$type][$cn] = trim($matches[1]);
                }
            }

            file_put_contents(resource_path('lang/locale/'.$lang.'.json'), json_encode($result, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT ));

        }

        return redirect()->route('languages')->with(['success' => 'Виконано!']);

    }

}
