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
    'alias'     => [
        'Cookie'  => \Anonym\Components\Cookie\Cookie::class,
        'Session' => \Anonym\Components\Session\Session::class,
        'Crypt'   => \Anonym\Components\Crypt\Crypter::class,
        'Event'   => \Anonym\Components\Event\EventDispatcher::class,
        'Route'   => \Anonym\Components\Route\RouteCollector::class
    ],
    /**
     * | ****************
     * |
     * | the both of them must be an array
     * |
     * | *****************
     */
    'providers' => [
        \Anonym\Providers\EventProvider::class,
        \Anonym\Providers\RouteProvider::class
    ],


    /**
     * | ****************
     * |
     * | this configs for helpers functions file
     * |
     * | *****************
     */
    'helpers' => [
        APP . 'helpers/helpers.php'
    ]
];