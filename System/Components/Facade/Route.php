<?php
    namespace Anonym\Facade;

    use Anonym\Patterns\Facade;

    /**
     * Class Route
     *
     * @package Anonym\Facade
     */
    class Route extends Facade
    {

        protected static function getFacadeClass()
        {
            return 'Route';
        }
    }
