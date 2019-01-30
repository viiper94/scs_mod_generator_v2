<?php

namespace App\Http\Middleware;

use App\Language;
use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class I18n{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public $defaultLang = 'en';
    public $userAcceptLangs;
    public $languages;
    private $localesPerLang = [
        'ru' => ['ru', 'uk', 'be', 'kk', 'mo', 'ky', 'lv', 'lt', 'et', 'ka', 'az', 'hy', 'uz', 'tk'],
        'de' => ['de', 'da', 'nl'],
        'fr' => ['fr'],
        'es' => ['es', 'pt'],
        'pt' => ['pt', 'es'],
        'tr' => ['tr', 'ro', 'mk'],
        'hr' => ['hr', 'bs', 'sr']
    ];

    public function handle($request, Closure $next){
        $this->userAcceptLangs = $this->getUserAcceptLanguage();
        $this->languages = Language::where('active', '1')->orderBy('locale')->get()->keyBy('locale')->toArray();

        App::setLocale($_COOKIE['lang'] ?? $this->getUserLanguage());
        view()->share([
            'hasUserAcceptLanguage' => $this->hasUserAcceptLanguage(),
            'languages' => $this->languages
        ]);

        return $next($request);
    }

    public function getUserLanguage(){
        if(Auth::check()){
            $user = Auth::user();
            if($user->language) return $user->language;
        }
        foreach($this->userAcceptLangs as $lang){
            if(key_exists($lang, $this->languages)) return $lang;
        }
        $lang = $this->defaultLang;
        foreach($this->userAcceptLangs as $user_lang){
            foreach($this->localesPerLang as $language => $locales){
                if(in_array($user_lang, $locales)) $lang = $language;
            }
        }
        return $lang;
    }

    public function getUserAcceptLanguage(){
        $user_langs = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
        $user_langs = array_filter($user_langs, function($v){
            return stripos($v, ';') || strlen($v) === 2;
        });
        foreach($user_langs as $key => $value){
            $user_langs[$key] = substr($value, 0, 2);
        }
        return array_unique($user_langs);
    }

    private function hasUserAcceptLanguage(){
        return key_exists(array_shift($this->userAcceptLangs), $this->languages);
    }

}