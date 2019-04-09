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

Route::group(['middleware' => 'i18n'], function(){
    Auth::routes();
    Route::get('auth/steam', 'Auth\SteamAuthController@redirectToSteam')->name('auth.steam');
    Route::get('auth/steam/handle', 'Auth\SteamAuthController@handle')->name('auth.steam.handle');
    Route::get('auth/google', 'Auth\LoginController@redirectToGoogle')->name('auth.google');
    Route::get('auth/google/handle', 'Auth\LoginController@handleGoogleCallback');

    Route::post('/generator', 'TrailerGeneratorController@generate')->name('generator');

    Route::get('/gallery', 'GalleryController@index')->name('gallery');
    Route::post('/gallery', 'GalleryController@getInfo');

    Route::post('/color/generate', 'TruckPaintGeneratorController@generate')->name('color_generator');
    Route::get('/color/{game?}/{d?}', 'TruckPaintGeneratorController@index');
    Route::post('/color/{game?}', 'TruckPaintGeneratorController@getDLC')->name('color');

    Route::get('/profile/{id}/mods', 'ProfileController@mods')->name('profile_mods_admin');
    Route::get('/profile/mods', 'ProfileController@mods')->name('profile_mods');
    Route::post('/profile/mods', 'ProfileController@getModInfo');
    Route::post('/admin/mods', 'ProfileController@getModInfo');
    Route::get('/profile/steam', 'Auth\SteamAuthController@redirectToSteam')->name('profile.steam');
    Route::get('/profile/mod_broken/{id?}', 'ProfileController@modBroken')->name('mod_broken');
    Route::post('/profile/edit/password', 'ProfileController@editPassword')->name('save_password');
    Route::post('/profile/edit/settings', 'ProfileController@editSettings')->name('save_settings');
    Route::get('/profile/edit', 'ProfileController@edit')->name('profile_edit');
    Route::post('/profile/edit', 'ProfileController@editProfile')->name('save_profile');
    Route::get('/profile/{id?}', 'ProfileController@index')->name('profile');
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::post('/profile', 'ProfileController@getModInfo');

    Route::get('/mods/{game?}', 'StaticModsController@index')->name('static_mods');

    Route::group(['middleware' => 'admin', 'namespace' => 'Admin'], function () {

        Route::any('/admin/{controller}/{action}/{id?}', function($controller, $action, $id = null){
            $app = app();
            try{
                $controller_name = explode('_', $controller);
                $fixed_name = array();
                foreach($controller_name as $name){
                    $fixed_name[] = ucfirst($name);
                }
                $controller = implode('', $fixed_name);

                $controller = $app->make('\App\Http\Controllers\Admin\Admin'.ucfirst($controller).'Controller');
                if(!method_exists($controller, $action)) throw new ReflectionException();;
                return $controller->callAction($action, $parameters = array(Request::instance(), $id));
            }catch(ReflectionException $e){
                abort(404);
            }
        });

        Route::get('/admin', 'AdminController@index')->name('admin');
        Route::get('/admin/trailers', 'AdminTrailersController@index')->name('trailers');
        Route::get('/admin/accessories', 'AdminAccessoriesController@index')->name('accessories');
        Route::get('/admin/paints', 'AdminPaintsController@index')->name('paints');
        Route::get('/admin/companies', 'AdminCompaniesController@index')->name('companies');
        Route::get('/admin/wheels', 'AdminWheelsController@index')->name('wheels');
        Route::get('/admin/dlc', 'AdminDlcController@index')->name('dlc');
        Route::get('/admin/mods', 'AdminModsController@index')->name('mods');
        Route::get('/admin/static_mods', 'AdminStaticModsController@index')->name('admin_static_mods');
        Route::get('/admin/languages', 'AdminLanguagesController@index')->name('languages');
        Route::get('/admin/users', 'AdminController@users')->name('users');
    });

    Route::get('/{game?}/{d?}', 'TrailerGeneratorController@index');
    Route::post('/{game?}', 'TrailerGeneratorController@getChassisData');
});
