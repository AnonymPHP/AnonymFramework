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
use Anonym\Facades\Stroge;
use Anonym\Filesystem\Filesystem;
use Anonym\Support\TemplateGenerator;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;

/**
 * Class MakeController
 * @package Console\Commands
 */
class MakeController extends Command implements HandleInterface
{

    /**
     * the signature of command
     *
     * @var string
     */
    protected $signature = 'make:controller {name}';


    /**
     * the description of command
     *
     * @var string
     */
    protected $description = 'create a new controller file';

    /**
     * the instance of filesystem
     *
     * @var Filesystem
     */
    private $filesystem;

    /**
     * create an event instance and register filesystem
     *
     * @param Filesystem $filesystem
     */
    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
        parent::__construct();
    }

    /**
     * Komut yakalandığı zaman tetiklenecek fonksiyonlardan biridir
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return mixed
     */
    public function handle(InputInterface $input, OutputInterface $output)
    {
        $content = file_get_contents(RESOURCE.'migrations/controller.php.dist');

        $generator = new TemplateGenerator($content);
        $name = $this->argument('name');

        $path = HTTP.'Controllers/'.$name.'.php';
        $generated = $generator->generate(['name' => $name]);
        if (!$this->filesystem->exists($path)) {
           $this->filesystem->create($path);
            $this->filesystem->put($path, $generated);
            $this->info(sprintf('%s created succesfully to %s', $name, $path));
        } else {
            $this->error(sprintf('%s Controller already exists', $name));
        }
    }
}
