<?php
    /**
     * Created by PhpStorm.
     * User: vserifsaglam
     * Date: 23.6.2015
     * Time: 03:25
     */

    namespace Anonym\Facade;

    use Anonym\Patterns\Facade;
    use Anonym\Patterns\Singleton;

    class Database extends Facade
    {

        protected static function getFacadeClass()
        {

            return Singleton::make('Anonym\Database\Base');
        }
    }
