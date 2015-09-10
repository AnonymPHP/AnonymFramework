<?php
/**
 * This file belongs to the AnoynmFramework
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 * Thanks for using
 */

get('/', function(){
    return view('welcome');
});


get('/test', ['_controller' => 'Index:boot', '_middleware' => [
     'name' => 'user.auth'
]]);