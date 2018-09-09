<?php

$lang = json_decode(file_get_contents(resource_path('lang/json/'.basename(__DIR__).'.json')), true);
$static = json_decode(file_get_contents(resource_path('lang/json/static.json')), true);

$lang_arr = key_exists('ets2 companies/paints', $lang) ? $lang['ets2 companies/paints'] : [];
$static_arr = key_exists('ets2 companies/paints', $static) ? $static['ets2 companies/paints'] : [];

return array_merge($lang_arr, $static_arr);