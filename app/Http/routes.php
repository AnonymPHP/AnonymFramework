<?php

/**
 * This file belongs to the AnoynmFramework
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 * Thanks for using
 */

Route::when('/blog', function ($route) {

    get('/{page:int}', function () {
        return view('welcome');
    });

    get('/blog-search', function () {
        return view('welcome');
    });

});