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

class RunSeedCommand extends Command implements HandleInterface
{

    /**
     * the name of signature
     *
     * @var string
     */
    protected $signature = 'seed:run {name?}';

    /**
     * @var string
     */
    protected $description = "create a seed file";


    /**
     * @var Filesystem
     */
    protected $file;

    /**
     * @param Filesystem $filesystem
     */
    public function __construct(Filesystem $filesystem){
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
    }
}