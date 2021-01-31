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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'Frontend\FrontendController@index')->name('index');
Route::get('about-us', 'Frontend\FrontendController@aboutUs')->name('about.Us');
Route::get('contact-us', 'Frontend\FrontendController@contactUs')->name('contact.Us');

Route::prefix('user')->group(function(){
    Route::get('view', 'Backend\UserController@view')->name('user.view');
    Route::get('add', 'Backend\UserController@add')->name('user.add');
    Route::post('store', 'Backend\UserController@store')->name('user.store');
    Route::get('edit/{id}', 'Backend\UserController@edit')->name('user.edit');
    Route::post('update/{id}', 'Backend\UserController@update')->name('user.update');
    Route::get('delete/{id}', 'Backend\UserController@delete')->name('user.delete');
});


Route::prefix('profile')->group(function(){
    Route::get('view', 'Backend\ProfileController@view')->name('profile.view');
    Route::get('edit', 'Backend\ProfileController@edit')->name('profile.edit');
    Route::post('update', 'Backend\ProfileController@update')->name('profile.update');
    Route::get('password/view/', 'Backend\ProfileController@passwordView')->name('profile.password.view');
    Route::post('password/update/', 'Backend\ProfileController@passwordUpdate')->name('profile.password.update');
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('logo')->group(function(){
    Route::get('view', 'Backend\LogoController@view')->name('logo.view');
    Route::get('add', 'Backend\LogoController@add')->name('logo.add');
    Route::post('store', 'Backend\LogoController@store')->name('logo.store');
    Route::get('edit/{id}', 'Backend\LogoController@edit')->name('logo.edit');
    Route::post('update/{id}', 'Backend\LogoController@update')->name('logo.update');
    Route::get('delete/{id}', 'Backend\LogoController@delete')->name('logo.delete');
});

Route::prefix('slider')->group(function(){
    Route::get('view', 'Backend\SliderController@view')->name('slider.view');
    Route::get('add', 'Backend\SliderController@add')->name('slider.add');
    Route::post('store', 'Backend\SliderController@store')->name('slider.store');
    Route::get('edit/{id}', 'Backend\SliderController@edit')->name('slider.edit');
    Route::post('update/{id}', 'Backend\SliderController@update')->name('slider.update');
    Route::get('delete/{id}', 'Backend\SliderController@delete')->name('slider.delete');
});
Route::prefix('mission')->group(function(){
    Route::get('view', 'Backend\MissionController@view')->name('mission.view');
    Route::get('add', 'Backend\MissionController@add')->name('mission.add');
    Route::post('store', 'Backend\MissionController@store')->name('mission.store');
    Route::get('edit/{id}', 'Backend\MissionController@edit')->name('mission.edit');
    Route::post('update/{id}', 'Backend\MissionController@update')->name('mission.update');
    Route::get('delete/{id}', 'Backend\MissionController@delete')->name('mission.delete');
});

Route::prefix('vision')->group(function(){
    Route::get('view', 'Backend\VisionController@view')->name('vision.view');
    Route::get('add', 'Backend\VisionController@add')->name('vision.add');
    Route::post('store', 'Backend\VisionController@store')->name('vision.store');
    Route::get('edit/{id}', 'Backend\VisionController@edit')->name('vision.edit');
    Route::post('update/{id}', 'Backend\VisionController@update')->name('vision.update');
    Route::get('delete/{id}', 'Backend\VisionController@delete')->name('vision.delete');
});


Route::prefix('news_events')->group(function(){
    Route::get('view', 'Backend\NewsEventController@view')->name('news_events.view');
    Route::get('add', 'Backend\NewsEventController@add')->name('news_events.add');
    Route::post('store', 'Backend\NewsEventController@store')->name('news_events.store');
    Route::get('edit/{id}', 'Backend\NewsEventController@edit')->name('news_events.edit');
    Route::post('update/{id}', 'Backend\NewsEventController@update')->name('news_events.update');
    Route::get('delete/{id}', 'Backend\NewsEventController@delete')->name('news_events.delete');
});