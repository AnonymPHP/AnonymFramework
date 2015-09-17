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
use Exception;
use Symfony\Component\Process\Process;
use Anonym\Components\Console\Command;
use Anonym\Components\Console\HandleInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class OptimizeCommand
 * @package Console\Commands
 */
class OptimizeCommand extends Command implements HandleInterface
{

    /**
     * the signature of command
     *
     * @var string
     */
    protected $signature = 'optimize {--force}';

    /**
     * the description of command
     *
     * @var string
     */
    protected $description = 'optimize the framework for better performance';

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return mixed
     */
    public function handle(InputInterface $input, OutputInterface $output){

        $this->info('Optimizing Composer autoloader');
        $process = new Process('composer --optimize');
        $process->run();

        if($this->option('force')){
            $this->info('Compiling all files');
            $this->compileAllFiles();
        }
        $this->info('Framework optimized with successfully');
    }

    /**
     *  compile all files
     *
     */
    private function compileAllFiles(){

         // do nothing
    }
}
