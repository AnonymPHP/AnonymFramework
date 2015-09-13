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
use Anonym\Components\Filesystem\Filesystem;
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

    public function __construct(Filesystem $filesystem){

    }
    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return mixed
     */
    public function handle(InputInterface $input, OutputInterface $output)
    {

    }
}
