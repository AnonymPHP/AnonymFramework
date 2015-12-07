<?php

/**
 * This file belongs to the AnoynmFramework
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 * Thanks for using
 */



Route::get(
    '/',
    function () {
        Session::set('aa', 'bb');
        return view('welcome');
    }
);

