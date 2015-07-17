<?php
    namespace Anonym\Facade;

    use Anonym\Patterns\Facade;

    class Request extends Facade
    {
        protected static function getFacadeClass()
        {
            return "Request";
        }
    }
