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


use Anonym\Config\ConfigLoader;
use Anonym\Console\Command;
use Anonym\Console\HandleInterface;
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
    protected $signature = 'config:cache {--no-cache}';

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

    /**
     * handle the command
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return mixed
     */
    public function handle(InputInterface $input, OutputInterface $output){
        $cachedPath  = SYSTEM.'cached_configs.php';
        $configs = $this->loadAllConfigs();


        $this->file->put($cachedPath, '<?php return '.var_export($configs, true).';'.PHP_EOL);
        $this->info('Configuration cached successfully!');
    }
    /**
     * load all config files and prepare to cache
     *
     * @return array
     */
    private function loadAllConfigs(){
        $loader = $this->loader->setConfigPath(CONFIG);

        return $loader->loadConfigs();
    }
}
