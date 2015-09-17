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
         $path = $this->getContainer()->getCompiledPath();
         $content = '';
         foreach(include SYSTEM.'_compile_files.php' as $file){
             $content .= $this->prepareForCompile(file_get_contents($file), $file);
         }

        file_put_contents($path, '<?php '. $content);
    }

    /**
     * prepare content to compile
     *
     * @param string $content
     * @param string $path
     * @return mixed
     * @throws Exception
     */
    private function prepareForCompile($content , $path){
        if(!strstr($content, 'namespace ')){
            throw new Exception(sprintf('%s file is not a class', $path));
        }

        return str_replace(["<?php", "?>"], '', $content).PHP_EOL;
    }

}
