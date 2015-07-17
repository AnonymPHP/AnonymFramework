<?php
    /**
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     * @copyright AnonymMedya, 2015
     */

    namespace Anonym\Console;

    use Anonym\Console\Commands\MakeMvc;
    use Anonym\Console\Commands\Migration;
    use Anonym\Console\Commands\MakeBackup;

    /**
     * Class System
     * @package Anonym\Console
     */
    abstract class System
    {

        /**
         * Bu Kısıma eklediğiniz sınıflar birer komut olarak algılanacaktır
         * @var array
         */
        protected $commands = [
            MakeMvc::class,
            Migration::class,
            MakeBackup::class,
        ];


    }