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
use Anonym\Facades\Event;
use Anonym\Facades\Csrf;
use Anonym\Support\Str;
use Illuminate\Contracts\Support\Htmlable;


/**
 * | **********************
 * |
 * | checks if there is or not the same function
 * |
 * | **************************
 */
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

/**
 * | **********************
 * |
 * | checks if there is or not the same function
 * |
 * | **************************
 */
if (!function_exists('e')) {
    /**
     * Escape HTML entities in a string.
     *
     * @param  \Illuminate\Support\Htmlable|string $value
     * @return string
     */
    function e($value)
    {
        if ($value instanceof Htmlable) {
            return $value->toHtml();
        }

        return htmlentities($value, ENT_QUOTES, 'UTF-8', false);
    }
}

/**
 * | **********************
 * |
 * | checks if there is or not the same function
 * |
 * | **************************
 */
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

/**
 * | **********************
 * |
 * | checks if there is or not the same function
 * |
 * | **************************
 */
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
     * @param array $parameters the parameters for $language files
     * @return mixed
     */
    function view($file = '', $parameters = [], $mergeParameters = [])
    {
        return $file !== '' ? View::make($file, $parameters, $mergeParameters) : app('view');
    }
}

/**
 * | **********************
 * |
 * | checks if there is or not the same function
 * |
 * | **************************
 */
if (!function_exists('lang')) {

    /**
     * get language parameter
     *
     * @param string $lang
     * @return mixed
     */
    function lang($lang = '')
    {
        return View::lang($lang);
    }

}

/**
 * | **********************
 * |
 * | checks if there is or not the same function
 * |
 * | **************************
 */
