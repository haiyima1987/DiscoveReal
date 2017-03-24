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
    'as' => 'news'
]);

Route::group(['prefix' => 'post'], function () {

    Route::get('/view/{post}', [
        'uses' => 'PostController@viewPost',
        'as' => 'post.view'
    ]);

    Route::group(['middleware' => 'auth'], function () {

        Route::get('/showCreate', [
            'uses' => 'PostController@createPost',
            'as' => 'post.create'
        ]);

        Route::post('/publish', [
            'uses' => 'PostController@publishPost',
            'as' => 'post.publish'
        ]);


        Route::get('/showEdit/{post}', [
            'uses' => 'PostController@editPost',
            'as' => 'post.edit'
        ]);

        Route::put('/update/{post}', [
            'uses' => 'PostController@updatePost',
            'as' => 'post.update'
        ]);

        Route::delete('/remove/{post}', [
            'uses' => 'PostController@removePost',
            'as' => 'post.remove'
        ]);

        Route::get('/pageToPdf/{post}', [
            'uses' => 'PostController@generatePdfFromView',
            'as' => 'post.viewToPdf'
        ]);

        Route::get('/getPostImages/{id}', [
            'uses' => 'ImageController@getPostImages',
            'as' => 'post.getPostImages'
        ]);

        Route::post('/postImageUpload', [
            'uses' => 'ImageController@postImageUpload',
            'as' => 'post.imageUpload',
        ]);

        Route::post('/postImageDelete', [
            'uses' => 'ImageController@postImageDelete',
            'as' => 'post.imageDelete'
        ]);
    });
});

Route::resource('test', 'TestController');

//Route::get('/a', ['as' => 'upload', 'uses' => 'ImageController@getUpload']);
//Route::post('upload', ['as' => 'upload-post', 'uses' => 'ImageController@postUpload']);
//Route::post('upload/delete', ['as' => 'upload-remove', 'uses' => 'ImageController@deleteUpload']);

Route::group(['prefix' => 'comment'], function () {

    Route::group(['middleware' => 'auth'], function () {

        Route::post('/publish/{post}', [
            'uses' => 'CommentController@publishComment',
            'as' => 'comment.publish'
        ]);
    });
});

Route::group(['prefix' => 'user'], function () {

    Route::get('/allPosts/{user}', [
        'uses' => 'UserController@viewAllPosts',
        'as' => 'user.allPosts'
    ]);

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

        Route::post('/updateImg/{user}', [
            'uses' => 'ImageController@profileImageUpload',
            'as' => 'user.updateImg'
        ]);

        Route::get('/viewProfile', [
            'uses' => 'UserController@viewProfile',
            'as' => 'user.viewProfile'
        ]);

        Route::get('/editProfile', [
            'uses' => 'UserController@editProfile',
            'as' => 'user.editProfile'
        ]);

        Route::put('/updateProfile', [
            'uses' => 'UserController@updateProfile',
            'as' => 'user.updateProfile'
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

Route::group(['prefix' => 'api'], function () {

    Route::group(['prefix' => 'v1'], function () {

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
    });
});
