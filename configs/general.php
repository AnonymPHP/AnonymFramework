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
        'Mail' => \Anonym\Components\Mail\Mail::class,
        'Cookie' => \Anonym\Components\Cookie\Cookie::class,
        'Crypt' => \Anonym\Components\Crypt\Crypter::class,
        'Config' => \Anonym\Components\Config\Reposity::class,
        'Route' => \Anonym\Facades\Route::class,
        'Query' => \Anonym\Facades\Query::class,
        'Input' => \Anonym\Facades\Input::class,
        'Redirect' => \Anonym\Components\HttpClient\Redirect::class,
        'Event' => \Anonym\Components\Event\EventDispatcher::class,
        'Guard' => \Anonym\Components\Security\Authentication\Guard::class,
        'App' => \Anonym\Facades\App::class,
        'Session' => \Anonym\Facades\Session::class,
        'Response' => \Anonym\Facades\Response::class,
        'Request' => \Anonym\Facades\Request::class,
        'Stroge' => \Anonym\Facades\Stroge::class,
        'Cache' => \Anonym\Facades\Cache::class,
        'Csrf'  => \Anonym\Facades\Csrf::class,
        'Database' => \Anonym\Facades\Database::class,
        'Login'  => \Anonym\Facades\Login::class,
        'Migration' => \Anonym\Facades\Migration::class,
        'Register' => \Anonym\Facades\Register::class,
        'Redirect' => \Anonym\Facades\Redirect::class,
        'LastLogins' => \Anonym\Facades\LastLogins::class,
        'Schema' => \Anonym\Facades\Schema::class,
        'Validation' => \Anonym\Facades\Validation::class,
        'View' => \Anonym\Facades\View::class,
        'Anonym' => \Anonym\Facades\Anonym::class,
        'Element' => \Anonym\Facades\Element::class,
        'ErrorBag' => \Anonym\Facades\ErrorBag::class,
        'BackupLoader' => \Anonym\Facades\BackupLoader::class,
        'Backup' => \Anonym\Facades\Backup::class,
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
