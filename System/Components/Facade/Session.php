<?php

    /**
     *  Bu Sınıf AnonymFramework'de Session sınıfı ile yapılan işlemlerin static olarak yapılmasını
     *  sağlamak için oluşturulmuştur.
     *
     * @authot vahitserifsaglam <vahit.serif119@gmail.com>
     */

    namespace Anonym\Facade;

    use Anonym\Patterns\Facade;

    class Session extends Facade
    {

        /**
         * @return string
         */
        protected static function getFacadeClass()
        {
            return 'Session';
        }
    }