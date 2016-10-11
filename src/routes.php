<?php

Route::group([

    'prefix' => 'admin/users',
    'as' => 'admin.users.',
    'namespace' => 'CodePress\CodeUser\Controllers',
    'middleware' => ['web']

], function () {

    Route::get('', 'Admin\UsersControllers@index')
        ->name('index');

    Route::get('/create', 'Admin\UsersControllers@create')
        ->name('create');

    Route::post('/store', 'Admin\UsersControllers@store')
        ->name('store');

    Route::get('/{id}/edit/', 'Admin\UsersControllers@edit')
        ->name('edit');

    Route::post('/{id}/update', 'Admin\UsersControllers@update')
        ->name('update');

    Route::get('/{id}/delete/', 'Admin\UsersControllers@delete')
        ->name('delete');

});