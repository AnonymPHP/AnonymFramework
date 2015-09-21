<?php

/**
 * This file belongs to the AnoynmFramework
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 * Thanks for using
 */

Route::when('/admin', function () {
     Route::get('/login', function(){
          return view('welcome');
     });
});
