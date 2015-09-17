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
use Anonym\Facades\Anonym;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;

class MigrationForgetCommand extends Command implements HandleInterface
{

    /**
     * the signature of command
     *
     * @var string
     */
    protected $signature = 'migration:forget { name? }';

    /**
     * the description on command
     *
     * @var string
     */
    protected $description = 'remove an migration file';

    /**
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return mixed
     */
    public function handle(InputInterface $input, OutputInterface $output)
    {
        if($name = $this->argument('name')){
            Anonym::call('migration', [
                'function' => 'forget', 'name' => $name
            ]);

            $this->info(sprintf('%s migration file removed successfully', $name));
        }else{

        }
    }
}
