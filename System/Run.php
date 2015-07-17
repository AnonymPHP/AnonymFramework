<?php

    /**
     *  Bu sistem Autoload tarafından yürütülebilmesi için oluşturulmuştur.
     *  Sınıfın başlaması için gerekli olan işlemleri yapar.
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     */
    namespace Anonym\System;

    use Anonym\Application;

    /**
     * Class Run
     * @package Anonym\System
     */

    class Run
    {

        private $applicaton;
        /**
         * Sistemi yürütür.
         * @throws \Exception
         */
        public function __construct()
        {

            $this->runBootstrap();
            include APP . 'Helpers/helpers.php';
            $this->application = new Application('AnonymFramework2Build', 1);

            /**
             *
             *  Rotalama olayının Application/routes.php den devam edeceğini bildirir.
             *  İstenilirse -> run ( den önce istenilen işlemler yapılabilir.
             *
             */
            $this->application->run();

        }

        /**
         *  Ayar dosyalarını yükler
         */
        private function runBootstrap()
        {
            include 'System/Bootstrap/bootstrap.php';
        }
    }
