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

use Anonym\Console\HandleInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;
use Anonym\Console\Command;
use Anonym\Facades\Anonym;
/**
 * Class MakeMigrationCommand
 * @package Console\Commands
 */
class MakeMigrationCommand extends Command implements HandleInterface
{
    /**
     *
     * /**
     * @var string
     */
    protected $signature = 'make:migration {name}';

    /**
     * @var string
     */
    protected $description = "create a migration file";



    /**
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return mixed
     */
    public function handle(InputInterface $input, OutputInterface $output)
    {
        $name = $this->argument('name');

        Anonym::call('migration', [
            'function' => 'create', 'name' => $name
        ]);

        $this->info(sprintf('%s migration file created with successfully', $name));
    }
}
