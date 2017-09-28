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
/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return redirect('/index');
});



Auth::routes();
Route::get('/index', 'BaseController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/upload', 'HomeController@upload')->name('home');
Route::post('/upload-video', 'HomeController@uploadvideo')->name('home');

Route::post('/upload-video/getVideoName', 'HomeController@getVideoName');

