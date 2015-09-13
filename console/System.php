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
use Console\Commands\MakeController;
use Console\Commands\MakeListener;
use Console\Commands\MakeModel;
use Console\Commands\MakeEvent;
use Console\Commands\Migration;
use Console\Commands\Backup;

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
        Migration::class,
        MakeEvent::class,
        MakeListener::class,
        MakeController::class,
        MakeModel::class,
        Backup::class
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
