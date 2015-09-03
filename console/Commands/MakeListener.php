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

use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;
use Anonym\Components\Console\HandleInterface;
use Anonym\Components\Console\Command;
use Anonym\Support\TemplateGenerator;

/**
 * Class Listener
 * @package Console\Commands
 */
class MakeListener extends Command implements HandleInterface
{

    /**
     * the signature of command
     *
     * @var string
     */
    protected $signature = 'make:listener {name}';


    /**
     * the description of command
     *
     * @var string
     */
    protected $description = 'create an event listener';

    /**
     * create an new instance
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
        $content = file_get_contents(RESOURCE.'migrations/listener.php.dist');

        $generator = new TemplateGenerator($content);
        $name = $this->argument('name');

        $path = APP. 'Listeners/'.$name.'.php';
        $generated = $generator->generate(['name' => $name]);

        if (!file_exists($path)) {
            touch($path);
            file_put_contents($path, $generated);
            $this->info(sprintf('%s created succesfully to %s', $name, $path));
        } else {
            $this->error(sprintf('%s Event already exists', $name));
        }
    }
}
