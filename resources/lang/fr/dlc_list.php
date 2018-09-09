<?php

$lang = json_decode(file_get_contents(resource_path('lang/json/'.basename(__DIR__).'.json')), true);
$static = json_decode(file_get_contents(resource_path('lang/json/static.json')), true);

$lang_arr = key_exists('dlc list', $lang) ? $lang['dlc list'] : [];
$static_arr = key_exists('dlc list', $static) ? $static['dlc list'] : [];

return array_merge($lang_arr, $static_arr);