<?php
/**
 *  This file belongs to AnonymPHP Framework
 *
 * @author vahitserifsaglam1 <vahit.serif119@gmail.com>
 * @website http://anonymphp.com/framework
 */

namespace Anonym\Console;

use Anonym\Application\Application as App;
use Anonym\Providers\RouteProvider;
use Anonym\Support\Arr;

/**
 * Class Application
 * @package Anonym\Console
 */
class Application extends App
{

    /**
     * the constructor of Application .
     * @param string $name
     * @param int $version
     */
    public function __construct($name, $version)
    {

        parent::__construct($name, $version);
    }

    /**
     * Return the providers without routing
     *
     * @return array
     */
    public function getProviders()
    {
        $providers = Arr::get($this->getGeneral(), 'providers', []);
        $routeId = array_search(RouteProvider::class, $providers);
        unset($providers[$routeId]);

        return array_merge($this->constructors, $providers);
    }

}