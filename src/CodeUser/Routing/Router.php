<?php

namespace CodePress\CodeUser\Routing;

use Illuminate\Support\Facades\Route;

class Router
{
    public function auth()
    {
        $namespace = "\\CodePress\\CodeUser\\Controllers";

        Route::group([
            'namespace' => null
        ], function () use ($namespace) {

            // Authentication Routes...
            Route::get("login", "$namespace\\Auth\\AuthController@showLoginForm")->name("login");
            Route::post("login", "$namespace\\Auth\\AuthController@login");
            Route::post("logout", "$namespace\\Auth\\AuthController@logout");

            // Password Reset Routes...
            Route::get("password/reset", "$namespace\\Auth\\PasswordController@showLinkRequestForm");
            Route::post("password/email", "$namespace\\Auth\\PasswordController@sendResetLinkEmail");
            Route::get("password/reset/{token}", "$namespace\\Auth\\PasswordController@showResetForm");
            Route::post("password/reset", "$namespace\\Auth\\PasswordController@reset");

        });

    }
}