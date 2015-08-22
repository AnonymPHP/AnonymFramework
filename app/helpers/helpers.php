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
/**
 * get the callable value
 *
 * @param callable $callback
 * @return mixed
 */
function value($callback = null)
{
    if(is_callable($callback))
    {
        return call_user_func($callback);
    }elseif(is_array($callback)){
        return array_values($callback)[0];
    }else{
        return $callback;
    }
}

/**
 * @param array $target
 * @param string|array $keys
 * @param callable|null $default
 */
function data_get($target = [], $keys = '', $default = null)
{
    if(is_object($target))
    {
        $target = (array) $target;
    }

    if(is_array($keys))
    {
        $keys = join(',', $keys);
    }

    Arr::get($target, $keys, $default);
}
