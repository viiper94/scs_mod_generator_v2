<?php

$lang = json_decode(file_get_contents(resource_path('lang/json/'.basename(__DIR__).'.json')), true);
$static = json_decode(file_get_contents(resource_path('lang/json/static.json')), true);

$lang_arr = key_exists('general', $lang) ? $lang['general'] : [];
$static_arr = key_exists('general', $static) ? $static['general'] : [];

return array_merge($lang_arr, $static_arr);