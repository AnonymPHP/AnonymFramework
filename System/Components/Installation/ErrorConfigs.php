<?php
    /**
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     * @copyright AnonymMedya, 2015
     */

    namespace Anonym\Installation;

    use Anonym\Helpers\Config;

    /**
     * Class ErrorConfigs
     * @package Anonym\Installation
     */
    class ErrorConfigs
    {

        public function __construct()
        {

            error_reporting(E_ALL);
            set_exception_handler(Config::get('app.exception.handler'));
            set_error_handler(Config::get('app.error.handler'));
        }

    }