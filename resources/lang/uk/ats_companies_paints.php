<?php

$locale = json_decode(file_get_contents(resource_path('lang/locale/'.basename(__DIR__).'.json')), true);
$lang = json_decode(file_get_contents(resource_path('lang/json/'.basename(__DIR__).'.json')), true);
$static = json_decode(file_get_contents(resource_path('lang/json/static.json')), true);

$lang_arr = key_exists('companies/paints', $lang) ? $lang['companies/paints'] : [];
$shared_arr = key_exists('shared', $lang) ? $lang['shared'] : [];
$static_arr = key_exists('companies/paints', $static) ? $static['companies/paints'] : [];
$locale_arr = key_exists('companies/paints', $locale) ? $locale['companies/paints'] : [];

return array_merge($shared_arr, $locale_arr, $lang_arr, $static_arr);
