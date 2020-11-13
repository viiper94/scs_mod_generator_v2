<?php

$locale = json_decode(file_get_contents(resource_path('lang/locale/'.basename(__DIR__).'.json')), true);
$lang = json_decode(file_get_contents(resource_path('lang/json/'.basename(__DIR__).'.json')), true);
$static = json_decode(file_get_contents(resource_path('lang/json/static.json')), true);

$locale_arr = key_exists('accessories', $locale) ? $locale['accessories'] : [];
$shared_arr = key_exists('shared', $lang) ? $lang['shared'] : [];
$lang_arr = key_exists('accessories', $lang) ? $lang['accessories'] : [];
$static_arr = key_exists('accessories', $static) ? $static['accessories'] : [];

return array_merge($locale_arr, $shared_arr, $lang_arr, $static_arr);
