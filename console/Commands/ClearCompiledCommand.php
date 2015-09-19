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
use Anonym\Filesystem\Filesystem;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;

/**
 * Class ClearCompiledCommand
 * @package Console\Commands
 */
class ClearCompiledCommand extends Command implements HandleInterface
{

    /**
     * the description of  command
     *
     * @var string
     */
    protected $description = 'remove the compiled file';

    /**
     * the signature of command
     *
     * @var string
     */
    protected $name = 'clear:compile';

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
        $path = $this->getContainer()->getCompiledPath();

        if ($this->file->exists($path)) {
            $this->file->delete($path);
        }

        $this->info('removed compiled file with successfully');
    }
}
