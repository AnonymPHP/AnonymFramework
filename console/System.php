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

use Anonym\Components\Cron\Cron as Schedule;
use Anonym\Components\Console\Kernel;
use Console\Commands\MakeEvent;
use Console\Commands\Migration;

/**
 * Class System
 * @package Console
 */
class System extends Kernel
{
    /**
     * create a new instance
     *
     * @param int $version
     */
    public function __construct($version = 1)
    {
        parent::__construct($version);
    }

    /**
     * the repository of console commands
     *
     * @var array
     */
    protected $commands =
        [
            Migration::class,
            MakeEvent::class
        ];


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
