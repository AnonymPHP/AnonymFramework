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
use Anonym\Support\TemplateGenerator;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;

/**
 * Class MakeCommand
 * @package Console\Commands
 */
class MakeCommand extends Command implements HandleInterface
{

    /**
     * the signature of command
     *
     * @var string
     */
    protected $signature = 'make:command {name}';

    /**
     * the description of command
     *
     * @var string
     */
    protected $description = 'Create a new console command with <name>';


    /**
     * the instance of filesystem
     *
     * @var Filesystem
     */
    protected $file;

    /**
     * create a new isntance and register filesystem
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
        $content = $this->file->get(RESOURCE . 'migrations/command.php.dist');

        $name = $this->argument('name');

        $template = new TemplateGenerator($content);
        $generated = $template->generate([
            'name' => $name
        ]);


        $path = BASE . 'console/Commands/' . $name . '.php';
        $this->file->put($path, $generated);

        $this->info(sprintf('%s command created with successfully in %s', $name, $path));
    }
}
