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


use Anonym\Console\Command;
use Anonym\Console\HandleInterface;
use Anonym\Facades\Anonym;
use Anonym\Facades\Stroge;
use Anonym\Support\TemplateGenerator;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;

/**
 * Class MakeEvent
 * @package Console\Commands
 */
class MakeEvent extends Command implements HandleInterface
{

    /**
     * the signature of command
     *
     * @var string
     */
    protected $signature = 'make:event {name}';


    /**
     * the description of command
     *
     * @var string
     */
    protected $description = 'create a new event and listener file ';

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
        $content = file_get_contents(RESOURCE.'migrations/event.php.dist');

        $generator = new TemplateGenerator($content);
        $name = $this->argument('name');

        $path = APP.'Events/'.$name.'.php';
        $generated = $generator->generate(['name' => $name]);

        if (!file_exists($path)) {
            touch($path);
            file_put_contents($path, $generated);
            $listenerName = $name.'Listener';

            Anonym::call('make:listener', [
                'name' => $listenerName
            ]);

            $this->info(sprintf('%s listener created successfully', $listenerName));
            $this->info(sprintf('%s event created succesfully to %s', $name, $path));
        } else {
            $this->error(sprintf('%s Event already exists', $name));
        }
    }
}
