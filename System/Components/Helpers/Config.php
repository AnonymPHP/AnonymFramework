<?php

    /**
     * AnonymFramework Config Helper -> ayar dosyaları bu dosyadan çekilir
     *
     * @package Anonym\Helpers
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     */

    namespace Anonym\Helpers;

    use Anonym\Config\Reposity;
    use Anonym\Patterns\Facade;

    class Config extends Facade
    {
        protected static function getFacadeClass()
        {
            return Reposity::class;
        }

    }
