<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::group(['prefix' => 'home'], function() {
// 	Route::get('/products/latest', 'HomeController@getLatestProduct');
// });

Route::group(['prefix' => 'cart'], function() {
	Route::post('/bulk/update', 'CartController@updateBulkToCart');
	Route::post('/installation', 'CartController@updateInstallation');
	Route::post('/delete/{id}', 'CartController@destroy');
});

Route::group(['prefix' => 'shop'], function() {
	Route::get('/categories', 'ProductController@getCategories');
	Route::get('/products', 'ProductController@getProducts');
});

Route::group(['prefix' => 'product'], function() {
	Route::get('/', 'ProductController@show');
});

Route::group(['prefix' => 'home'], function() {
	Route::post('/check/auth', 'HomeController@checkAuth');
	Route::get('/download/{product}', 'HomeController@downloadImage');
});

Route::group(['prefix' => 'order'], function() {
	Route::post('/', 'OrderController@store');
	Route::get('/completed', 'OrderController@thankyou');
});

