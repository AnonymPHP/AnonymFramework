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

class CleanView extends Command implements HandleInterface
{

    /**
     * the description of command
     *
     * @var string
     */
    protected $description = 'clean the all view files';

    /**
     * the signature of command
     *
     * @var string
     */
    protected $name = 'clean:view';


    /**
     * the instance of filesystem
     *
     * @var Filesystem
     */
    private $filesystem;

    public function __construct(Filesystem $filesystem){
        $this->filesystem = $filesystem;
    }
    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return mixed
     */
    public function handle(InputInterface $input, OutputInterface $output)
    {
        $this->filesystem->cleanDirectory(VIEW);
        $this->info('cleaned all view files');
    }
}
