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
        'cookie' => \Anonym\Components\Cookie\Cookie::class,
        'crypt' => \Anonym\Components\Crypt\Crypter::class,
        'event' => \Anonym\Components\Event\EventDispatcher::class,
        'route' => \Anonym\Components\Route\RouteCollector::class,
        'guard' => \Anonym\Components\Security\Authentication\Guard::class,
        'redirect' => \Anonym\Components\HttpClient\Redirect::class,
        'config' => \Anonym\Components\Config\Reposity::class,
        'mail'   => \Anonym\Components\Mail\Mail::class,
    ],

    /**
     * | ****************
     * |
     * | each provider must be an instance of ServiceProvider.
     * |
     * | *****************
     */
    'providers' => [
        \Anonym\Components\Session\SessionServiceProvider::class,
        \Anonym\Components\Database\Pagination\PaginationServiceProvider::class,
        \Anonym\Providers\ErrorBagServiceProvider::class,
        \App\Services\EventService::class,
        \App\Services\RouteService::class,
        \App\Services\LoginService::class,
        \App\Services\RegisterService::class,
        \App\Services\MiddlewareService::class,
        \App\Services\ViewService::class,
        \Anonym\Providers\CookieProvider::class,
        \Anonym\Providers\RouteProvider::class,
    ],

    /**
     * | ******************
     * |
     * | the files of helpers
     * |
     * | ******************
     */
    'helpers' => [
        APP.'helpers/helpers.php',
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
