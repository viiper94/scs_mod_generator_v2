<?php

use App\Language;

class I18n{

	private static $defaultLang = 'en';
	private static $localesPerLang = [
		'ru' => ['ru', 'uk', 'be', 'kk', 'mo', 'ky', 'lv', 'lt', 'et', 'ka', 'az', 'hy', 'uz', 'tk'],
		'de' => ['de', 'da', 'nl'],
		'fr' => ['fr'],
		'es' => ['es', 'pt'],
		'pt' => ['pt', 'es'],
		'tr' => ['tr', 'ro', 'mk']
	];

	public static function t($name, $lang = null){
		$lang ? : $lang = self::getUserLanguage();
		if($string = self::findString($name, $lang)){
			return $string;
		}else{
		    if($string = self::findString($name, self::$defaultLang)){
                return $string;
            }
			return $name;
		}
	}

	private static function findString($name, $lang){
		$strings = json_decode(file_get_contents('../resources/lang/'.$lang.'.json'), true);
		foreach($strings as $group){
			if(array_key_exists($name, $group)){
				return $group[$name];
			}
		}
		return false;
	}

	public static function getUserLanguage(){
		$languages = Language::where('active', '1')->get();
		$languages = $languages->toArray();
		if(!isset($_COOKIE['lang'])){
            $user_langs = self::getUserAcceptLanguage();
			foreach($user_langs as $lang){
				if(key_exists($lang, $languages)) return $lang;
			}
			$lang = self::$defaultLang;
			foreach($user_langs as $user_lang){
				foreach(self::$localesPerLang as $language => $locales){
					if(in_array($user_lang, $locales)) $lang = $language;
				}
			}
			return $lang;
		}else{
			$lang = $_COOKIE['lang'];
		}
		return $lang;
	}

    public static function getUserAcceptLanguage($get_first = false){
        $user_langs = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
        $user_langs = array_filter($user_langs, function($v){
            return stripos($v, ';') || strlen($v) === 2;
        });
        foreach($user_langs as $key => $value){
            $user_langs[$key] = substr($value, 0, 2);
        }
        return $get_first ? array_shift($user_langs) : array_unique($user_langs);
    }

}