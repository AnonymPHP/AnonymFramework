<?php
    /**
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     * @copyright AnonymMedya, 2015
     */

    namespace Anonym\Facade;

    use Anonym\Patterns\Facade;
    use Anonym\Patterns\Singleton;

    /**
     * Class Schema
     * @package Anonym\Facade
     */
    class Schema extends Facade
    {
        /**
         * @return Object
         */
        protected static function getFacadeClass()
        {
            return Singleton::make('Anonym\Database\Tools\Migration\Schema');
        }
    }