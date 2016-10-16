<?php

Route::group([

    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'CodePress\CodeUser\Controllers',
    'middleware' => ['web', 'auth']

], function () {

    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {

        Route::get('', 'Admin\UsersController@index')->name('index');

        Route::get('/create', 'Admin\UsersController@create')->name('create');

        Route::post('/store', 'Admin\UsersController@store')->name('store');

        Route::get('/{id}/edit/', 'Admin\UsersController@edit')->name('edit');

        Route::post('/{id}/update', 'Admin\UsersController@update')->name('update');

        Route::get('/{id}/delete/', 'Admin\UsersController@delete')->name('delete');

    });

    Route::group(['prefix' => 'roles', 'as' => 'roles.'], function () {

        Route::get('', 'Admin\RolesController@index')->name('index');

        Route::get('/create', 'Admin\RolesController@create')->name('create');

        Route::post('/store', 'Admin\RolesController@store')->name('store');

        Route::get('/{id}/edit/', 'Admin\RolesController@edit')->name('edit');

        Route::post('/{id}/update', 'Admin\RolesController@update')->name('update');

        Route::get('/{id}/delete/', 'Admin\RolesController@delete')->name('delete');

    });

    Route::group(['prefix' => 'permissions', 'as' => 'permissions.'], function () {

        Route::get('', 'Admin\PermissionsController@index')->name('index');

        Route::get('/{id}/show', 'Admin\PermissionsController@show')->name('show');

    });

});