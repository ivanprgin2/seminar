<?php

# Static Pages. Redirecting admin so admin cannot access these pages.
Route::group(['middleware' => ['redirectAdmin']], function()
{
    Route::get('/', ['as' => 'home', 'uses' => 'PagesController@getHome']);
    Route::get('about', ['as' => 'about', 'uses' => 'PagesController@getAbout']);
    Route::get('contact', ['as' => 'contact', 'uses' => 'PagesController@getContact']);
});

# Registration
Route::group(['middleware' => 'guest'], function()
{
    Route::get('register', 'RegistrationController@create');
    Route::post('register', ['as' => 'registration.store', 'uses' => 'RegistrationController@store']);
});

# Authentication
Route::get('login', ['as' => 'login', 'middleware' => 'guest', 'uses' => 'SessionsController@create']);
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::resource('sessions', 'SessionsController' , ['only' => ['create','store','destroy']]);

# Forgotten Password
Route::group(['middleware' => 'guest'], function()
{
    Route::get('forgot_password', 'Auth\PasswordController@getEmail');
    Route::post('forgot_password','Auth\PasswordController@postEmail');
    Route::get('reset_password/{token}', 'Auth\PasswordController@getReset');
    Route::post('reset_password/{token}', 'Auth\PasswordController@postReset');
});

# Standard User Routes
Route::group(['middleware' => ['auth','standardUser']], function()
{
    Route::get('user', ['as' => 'userPage', 'uses' => 'StandardUser\StandardUserController@getUserProtected']);
    Route::resource('profiles', 'StandardUser\UsersController', ['only' => ['show', 'edit', 'update']]);
    Route::resource('standardUser/popis', 'StandardUser\StandardUserPopisController', ['only' => ['index', 'show']]);
    Route::resource('standardUser/video', 'StandardUser\StandardUserVideosController', ['only' => ['index', 'show']]);
});

# Admin Routes
Route::group(['middleware' => ['auth', 'admin']], function()
{
    Route::get('admin', ['as' => 'admin_dashboard', 'uses' => 'Admin\AdminController@getHome']);
    Route::resource('admin/profiles', 'Admin\AdminUsersController', ['only' => ['index', 'show', 'edit', 'update', 'destroy']]);
    Route::resource('admin/autori', 'Admin\AdminAutorController', ['only' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']]);
    Route::resource('admin/video', 'Admin\AdminVideoController', ['only' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']]);
    Route::resource('admin/zanrovi', 'Admin\AdminZanrController', ['only' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']]);
    Route::resource('admin/popis', 'Admin\AdminPopisController', ['only' => ['index', 'show', 'edit', 'update', 'destroy']]);
});

