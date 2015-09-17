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
use Anonym\Facades\Backup as BackupFacade;
use Anonym\Components\Console\HandleInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakeBackupCommand extends Command implements HandleInterface
{

    /**
     * the signature of command
     *
     * @var string
     */
    protected $signature = 'make:backup {name} {tables?}';

    /**
     * the description of command
     *
     * @var string
     */
    protected $description = 'create a new database backup file';

    public function handle(InputInterface $input, OutputInterface $output){
        $name = $this->argument('name');
        $tables = $this->argument('tables') ? $this->argument('tables') : '*';
        $return = BackupFacade::backup($tables, $name);
        if (true === $return) {
            $this->info(sprintf('%s backup file generated in %s path', $name,
                BackupLoader::generatePath($name)));
        } else {
            $this->error(sprintf('%s cant create, file already exists', $name));
        }
    }
}
