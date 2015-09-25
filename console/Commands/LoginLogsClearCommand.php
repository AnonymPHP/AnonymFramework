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
use Anonym\Facades\LastLogins;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;

/**
 * Class LoginLogsClearCommand
 * @package Console\Commands
 */
class LoginLogsClearCommand extends  Command implements HandleInterface
{

    /**
     * the signature of command
     *
     * @var string
     */
    protected $signature = 'logins:clear';

    /**
     * the description of command
     *
     * @var string
     */
    protected $description = 'remove all login logs form your database';

    /**
     * execute this function when this command called
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return mixed
     */
    public function handle(InputInterface $input, OutputInterface $output){
        if ($this->confirm('We will clean your logins table, Do you want do this? [yes/no]')) {
            LastLogins::cleanLogs();

            $this->info('cleaned all login logs');
        }
    }
}
