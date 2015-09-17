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
use Anonym\Components\Cron\Task\Task;
use Anonym\Facades\Anonym;
use Console\Commands\MigrationForgetCommand;
use Console\Commands\LoginLogsClearCommand;
use Console\Commands\MakeMigrationCommand;
use Console\Commands\DeploySeedAllCommand;
use Console\Commands\MigrationRunCommand;
use Console\Commands\MakeBackupCommand;
use Console\Commands\ConfigCacheCommand;
use Console\Commands\DeploySeedCommand;
use Console\Commands\CacheTableCommand;
use Console\Commands\CacheClearCommand;
use Console\Commands\MakeSeedCommand;
use Console\Commands\OptimizeCommand;
use Anonym\Components\Console\Kernel;
use Console\Commands\MakeController;
use Console\Commands\MakeListener;
use Console\Commands\Installation;
use Console\Commands\MakeBlade;
use Console\Commands\MakeModel;
use Illuminate\Container\Container;
use Console\Commands\MakeEvent;
use Console\Commands\Migration;
use Console\Commands\MakeView;
use Console\Commands\Backup;
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
        MigrationForgetCommand::class,
        LoginLogsClearCommand::class,
        MakeMigrationCommand::class,
        DeploySeedAllCommand::class,
        MigrationRunCommand::class,
        MakeBackupCommand::class,
        ConfigCacheCommand::class,
        DeploySeedCommand::class,
        CacheTableCommand::class,
        CacheClearCommand::class,
        MakeSeedCommand::class,
        OptimizeCommand::class,
        MakeController::class,
        MakeListener::class,
        Installation::class,
        MakeEvent::class,
        MakeModel::class,
        MakeBlade::class,
        MakeView::class,
        Migration::class,
        Backup::class
    ];


    /**
     * createa new instance and register version
     *
     * @param Container $container the instance of anonym application
     * @param int $version            the version of anonym console application
     */
    public function __construct(Container $container, $version = 2){
        // register console to facades and more!
        $console = $this;
        App::singleton('console', function () use ($console) {
            return $console;
        });

        parent::__construct($container, $version );
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
