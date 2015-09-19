<?php

/**
 * This file belongs to the AnoynmFramework
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 * Thanks for using
 */

return [

    'timezone' => 'Europe/Istanbul',
    /**
     * |***************************************
     * |
     * | Anonym Framework General configs;
     * | -----------------------------;
     * |
     * | alias => the alias for facade classes
     * | providers  => the service providers
     * |***************************************
     */

    'alias' => [
        'mail' => \Anonym\Components\Mail\Mail::class,
        'cookie' => \Anonym\Components\Cookie\Cookie::class,
        'crypt' => \Anonym\Components\Crypt\Crypter::class,
        'config' => \Anonym\Components\Config\Reposity::class,
        'route' => \Anonym\Components\Route\RouteCollector::class,
        'redirect' => \Anonym\Components\HttpClient\Redirect::class,
        'event' => \Anonym\Components\Event\EventDispatcher::class,
        'guard' => \Anonym\Components\Security\Authentication\Guard::class,
        'app' => \Anonym\Facades\App::class,
        'session' => \Anonym\Facades\Session::class,
    ],

    /**
     * | ****************
     * |
     * | each provider must be an instance of ServiceProvider.
     * |
     * | *****************
     */
    'providers' => [
        \App\Services\ViewService::class,
        \App\Services\EventService::class,
        \App\Services\RouteService::class,
        \App\Services\LoginService::class,
        \App\Services\RegisterService::class,
        \App\Services\MiddlewareService::class,
        \Anonym\Providers\RouteProvider::class,
        \Anonym\Providers\CookieProvider::class,
        \Anonym\Providers\ErrorBagServiceProvider::class,
        \Anonym\Components\Session\SessionServiceProvider::class,
        \Anonym\Components\Database\Pagination\PaginationServiceProvider::class,
    ],

    /**
     * | ******************
     * |
     * |  helper functions files
     * |
     * | ******************
     */
    'helpers' => [
        APP . 'helpers/helpers.php',
    ],


    /**
     * |*************************
     * |
     * | the name of application
     * |
     * |*************************
     */
    'application_name' => 'AnonymPHP 2 Test Application'
];
