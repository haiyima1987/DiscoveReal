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

Route::get('/', [
    'uses' => 'HomeController@showHome',
    'as' => 'home',
]);

// two routes combined, with or without parameters
Route::get('/countries/{id?}', [
    'uses' => 'HomeController@showCountries',
    'as' => 'countries'
]);

Route::get('/about', [
    'uses' => 'HomeController@showAboutUs',
    'as' => 'aboutUs'
]);

Route::group(['prefix' => 'post'], function () {

//    Route::group(['middleware' => 'auth'], function () {

        Route::get('/showCreate', [
            'uses' => 'PostController@createPost',
            'as' => 'post.create'
        ]);

        Route::post('/publish', [
            'uses' => 'PostController@publishPost',
            'as' => 'post.publish'
        ]);

        Route::get('/view/{id}', [
            'uses' => 'PostController@viewPost',
            'as' => 'post.view'
        ]);

        Route::get('/showEdit/{id}', [
            'uses' => 'PostController@editPost',
            'as' => 'post.edit'
        ]);

        Route::put('/update/{id}', [
            'uses' => 'PostController@updatePost',
            'as' => 'post.update'
        ]);

        Route::delete('/remove/{id}', [
            'uses' => 'PostController@removePost',
            'as' => 'post.remove'
        ]);
//    });
});

Route::group(['prefix' => 'user'], function () {

    Route::group(['middleware' => 'guest'], function () {

        Route::get('/signup', [
            'uses' => 'UserController@showSignup',
            'as' => 'user.signup'
        ]);

        Route::post('/signUpUser', [
            'uses' => 'UserController@signUpUser',
            'as' => 'user.signUpUser'
        ]);

        Route::get('/login', [
            'uses' => 'UserController@showLogin',
            'as' => 'user.login'
        ]);

        Route::post('/logInUser', [
            'uses' => 'UserController@logInUser',
            'as' => 'user.logInUser'
        ]);
    });

    Route::group(['middleware' => 'auth'], function () {

        Route::get('/profile', [
            'uses' => 'UserController@showProfile',
            'as' => 'user.profile'
        ]);

        Route::get('/logout', [
            'uses' => 'UserController@logOutUser',
            'as' => 'user.logOutUser'
        ]);
    });
});

Route::group(['prefix' => 'password'], function () {

    Route::group(['middleware' => 'guest'], function () {

        Route::get('/requestForm', [
            'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm',
            'as' => 'password.requestForm'
        ]);

        Route::post('/email', [
            'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail',
            'as' => 'password.email'
        ]);

        Route::get('/reset/{token}', [
            'uses' => 'Auth\ResetPasswordController@showResetForm',
            'as' => 'password.resetForm'
        ]);

        Route::post('/reset', [
            'uses' => 'Auth\ResetPasswordController@reset',
            'as' => 'password.reset'
        ]);
    });
});