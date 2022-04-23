<?php

use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

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
Route::group(['middleware' => 'auth'],

	function () {
		Route::any('logout', 'Auth\LoginController@logout')->name('web.logout');
	});

Route::get('/m', function () {
	return view('welcome');
});


Route::prefix('view')->group(function () {

	Route::get('/{brand?}/{model?}', 'Front\HomeController@model')->name('model');

});
Route::prefix('ios')->group(function () {

	Route::get('/{brand}/{type}/{model}/{baseband}/{vers}', 'Front\HomeController@appleDownload')->name('apple');

});
Route::prefix('android')->group(function () {

	Route::get('/{brand}/{type}/{model}/{csc?}/{baseband?}', 'Front\HomeController@download')->name('download');

});
Route::get('/', 'Front\HomeController@index');
Route::get('/{brand}/{type}/{model}', 'Front\HomeController@show')->name('show');
Route::get('/{brand}/{type}', 'Front\HomeController@categories')->name('categories');
Route::get('/search', 'Front\HomeController@search')->name('search');


Route::middleware(ProtectAgainstSpam::class)->group(function () {
	Auth::routes(['verify' => true]);

});