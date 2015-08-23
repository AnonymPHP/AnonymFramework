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

