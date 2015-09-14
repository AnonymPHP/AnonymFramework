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
use Anonym\Components\Tools\Seeder;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Finder\Finder;

/**
 * Class DeploySeedCommand
 * @package Console\Commands
 */
class DeploySeedAllCommand extends Command implements HandleInterface
{

    /**
     * the name of signature
     *
     * @var string
     */
    protected $signature = 'seed:all';

    /**
     * @var string
     */
    protected $description = "run all seed files";

    /**
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return mixed
     */
    public function handle(InputInterface $input, OutputInterface $output)
    {

        $seeder = new Seeder($this->getContainer());
        $seeder->setCommand($this);

        foreach($this->readAllSeeds() as $name){
            $seeder->call($name);
        }
    }

    /**
     *
     * read all seeds name
     */
    public function readAllSeeds()
    {
        $list = Finder::create()->files()->name('*.php')->in(DATABASE. 'Seeds/');

        $result = [];
        foreach ($list as $l) {
            $exp = first(explode('.', $l->getFilename()));
            $result[] = end(explode('/', $exp));
        }

        return $result;
    }
}
