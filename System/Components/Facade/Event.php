<?php

    namespace Anonym\Facade;

    use Anonym\Patterns\Facade;

    class Event extends Facade
    {

        protected static function getFacadeClass()
        {

            return 'Event';
        }
    }
