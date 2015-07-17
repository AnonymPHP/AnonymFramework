<?php

    namespace Anonym\Facade;

    use Anonym\Patterns\Facade;

    class Auth extends Facade
    {

        /**
         * @return string
         */

        protected static function getFacadeClass()
        {
            return "Auth";
        }
    }

