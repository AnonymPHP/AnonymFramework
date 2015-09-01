<?php
/**
 * This file belongs to the AnoynmFramework
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 * Thanks for using
 */

use Anonym\Support\Arr;
use Anonym\Facades\View;
use Anonym\Facades\Config;
use Anonym\Facades\Route;
use Anonym\Facades\Session;
use Anonym\Facades\App;
use Anonym\Facades\Cookie;

if (!function_exists('value')) {
    /**
     * Return the default value of the given value.
     *
     * @param  mixed $value
     * @return mixed
     */
    function value($value)
    {
        return $value instanceof Closure ? $value() : $value;
    }
}

if (!function_exists('data_get')) {
    /**
     * return the value
     *
     * @param array $target
     * @param string|array $keys
     * @param callable|null $default
     */
    function data_get($target = [], $keys = '', $default = null)
    {
        if (is_object($target)) {
            $target = (array)$target;
        }

        if (is_array($keys)) {
            $keys = join(',', $keys);
        }

        Arr::get($target, $keys, $default);
    }
}


if (!function_exists('first')) {


    /**
     * get a first value in an array
     *
     * @param mixed $target
     * @return mixed
     */
    function first($target)
    {
        // target must be an array
        if (!is_array($target)) {
            $target = (array)$target;
        }
        // target is required to have a value.
        if (count($target)) {
            return array_values($target)[0];
        } else {
            return false;
        }
    }
}

/**
 * | **********************
 * |
 * | checks if there is or not the same function
 * |
 * | **************************
 */
if (!function_exists('view')) {

    /**
     * create and return a new view object
     *
     * @param string $file the file name
     * @param array $parameters the paramaters to be sent
     * @return mixed
     */
    function view($file = '', $parameters = [])
    {
        return View::make($file, $parameters);
    }
}

/**
 * | **********************
 * |
 * | checks if there is or not the same function
 * |
 * | **************************
 */
if (!function_exists('config')) {

    /**
     * work with config files
     *
     * @param string $name the name of config
     * @param mixed $set if it is not equal, these values will be set the config file
     * @return mixed
     */
    function config($name, $set = null)
    {
        return null === $set ? Config::get($name) : Config::set($name, $set);
    }

}

/**
 * | **********************
 * |
 * | checks if there is or not the same function
 * |
 * | **************************
 */
if (!function_exists('get')) {

    /**
     * Works with route collector. this function add a new get route
     *
     * @param string $uri
     * @param array|string|\Closure $action
     * @return mixed
     */
    function get($uri, $action)
    {
        return Route::get($uri, $action);
    }
}

/**
 * | **********************
 * |
 * | checks if there is or not the same function
 * |
 * | **************************
 */
if (!function_exists('post')) {

    /**
     * Works with route collector. this function add a new post route
     *
     * @param string $uri
     * @param array|string|\Closure $action
     * @return mixed
     */
    function post($uri, $action)
    {
        return Route::post($uri, $action);
    }
}


/**
 * | **********************
 * |
 * | checks if there is or not the same function
 * |
 * | **************************
 */
if (!function_exists('put')) {

    /**
     * Works with route collector. this function add a new put route
     *
     * @param string $uri
     * @param array|string|\Closure $action
     * @return mixed
     */
    function put($uri, $action)
    {
        return Route::put($uri, $action);
    }
}

/**
 * | **********************
 * |
 * | checks if there is or not the same function
 * |
 * | **************************
 */
if (!function_exists('any')) {

    /**
     * Works with route collector. this function add a new any route
     *
     * @param string $uri
     * @param array|string|\Closur $action
     * @return mixed
     */
    function any($uri, $action)
    {
        return Route::any($uri, $action);
    }
}

/**
 * | **********************
 * |
 * | checks if there is or not the same function
 * |
 * | **************************
 */
if (!function_exists('options')) {

    /**
     * Works with route collector. this function add a new options route
     *
     * @param string $uri
     * @param array|string|\Closure $action
     * @return mixed
     */
    function options($uri, $action)
    {
        return Route::options($uri, $action);
    }
}

/**
 * | **********************
 * |
 * | checks if there is or not the same function
 * |
 * | **************************
 */
if (!function_exists('delete')) {

    /**
     * Works with route collector. this function add a new options route
     *
     * @param string $uri
     * @param array|string|\Closure $action
     * @return mixed
     */
    function delete($uri, $action)
    {
        return Route::delete($uri, $action);
    }
}

/**
 * | **********************
 * |
 * | checks if there is or not the same function
 * |
 * | **************************
 */
if (!function_exists('match')) {

    /**
     * Register a new route with the given verbs.
     *
     * @param  array|string $methods
     * @param  string $uri
     * @param  \Closure|array|string $action
     * @return $this
     */
    function match($methods, $uri, $action)
    {
        Route::match($methods, $uri, $action);
    }
}

/**
 * | **********************
 * |
 * | checks if there is or not the same function
 * |
 * | **************************
 */
if (!function_exists('patch')) {

    /**
     * Works with route collector. this function add a new patch route
     *
     * @param string $uri
     * @param array|string $action
     * @return mixed
     */
    function patch($uri, $action)
    {
        return Route::patch($uri, $action);
    }
}

/**
 * | **********************
 * |
 * | checks if there is or not the same function
 * |
 * | **************************
 */
if (!function_exists('session')) {

    /**
     * works with session facade,
     * does session get or set process
     *
     * @param null $get the name of get, if set is null, return the Session::get
     * @param null $set if it is not null return Session::set
     * @return mixed
     */
    function session($get = null, $set = null)
    {
        if ($get !== null && $set === null) {
            return Session::get($get);
        } elseif ($get !== null && $set !== null) {
            return Session::set($get, $set);
        } else {
            return App::make('session');
        }
    }
}

/**
 * | **********************
 * |
 * | checks if there is or not the same function
 * |
 * | **************************
 */
if (!function_exists('cookie')) {

    /**
     * works with session facade,
     * does session get or set process
     *
     * @param null $get the name of get, if set is null, return the Session::get
     * @param null $set if it is not null return Session::set
     * @return mixed
     */
    function cookie($get = null, $set = null)
    {
        if ($get !== null && $set === null) {
            return Cookie::get($get);
        } elseif ($get !== null && $set !== null) {
            return Cookie::set($get, $set);
        } else {
            return App::make('cookie');
        }
    }
}
