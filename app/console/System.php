<?php
/**
 * This file belongs to the AnoynmFramework
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 * Thanks for using
 */

namespace Console;

use Anonym\Application\Application;
use Illuminate\Container\Container;
use Anonym\Cron\Cron as Schedule;
use Anonym\Console\Kernel;
use Anonym\Facades\App;

/**
 * Class System
 * @package Console
 */
class System extends Kernel
{


    /**
     * the repository of console commands
     *
     * @var array
     */
    protected $commands = [

    ];


    /**
     * createa new instance and register version
     *
     * @param Application $application the instance of anonym application
     * @param int $version the version of anonym console application
     */
    public function __construct(Application $application, $version = 2)
    {
        // register console to facades and more!
        $console = $this;

        App::singleton('console', function () use ($console) {
            return $console;
        });

        parent::__construct($application, $version);
    }

    /**
     * add the schedule commands
     *
     *
     * @param Schedule $schedule
     *
     */
    public function schedule(Schedule $schedule)
    {

    }
}
