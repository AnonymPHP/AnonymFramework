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
    protected $description = 'create an controller';

    /**
     * create an event instance
     */
    public function __construct()
    {
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

        $path = 'App/Http/Controllers/'.$name.'.php';
        $generated = $generator->generate(['name' => $name]);
        if (!Stroge::exists($path)) {
            Stroge::create($path);
            Stroge::put($path, $generated);
            $this->info(sprintf('%s created succesfully to %s', $name, $path));
        } else {
            $this->error(sprintf('%s Controller already exists', $name));
        }
    }
}