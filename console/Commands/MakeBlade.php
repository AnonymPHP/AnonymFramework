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

/**
 * Class MakeBlade
 * @package Console\Commands
 */
class MakeBlade extends Command implements HandleInterface
{
    /**
     *
    /**
     * @var string
     */
    protected $signature = 'make:blade {name}';

    /**
     * @var string
     */
    protected $description = "create blade view file";


    /**
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return mixed
     */
    public function handle(InputInterface $input, OutputInterface $output)
    {
        $name = $this->argument('name');
        Anonym::call('make:view', [
            'name' => $name
        ]);
    }
}
