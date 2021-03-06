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

    /**
     * | ************************************
     * |
     * | the application special key, this gonna use in crypter and somewhere else.
     * |
     * | **************************************
     */
    'app_key' => 'AnonymPHPRandomString',


    /**
     *  |
     *  | The timezone of your country
     *  |
     */
    'timezone' => 'Europe/Istanbul',

    /**
     * | *****************
     * |
     * |  the class aliases
     * |
     * | *****************
     */

    'alias' => [
        'Mail' => \Anonym\Mail\Mail::class,
        'Cookie' => \Anonym\Facades\Cookie::class,
        'Crypt' => \Anonym\Facades\Crypt::class,
        'Config' => \Anonym\Config\Reposity::class,
        'Route' => \Anonym\Facades\Route::class,
        'Query' => \Anonym\Facades\Query::class,
        'Input' => \Anonym\Facades\Input::class,
        'Event' => \Anonym\Event\EventDispatcher::class,
        'Guard' => \Anonym\Security\Authentication\Guard::class,
        'App' => \Anonym\Facades\App::class,
        'Session' => \Anonym\Facades\Session::class,
        'Response' => \Anonym\Facades\Response::class,
        'Request' => \Anonym\Facades\Request::class,
        'Stroge' => \Anonym\Facades\Stroge::class,
        'Cache' => \Anonym\Facades\Cache::class,
        'Csrf'  => \Anonym\Facades\Csrf::class,
        'database' => \Anonym\Facades\Database::class,
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
        'Form'   => \Anonym\Facades\Form::class
    ],

    /**
     * | ------------------------------------------------
     * |  The list of all application provider
     * | ------------------------------------------------
     * |
     * | If you want register a new service provider,
     * | it's must be an instance of Anonym\Application\ServiceProvider
     * |
     */
    'providers' => [
        \Anonym\Crypt\CrypterServiceProvider::class,
        \Anonym\Cookie\CookieServiceProvider::class,
        \Anonym\Session\SessionServiceProvider::class,
        \Anonym\Providers\SecurityProvider::class,
        \App\Services\ViewService::class,
        \App\Services\EventService::class,
        \App\Services\RouteService::class,
        \App\Services\LoginService::class,
        \App\Services\RegisterService::class,
        \App\Services\MiddlewareService::class,
        \Anonym\Providers\RouteProvider::class,
        \Anonym\Providers\ErrorBagServiceProvider::class,
        \Anonym\Http\RedirectSenderProvider::class,
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
     * | -------------------------------------------------
     * | The Name of Your Application
     * | -------------------------------------------------
     * |
     * | We gonna use this to send mails
     * |
     */
    'application_name' => 'AnonymPHP 2 Test Application',


    /**
     * |--------------------------------------------------
     * | Application Error Logger
     * | -------------------------------------------------
     * |
     * | When Your logger is true , we will store all errors in app/logs/error.log
     * |
     */

    'log' => true,


    /*
     |--------------------------------------------------------------------------
     | Application Debug Mode
     |--------------------------------------------------------------------------
     |
     | When your application is in debug mode, detailed error messages with
     | stack traces will be shown on every error that occurs within your
     | application. If disabled, a simple generic error page is shown.
     |
     */

    'debug' => true,

    /**
     * |--------------------------------------------------
     * | Application Config Setting
     * | -------------------------------------------------
     * |
     * | you select drivers you will use
     * |
     * | The driver can be 'memcache', 'apc', 'redis', 'xcache', 'standart'
     * |
     * |--------------------------------------------------
     */
    'config' => 'standart'
];
