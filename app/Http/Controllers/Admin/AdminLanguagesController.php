<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Language;
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

}