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
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;

/**
 * Class Installation
 * @package Console\Commands
 */
class Installation extends Command implements HandleInterface
{

    /**
     * the signature of command
     *
     * @var string
     */
    protected $name = 'install {--no-optimize}';

    /**
     * the description of command
     *
     * @var string
     */
    protected $description = 'install the required systems';

    /**
     * Komut yakalandığı zaman tetiklenecek fonksiyonlardan biridir
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return mixed
     */
    public function handle(InputInterface $input, OutputInterface $output)
    {

        // run installation migration
        Anonym::call('migration', [
            'function' => 'deploy', 'name' => 'Installation'
        ]);

        // remove the installation migration
        Anonym::call('migration', [
            'command' => 'forget', 'name' => 'Installation'
        ]);

        if(!$this->option('no-optimize')){
            // cache all configuration files

            Anonym::call('optimize');
        }

        $this->info('Anonym Framework installation with successfully');
    }
}
