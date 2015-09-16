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


use Anonym\Components\Console\Command;
use Anonym\Components\Console\HandleInterface;
use Anonym\Facades\Anonym;
use Anonym\Facades\Migration;
use Anonym\Filesystem\Filesystem;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;

/**
 * Class CacheTableCommand
 * @package Console\Commands
 */
class CacheClearCommand extends Command implements HandleInterface
{

    /**
     *  the singature of command
     *
     * @var string
     */
    protected $singature = 'cache:clear';

    /**
     * the description of command
     *
     * @var string
     */
    protected $description = 'clear all cache files';

    /**
     * the instance of filesystem
     *
     * @var Filesystem
     */
    private $file;

    /**
     * create a new instance and register filesystem
     *
     * @param Filesystem $filesystem
     */
    public function __construct(Filesystem $filesystem)
    {
        $this->file = $filesystem;

        parent::__construct();
    }

    /**
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return mixed
     */
    public function handle(InputInterface $input, OutputInterface $output)
    {
        $this->file->cleanDirectory(RESOURCE . 'cache');

        $this->info('all cache files removed successfully');
    }
}
