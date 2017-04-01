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

Route::get('/news', [
    'uses' => 'HomeController@showNews',
    'as' => 'news'
]);

Route::group(['prefix' => 'post'], function () {

    Route::get('/view/{post}', [
        'uses' => 'PostController@viewPost',
        'as' => 'post.view'
    ]);

    Route::group(['middleware' => 'auth'], function () {

        Route::post('/showCreate', [
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

Route::group(['prefix' => 'comment'], function () {

    Route::group(['middleware' => 'auth'], function () {

        Route::post('/publish/{post}', [
            'uses' => 'CommentController@publishComment',
            'as' => 'comment.publish'
        ]);

        Route::get('/edit/{comment}', [
            'uses' => 'CommentController@editComment',
            'as' => 'comment.edit'
        ]);

        Route::put('/update/{comment}', [
            'uses' => 'CommentController@updateComment',
            'as' => 'comment.update'
        ]);

        Route::delete('/remove/{comment}', [
            'uses' => 'CommentController@removeComment',
            'as' => 'comment.remove'
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

Route::group(['prefix' => 'messages'], function () {

    Route::get('/', [
        'as' => 'messages',
        'uses' => 'MessagesController@index'
    ]);

    Route::get('create/{user}', [
        'as' => 'messages.create',
        'uses' => 'MessagesController@create'
    ]);

    Route::post('/', [
        'as' => 'messages.store',
        'uses' => 'MessagesController@store'
    ]);

    Route::get('{id}', [
        'as' => 'messages.show',
        'uses' => 'MessagesController@show'
    ]);

    Route::put('{id}', [
        'as' => 'messages.update',
        'uses' => 'MessagesController@update'
    ]);
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

Route::group(['prefix' => 'admin'], function () {

    Route::group(['middleware' => 'admin'], function () {

        Route::group(['prefix' => 'user'], function () {

            Route::get('/', [
                'uses' => 'AdminController@showAllUsers',
                'as' => 'admin.users'
            ]);

            Route::delete('/delete/{user}', [
                'uses' => 'AdminController@destroyUser',
                'as' => 'admin.deleteUser'
            ]);
        });

        Route::group(['prefix' => 'post'], function () {

            Route::get('/posts', [
                'uses' => 'AdminController@showAllPosts',
                'as' => 'admin.posts'
            ]);

            Route::get('/viewPost/{post}', [
                'uses' => 'AdminController@viewPost',
                'as' => 'admin.viewPost'
            ]);
        });

        Route::group(['prefix' => 'news'], function () {

            Route::get('/', [
                'uses' => 'AdminController@showAllNews',
                'as' => 'admin.news'
            ]);

            Route::get('/create', [
                'uses' => 'AdminController@createNews',
                'as' => 'admin.createNews'
            ]);

            Route::post('/publish', [
                'uses' => 'AdminController@publishNews',
                'as' => 'admin.publishNews'
            ]);

            Route::get('/edit/{news}', [
                'uses' => 'AdminController@editNews',
                'as' => 'admin.editNews'
            ]);

            Route::put('/update/{news}', [
                'uses' => 'AdminController@updateNews',
                'as' => 'admin.updateNews'
            ]);

            Route::delete('/delete/{news}', [
                'uses' => 'AdminController@destroyNews',
                'as' => 'admin.deleteNews'
            ]);
        });
    });
});