<?php

$lang = json_decode(file_get_contents(resource_path('lang/json/'.basename(__DIR__).'.json')), true);
$static = json_decode(file_get_contents(resource_path('lang/json/static.json')), true);

$lang_arr = key_exists('wheels', $lang) ? $lang['wheels'] : [];
$static_arr = key_exists('wheels', $static) ? $static['wheels'] : [];

return array_merge($lang_arr, $static_arr);