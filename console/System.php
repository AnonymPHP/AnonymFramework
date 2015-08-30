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
use Console\Commands\Migration;
/**
 * Class System
 * @package Console
 */
class System
{

    /**
     * the repository of console commands
     *
     * @var array
     */
    protected $commands =
        [
            Migration::class
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
