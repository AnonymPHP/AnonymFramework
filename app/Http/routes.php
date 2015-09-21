<?php

/**
 * This file belongs to the AnoynmFramework
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 * Thanks for using
 */

Route::group('admin', [], function(){
    Route::get('/admin/login', function(){
         return view('welcome');
    });
});