<?php
    /**
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     * @copyright AnonymMedya, 2015
     */

    namespace Anonym\Log;


    use Anonym\Helpers\Config;

    class Listen
    {

        /**
         * Hataları Dinleyeme başlar ve log olarak atar
         * @param callable|null $callback
         */
        public static function error(callable $callback = null)
        {
            Config::set('app.log.error', $callback);
        }

        /**
         * İstisnaları dinlemeye başlar
         * @param callable|null $callback
         */
        public static function exception(callable $callback = null)
        {
            Config::set('app.log.exception', $callback);
        }

    }