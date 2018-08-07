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

//Route::get('/db', function(){
//    $dlc = Dlc::where('active', 1)->find([1, 3]);
//    return $dlc;
//});

Auth::routes();

Route::post('/generator', 'TrailerGeneratorController@generate')->name('generator');

Route::get('/gallery', 'GalleryController@index');

Route::post('/gallery', 'GalleryController@getInfo')->name('gallery');

Route::get('/{game?}', 'TrailerGeneratorController@index');

Route::post('/{game?}', 'TrailerGeneratorController@getChassisData');