<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('city', 'Ecommerce\CartController@getCity'); //ROUTE API UNTUK /CITY
Route::get('district', 'Ecommerce\CartController@getDistrict'); //ROUTE API UNTUK /DISTRICT
Route::post('cost', 'Ecommerce\CartController@getCourier');

//api for mobile app
Route::get('two-first-categories', 'Api\CategoryController@twoFirstData');
Route::get('two-second-categories', 'Api\CategoryController@twoSecondData');
Route::get('one-last-categories', 'Api\CategoryController@oneLastData');
Route::get('get-products-by-category/{categoryId}', 'Api\ProductController@getProductsByCategoryId');
Route::get('get-products-by-keyword/{searchKeyword}', 'Api\ProductController@getProductsBySearchKeyword');

Route::get('categories', 'Api\CategoryController@index');
Route::get('products', 'Api\ProductController@index');