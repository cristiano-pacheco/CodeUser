<?php

Route::group([

    'prefix' => 'admin/users',
    'as' => 'admin.users.',
    'namespace' => 'CodePress\CodeUser\Controllers',
    'middleware' => ['web']

], function () {

    Route::get('', 'Admin\UsersController@index')
        ->name('index');

    Route::get('/create', 'Admin\UsersController@create')
        ->name('create');

    Route::post('/store', 'Admin\UsersController@store')
        ->name('store');

    Route::get('/{id}/edit/', 'Admin\UsersController@edit')
        ->name('edit');

    Route::post('/{id}/update', 'Admin\UsersController@update')
        ->name('update');

    Route::get('/{id}/delete/', 'Admin\UsersController@delete')
        ->name('delete');

});