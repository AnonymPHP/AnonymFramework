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
    'alias' => [
        'cookie' => \Anonym\Components\Cookie\Cookie::class,
        'session' => \Anonym\Components\Session\Session::class,
        'crypt' => \Anonym\Components\Crypt\Crypter::class,
        'event' => \Anonym\Components\Event\EventDispatcher::class,
        'route' => \Anonym\Components\Route\RouteCollector::class,
        'app' => \Anonym\Bootstrap\Container::class,
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
];
