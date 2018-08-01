<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'TrailerGeneratorController@index');

Route::get('/gallery', 'GalleryController@index');

Route::post('/gallery', 'GalleryController@getInfo');

//Route::get('/db', function(){
//    $chassis_collection = \App\Chassis::where('game', 'ats')->get();
//    foreach($chassis_collection as $chassis){
//        if(stripos($chassis->alias, 'magnitude_55l') === false ){
//            $chassis->alias_short = str_replace(['_default', '_black', '_yellow', '_red', '_blue', '_grey', '_1', '_4', '_3'], '', $chassis->alias);
//        }else{
//            $chassis->alias_short = $chassis->alias;
//        }
//        $chassis->save();
//    }
//    return 'Ready';
//});