if (!function_exists('assign')) {

    /**
     * add a parameter to view bag
     *
     * @param string $name
     * @param string $value
     * @return mixed
     */
    function assign($name = '', $value = '')
    {
        return View::with($name, $value);
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
    function config($name = '', $set = null)
    {

        if ('' === $name) {
            return App::make('config');
        }

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

/**
 * | **********************
 * |
 * | checks if there is or not the same function
 * |
 * | **************************
 */
if (!function_exists('forever')) {
    /**
     * set cookie with very long time value
     *
     * @param string $name
     * @param string $value
     * @return Cookie
     */
    function forever($name, $value = '')
    {
        if (is_string($name) && is_string($value)) {
            return cookie()->forever($name, $value);
        } else {
            throw new InvalidArgumentException('Cookie name or value must be a string');
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
if (!function_exists('event')) {

    /**
     * execute the event
     *
     * @param mixed $event
     * @param array $parameters
     * @return mixed
     */
    function event($event, array $parameters = [])
    {
        return Event::fire($event, $parameters);
    }
}

/**
 * | **********************
 * |
 * | checks if there is or not the same function
 * |
 * | **************************
 */
if (!function_exists('listen')) {

    /**
     * add a new event
     *
     * @param string $name
     * @param Closure|null $callback
     * @return mixed
     */
    function listen($name, Closure $callback = null)
    {
        return Event::listen($name, $callback);
    }

}

/**
 * | **********************
 * |
 * | checks if there is or not the same function
 * |
 * | **************************
 */
if (!function_exists('firing')) {

    /**
     * call the Event::firing
     *
     * @see Event::firing
     * @return mixed
     */
    function firing()
    {
        return Event::firing();
    }

}


/**
 * | **********************
 * |
 * | checks if there is or not the same function
 * |
 * | **************************
 */
if (!function_exists('getallheaders')) {

    /**
     * fetch all http headers
     *
     * @return array
     */
    function getallheaders()
    {
        $headers = [];
        if (isset($_SERVER)) {

            foreach ($_SERVER as $name => $value) {
                if (substr($name, 0, 5) == 'HTTP_') {
                    $headers[str_replace(
                        ' ',
                        '-',
                        ucwords(strtolower(str_replace('_', ' ', substr($name, 5))))
                    )] = $value;
                }
            }

        }

        return $headers;
    }

}

/**
 * | **********************
 * |
 * | checks if there is or not the same function
 * |
 * | **************************
 */
if (!function_exists('response')) {

    /**
     * return the a response object
     *
     * @param string $content
     * @param int $statusCode
     * @return mixed
     */
    function response($content = '', $statusCode = 200)
    {
        return App::make('http.response')->setContent($content)->setStatusCode($statusCode);
    }

}

/**
 * | **********************
 * |
 * | checks if there is or not the same function
 * |
 * | **************************
 */
if (!function_exists('csrf_active')) {

    /**
     * get the registered csrf token
     *
     *
     * @return string
     */
    function csrf_active()
    {
        return Csrf::getToken();
    }
}


/**
 * | **********************
 * |
 * | determine if there is or not the same function
 * |
 * | **************************
 */
if (!function_exists('app')) {

    /**
     * get the registered csrf token
     *
     *
     * @param string $name
     * @return mixed
     */
    function app($name = null)
    {
        return null === $name ? App::make('app') : App::make($name);
    }
}


/**
 * | **********************
 * |
 * | determine if there is or not the same function
 * |
 * | **************************
 */
if (!function_exists('assets')) {

    /**
     * get the registered csrf token
     *
     * @param string $name
     * @return string
     */
    function asset($name = null)
    {
        $document = explode('/', app('http.request')->root);
        $document = end($document);

        $defaultPath = $document === 'public' ? '/assets/' : '/public/assets/';

        $packpage = new \Anonym\Assets\VersionPackpage('', '%f', $defaultPath);
        return $name !== null ? $packpage->getUrl($name) : $defaultPath;
    }
}


/**
 * | **********************
 * |
 * | determine if there is or not the same function
 * |
 * | **************************
 */
if (!function_exists('errors')) {

    /**
     * get the registered  error bag
     *
     * @param string $get
     * @return \Anonym\Support\ErrorBag|array
     */
    function errors($get = null)
    {
        $instance = App::make('error.bag');

        if ('instance' === $get) {
            return $instance;
        }

        return $instance->getErrors();
    }
}


/**
 * | **********************
 * |
 * | determine if there is or not the same function
 * |
 * | **************************
 */
if (!function_exists('filter')) {

    /**
     * get the registered  error bag
     *
     * @param string $name the name of filter
     * @param string $regex the expression of filter
     * @return \Anonym\Route\RouteCollector
     */
    function filter($name = null, $regex = '')
    {
        return Route::filter($name, $regex);
    }
}


/**
 * | **********************
 * |
 * | determine if there is or not the same function
 * |
 * | **************************
 */
if (!function_exists('filter')) {
    /**
     * throw an http exception with given datas
     *
     * @param int $code
     * @param string $message
     * @param array $headers
     * @throws HttpException
     */
    function abort($code = 503, $message = '', array $headers = [])
    {
        App::abort($code, $message, $headers);
    }

}

/**
 * | **********************
 * |
 * | checks if there is or not the same function
 * |
 * | **************************
 */
if (!function_exists('when')) {

    /**
     * Works with route collector. this function add a new when collection
     *
     * @param string $uri
     * @param \Closure $action
     * @return mixed
     */
    function when($uri, $action)
    {
        return Route::when($uri, $action);
    }
}

/**
 * | **********************
 * |
 * | checks if there is or not the same function
 * |
 * | **************************
 */
if (!function_exists('group')) {

    /**
     * add a new group collection to router
     *
     * @param string $name
     * @param array $action
     * @param Closure $callback
     * @return mixed
     */
    function group($name, $action, Closure $callback)
    {
        return Route::group($name, $action, $callback);
    }
}

/**
 * | *******************
 * |
 * | determine is there any function with same name
 * |
 * |*********************
 */
if (! function_exists('env')) {

    /**
     * Gets the value of an environment variable. Supports boolean, empty and null.
     *
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    function env($key, $default = null)
    {
        $value = getenv($key);
        if ($value === false) {
            return value($default);
        }
        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                return true;
            case 'false':
            case '(false)':
                return false;
            case 'empty':
            case '(empty)':
                return '';
            case 'null':
            case '(null)':
                return;
        }
        if (Str::startsWith($value, '"') && Str::endsWith($value, '"')) {
            return substr($value, 1, -1);
        }
        return $value;
    }
}
