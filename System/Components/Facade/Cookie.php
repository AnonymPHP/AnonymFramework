<?php
    /**
     * Created by PhpStorm.
     * User: vserifsaglam
     * Date: 25.6.2015
     * Time: 20:48
     */

    namespace Anonym\Facade;

    use Anonym\Patterns\Facade;

    class Cookie extends Facade
    {

        /**
         * @return string
         */
        protected static function getFacadeClass()
        {
            return "Cookie";
        }
    }
