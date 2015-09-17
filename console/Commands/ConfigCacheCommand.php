<?php
/**
 * This file belongs to the AnoynmFramework
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 * Thanks for using
 */

namespace Console\Commands;


use Anonym\Components\Config\ConfigLoader;
use Anonym\Components\Console\Command;
use Anonym\Components\Console\HandleInterface;
use Anonym\Filesystem\Filesystem;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;

class ConfigCacheCommand extends Command implements HandleInterface
{
    /**
     * the signature of command
     *
     * @var string
     */
    protected $signature = 'config:cache';

    /**
     * the description of command
     *
     * @var string
     */
    protected $description = 'cache all config files';


    /**
     * the instance of config loader
     *
     * @var ConfigLoader
     */
    private $loader;

    /**
     * the instance of filesystem
     *
     * @var Filesystem
     */
    private $file;
    /**
     * create a new instance and register config loader
     *
     * @param ConfigLoader $configLoader
     */
    public function __construct(ConfigLoader $configLoader, Filesystem $filesystem){
        $this->loader = $configLoader;
        $this->file = $filesystem;

        parent::__construct();
    }

    public function handle(InputInterface $input, OutputInterface $output){
        $cachedPath  = SYSTEM.'cache_configs.php';
        $configs = $this->loadAllConfigs($cachedPath);


    }
    /**
     * load all config files
     *
     * @param $cachedPath
     * @return array
     */
    private function loadAllConfigs($cachedPath){
        $loader = $this->loader->setCachedConfigPath($cachedPath)->setConfigPath(CONFIG);

        return $loader->loadConfigs();
    }
}
