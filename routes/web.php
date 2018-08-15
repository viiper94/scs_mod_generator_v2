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

Route::post('/color/generate', 'TruckPaintGeneratorController@generate')->name('color_generator');
Route::get('/color/{game?}/{d?}', 'TruckPaintGeneratorController@index');
Route::post('/color/{game?}', 'TruckPaintGeneratorController@getDLC')->name('color');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/profile/edit', 'ProfileController@edit')->name('profile_edit');
Route::post('/profile/edit', 'ProfileController@editProfile')->name('save_profile');
Route::post('/profile/edit/password', 'ProfileController@editPassword')->name('save_password');

Route::get('/{game?}/{d?}', 'TrailerGeneratorController@index');
Route::post('/{game?}', 'TrailerGeneratorController@getChassisData');