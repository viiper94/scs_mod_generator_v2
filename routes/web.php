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

Route::group(['middleware' => 'admin', 'namespace' => 'Admin'], function () {

    Route::any('/admin/{controller}/{action}/{id?}', function($controller, $action, $id = null){
        $app = app();
        $controller = $app->make('\App\Http\Controllers\Admin\Admin'.ucfirst($controller).'Controller');
        return $controller->callAction($action, $parameters = array(Request::instance(), $id));
    });

    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::get('/admin/trailers', 'AdminTrailersController@index')->name('trailers');
    Route::get('/admin/accessories', 'AdminController@accessories')->name('accessories');
    Route::get('/admin/paint_jobs', 'AdminController@paintJobs')->name('paint_jobs');
    Route::get('/admin/wheels', 'AdminController@wheels')->name('wheels');
    Route::get('/admin/dlc', 'AdminController@dlc')->name('dlc');
    Route::get('/admin/mods', 'AdminController@mods')->name('mods');
    Route::get('/admin/languages', 'AdminController@languages')->name('languages');
    Route::get('/admin/users', 'AdminController@users')->name('users');
});

Route::get('/{game?}/{d?}', 'TrailerGeneratorController@index');
Route::post('/{game?}', 'TrailerGeneratorController@getChassisData');