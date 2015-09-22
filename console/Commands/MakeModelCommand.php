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
use Anonym\Support\TemplateGenerator;

/**
 * Class MakeModel
 * @package Console\Commands
 */
class MakeModelCommand extends Command implements HandleInterface
{


    /**
     * the signature of command
     *
     * @var string
     */
    protected $signature = 'make:model {name}';

    /**
     * the description of command
     *
     * @var string
     */
    protected $description = "create a new model file";


    /**
     * the instance of filesystem
     *
     * @var Filesystem
     */
    private $file;

    /**
     * create a new instance and register filesystem variable
     *
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

        // now we will read model stub file
        $content = $this->file->get(RESOURCE.'migrations/model.php.dist');

        $generator = new TemplateGenerator($content);
        $name = $this->argument('name');

        $path = 'app/Models/'.$name.'.php';

        // create content
        $generated = $generator->generate(['name' => $name]);
        if (!$this->file->exists($path)) {
            $this->file->create($path);

            // write the created content to model file
            $this->file->put($path, $generated);
        }
        $this->info(sprintf('%s model file created succesfully to %s', $name, $path));
    }
}
