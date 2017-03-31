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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['prefix' => 'v1'], function () {

//    Route::group(['middleware' => 'auth:api'], function () {

        Route::group(['prefix' => 'post'], function () {

            Route::post('/', 'ApiController@storePost'); // create
            Route::get('/{id?}', 'ApiController@showPost'); // read
            Route::put('/', 'ApiController@updatePost'); // update
            Route::delete('/{id}', 'ApiController@destroyPost'); // delete
        });

        Route::group(['prefix' => 'user'], function () {

            Route::post('/', 'ApiController@storeUser'); // create
            Route::get('/{id?}', 'ApiController@showUser'); // read
            Route::put('/', 'ApiController@updateUser'); // update
            Route::delete('/{id}', 'ApiController@destroyUser'); // delete
        });
//    });
});

//Route::group(['prefix' => 'api'], function () {
//
//    Route::group(['prefix' => 'v1'], function () {
//
//        Route::group(['prefix' => 'post'], function () {
//
//            Route::post('/', 'ApiController@storePost'); // create
//            Route::get('/{id?}', 'ApiController@showPost'); // read
//            Route::put('/', 'ApiController@updatePost'); // update
//            Route::delete('/{id}', 'ApiController@destroyPost'); // delete
//        });
//
//        Route::group(['prefix' => 'user'], function () {
//
//            Route::post('/', 'ApiController@storeUser'); // create
//            Route::get('/{id?}', 'ApiController@showUser'); // read
//            Route::put('/', 'ApiController@updateUser'); // update
//            Route::delete('/{id}', 'ApiController@destroyUser'); // delete
//        });
//    });
//});