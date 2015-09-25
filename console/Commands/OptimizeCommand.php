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
use PhpParser\Lexer;
use PhpParser\Parser;
use Anonym\Facades\Anonym;
use ClassPreloader\ClassPreloader;
use ClassPreloader\Parser\DirVisitor;
use ClassPreloader\Parser\FileVisitor;
use ClassPreloader\Parser\NodeTraverser;
use Symfony\Component\Process\Process;
use Anonym\Console\Command;
use ClassPreloader\Exceptions\SkipFileException;
use Anonym\Console\HandleInterface;
use Symfony\Component\Console\Input\InputInterface;
use PhpParser\PrettyPrinter\Standard as PrettyPrinter;
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
        $process = new Process('composer dump-autoload --optimize');
        $process->run();

        $this->info('caching configuration files');
        Anonym::call('config:cache');

        if($this->option('force')){
            $this->info('Compiling all files');
            $this->compileAllFiles();
        }
        $this->info('Framework optimized with successfully');
    }

    /**
     *  compile all files for the better performance
     *
     *  @return mixed
     */
    protected function compileAllFiles(){
        $preloader = new ClassPreloader(new PrettyPrinter, new Parser(new Lexer), $this->getTraverser());


        $handle = $preloader->prepareOutput($this->getContainer()->getCompiledPath());
        foreach ($this->getAllFiles() as $file) {
            try {
                fwrite($handle, $preloader->getCode($file, false)."\n");
            } catch (SkipFileException $ex) {
                //
            }
        }

        fclose($handle);
    }

    /**
     * Get the node traverser used by the command.
     *
     * @return NodeTraverser
     */
    protected function getTraverser(){
        $traverser = new NodeTraverser();

        $traverser->addVisitor(new DirVisitor(true));

        $traverser->addVisitor(new FileVisitor(true));

        return $traverser;
    }
    /**
     *  compile all files
     *
     */
    protected function getAllFiles(){
        $core = require __DIR__. '/Optimize/core.php';

        $proivers = config('compile.providers');
        $aliases   = config('compile.aliases');
        $files = array_merge($core, $proivers, $aliases);

        return $files;
    }
}
