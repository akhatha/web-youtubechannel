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
Route::get('/home', 'HomeController@index');
Route::get('/upload', 'HomeController@upload');
Route::get('/videoupload', 'HomeController@videoupload');
Route::post('/videouploadaction', 'HomeController@videouploadaction');
Route::post('/videothumbnail', 'ThumbnailTest@testThumbnail');
Route::get('/trending', 'HomeController@trending');
Route::get('/history', 'HomeController@history');
Route::get('/edit_profile', 'ProfileController@edit_profile');
Route::post('/upload-video', 'HomeController@uploadvideo');

Route::post('/upload-video/getVideoName', 'HomeController@getVideoName');

//admin Route
Route::get('/vizzdeoadmin', 'LoginController@index');
Route::get('/vizzdeoadmin/dashboard', 'LoginController@postLogin');

Route::post('/vizzdeoadmin/dashboard', 'LoginController@postLogin');

Route::get('vizzdeoadmin/revenuemonthly', 'AdminController@getRevenueMonthly');