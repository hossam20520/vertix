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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'DashboardController@index')->name('home');

Route::get('/service', function(){
return view('service');
});

Route::get('/dahboard', 'DashboardController@DashShow');


Route::post('/save_projects', 'DashboardController@SaveProjects')->name('save_projects');

Route::post('/upload_image', 'DashboardController@uploadMainImages')->name('upload_image');

