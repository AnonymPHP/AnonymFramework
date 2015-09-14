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
use Anonym\Database\Tools\Backup\Seeder;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Finder\Finder;

class RunSeedCommand extends Command implements HandleInterface
{

    /**
     * the name of signature
     *
     * @var string
     */
    protected $signature = 'seed:run {name?}';

    /**
     * @var string
     */
    protected $description = "create a seed file";


    /**
     * @var Finder
     */
    protected $finder;

    /**
     * @param Finder $filesystem
     */
    public function __construct(Finder $finder)
    {
        $this->finder = $finder;
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
        $name = $this->argument('name') ?: '';

        if ($name === '') {
            $name = $this->findAllSeeds();
        } else {
            $name = (array)$name;
        }

        $seeder = new Seeder($this->getContainer());
        $seeder->setCommand($this);


    }

    /**
     * @return array
     */
    protected function findAllSeeds(){
        $list = $this->finder->files()->name('*.php')->in(MIGRATION);

        $return = [];
        foreach ($list as $l) {
            $filename = first(explode('.', $l->getFilename()));

            $name = end(explode('/', $filename));
            $return[] = $name;
        }

        return $return;
    }
}