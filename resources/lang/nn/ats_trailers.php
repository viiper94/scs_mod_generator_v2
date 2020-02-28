<?php

$locale = json_decode(file_get_contents(resource_path('lang/locale/'.basename(__DIR__).'.json')), true);
$lang = json_decode(file_get_contents(resource_path('lang/json/'.basename(__DIR__).'.json')), true);
$static = json_decode(file_get_contents(resource_path('lang/json/static.json')), true);

$shared_arr = key_exists('shared', $lang) ? $lang['shared'] : [];
$locale_arr = key_exists('ats trailers', $locale) ? $locale['ats trailers'] : [];
$lang_arr = key_exists('ats trailers', $lang) ? $lang['ats trailers'] : [];
$static_arr = key_exists('ats trailers', $static) ? $static['ats trailers'] : [];

return array_merge($shared_arr, $locale_arr, $lang_arr, $static_arr);
