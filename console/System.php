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
use Console\Commands\MigrationForgetCommand;
use Console\Commands\LoginLogsClearCommand;
use Console\Commands\MakeMiddlewareCommand;
use Console\Commands\MakeMigrationCommand;
use Console\Commands\ClearCompiledCommand;
use Console\Commands\DeploySeedAllCommand;
use Console\Commands\BackupLoaderCommand;
use Console\Commands\BackupForgetCommand;
use Console\Commands\MigrationRunCommand;
use Console\Commands\MakeBackupCommand;
use Console\Commands\ConfigCacheCommand;
use Console\Commands\DeploySeedCommand;
use Console\Commands\CacheTableCommand;
use Console\Commands\CacheClearCommand;
use Console\Commands\MakeModelCommand;
use Console\Commands\MakeSeedCommand;
use Console\Commands\OptimizeCommand;
use Anonym\Components\Console\Kernel;
use Console\Commands\MakeController;
use Illuminate\Container\Container;
use Console\Commands\MakeListener;
use Console\Commands\Installation;
use Console\Commands\MakeCommand;
use Console\Commands\MakeBlade;
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
        MakeMiddlewareCommand::class,
        MakeMigrationCommand::class,
        ClearCompiledCommand::class,
        DeploySeedAllCommand::class,
        BackupLoaderCommand::class,
        BackupForgetCommand::class,
        MigrationRunCommand::class,
        ConfigCacheCommand::class,
        MakeBackupCommand::class,
        DeploySeedCommand::class,
        CacheTableCommand::class,
        CacheClearCommand::class,
        MakeModelCommand::class,
        MakeSeedCommand::class,
        OptimizeCommand::class,
        MakeController::class,
        MakeListener::class,
        Installation::class,
        MakeCommand::class,
        MakeBlade::class,
        Migration::class,
        MakeEvent::class,
        MakeView::class,
        Backup::class
    ];


    /**
     * createa new instance and register version
     *
     * @param Container $container the instance of anonym application
     * @param int $version the version of anonym console application
     */
    public function __construct(Container $container, $version = 2)
    {
        // register console to facades and more!
        $console = $this;
        App::singleton('console', function () use ($console) {
            return $console;
        });

        parent::__construct($container, $version);
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
