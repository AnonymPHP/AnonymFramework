<?php
    /**
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     * @copyright AnonymMedya, 2015
     */

    namespace Application\Console;

    use Application\Console\Commands\MakeMvc;
    use Application\Console\Commands\Migration;
    use Application\Console\Commands\MakeBackup;

    /**
     * Class System
     * @package Application\Console
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