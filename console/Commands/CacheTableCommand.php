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
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;

/**
 * Class CacheTableCommand
 * @package Console\Commands
 */
class CacheTableCommand extends Command implements HandleInterface
{

    /**
     *  the singature of command
     *
     * @var string
     */
    protected $singature = 'cache:table';

    /**
     * the description of command
     *
     * @var string
     */
    protected $description = 'create migration file for caches';

    /**
     * Komut yakalandığı zaman tetiklenecek fonksiyonlardan biridir
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return mixed
     */
    public function handle(InputInterface $input, OutputInterface $output)
    {


    }
}
