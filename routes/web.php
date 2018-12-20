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

Route::get('/', 'HomeController@index');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes(['verify' => true]);

Route::get('info', function() {
	phpinfo();
});

Route::get('/home', 'HomeController@index');
Route::get('/shop', 'HomeController@index2');

Route::group(['prefix' => 'home'], function() {
	Route::post('/products/latest', 'HomeController@getLatestProduct');
});

Route::group(['prefix' => 'cart'], function() {
	Route::post('/index', 'CartController@index');
	Route::post('/add/{product}', 'CartController@addToCart');
	Route::get('/', 'CartController@viewCart');
});

Route::group(['prefix' => 'checkout'], function() {
	Route::get('/', 'CheckoutController@index');
});

Route::group(['prefix' => 'product'], function() {
	Route::get('/{product}', 'ProductController@show');
});
