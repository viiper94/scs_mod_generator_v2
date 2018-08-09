<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed' => json_decode(file_get_contents(resource_path('lang/json/'.basename(__DIR__).'.json')), true)['auth']['failed'],
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',

];
