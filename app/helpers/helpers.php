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


if(!function_exists('first'))
{


    /**
     * get a first value in an array
     *
     * @param mixed $target
     * @return mixed
     */
    function first($target)
    {
        // target must be an array
        if(!is_array($target))
        {
            $target = (array) $target;
        }
        // target is required to have a value.
        if (count($target)) {
            return array_values($target)[0];
        }else{
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
if(!function_exists('view'))
{

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
if(!function_exists('config'))
{

    /**
     * work with config files
     *
     * @param string $name the name of config
     * @param mixed $set   if it is not equal, these values will be set the config file
     * @return mixed
     */
     function config($name,  $set = null)
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
     * @param array|string $action
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
if (!function_exists('get')) {

    /**
     * Works with route collector. this function add a new get route
     *
     * @param string $uri
     * @param array|string $action
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
     * Works with route collector. this function add a new get route
     *
     * @param string $uri
     * @param array|string $action
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
     * Works with route collector. this function add a new get route
     *
     * @param string $uri
     * @param array|string $action
     * @return mixed
     */
    function put($uri, $action)
    {
        return Route::put($uri, $action);
    }
}
