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
     * |*********************************
     * |
     * | Anonym Framework General configs;
     * | ---------------------------
     * | variables;
     * |
     * | alias => the alias for facade classes
     * | providers  => the providers
     * |*********************************
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
     * | the both of them must be an array
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
     * | ****************
     * |
     * | this configs for helpers functions file
     * |
     * | *****************
     */
    'helpers' => [
        APP.'helpers/helpers.php',
    ],

    /**
     * application installed path, url
     */
    'url' => 'http://localhost/AnonymFramework',

    /**
     *  the name of application
     */
    'application_name' => 'Anonym Test Application'
];
