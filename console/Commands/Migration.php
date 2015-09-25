<?php
namespace Console\Commands;

use Anonym\Console\Command as AnonymCommand;
use Anonym\Filesystem\Filesystem;
use Anonym\Support\TemplateGenerator;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;
use Anonym\Facades\Migration as FacadeMigration;
use Anonym\Console\HandleInterface;

/**
 * This file belongs to the AnoynmFramework
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 * Thanks for using
 */
class Migration extends AnonymCommand implements HandleInterface
{

    /**
     * the signature of command
     *
     * @var string
     */
    protected $signature = 'migration { function? } { name? }';

    /**
     * the description of command
     *
     * @var string
     */
    protected $description = 'create, run, forget and more migration functions';


    /**
     * @var Filesystem
     */
    private $file;

    /**
     *  create a new instance and register the filesystem
     *
     */
    public function __construct(Filesystem $filesystem)
    {
        $this->file = $filesystem;
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
        $command = $this->argument('function') ? $this->argument('function') : 'create';
        $param = $this->argument('name') ? $this->argument('name') : '';
        if (is_callable([$this, $command])) {
            $this->$command($param);
        } else {
            $this->error(sprintf('%s command is not found', $command));
        }
    }


    /**
     * Dosyayı silmeye yarar
     * @param string $name
     */
    public function forget($name = '')
    {

        $filePath = FacadeMigration::createName($name);
        if ($this->file->exists($filePath)) {
            $this->file->delete($filePath);
            $this->info(sprintf('%s migration succesfully removed in %s', $name, $filePath));
        } else {
            $this->error(sprintf('%s migration could not removed in %s, file not exists', $name,
                $filePath));
        }
    }

    /**
     *  clean all migration files
     */
    public function clean(){
        $this->file->cleanDirectory(MIGRATION);

        $this->info('All migrations cleaned');
    }

    /**
     * deploy the migration
     *
     * @param string $name
     */
    public function deploy($name = '')
    {
        FacadeMigration::run($name);
        $this->info('up method worked succesfully ');
        $this->info('down method worked succesfully in');
    }

    /**
     * create a new migration
     *
     * @param string $name
     */
    public function create($name = '')
    {
        $content = $this->migrate(RESOURCE.'migrations/migration.php.dist', ['name' => $name]);

        $fileName = FacadeMigration::createName($name);
        if (!$this->file->exists($fileName)) {
            $this->file->create($fileName);
            $this->write(MIGRATION, $fileName, $content);
            $this->info(sprintf('%s migration created with successfully', $name));
        } else {
            $this->error(sprintf('%s file already exists in %s', $name, $fileName));
        }
    }

    /**
     * write the content
     *
     * @param string $src
     * @param string $fileName
     * @param string $content
     * @throws \Exception
     */
    private function write($src, $fileName, $content)
    {

        if (!$this->file->exists($src)) {
            $this->file->makeDirectory($src);
        }
        $this->file->put($fileName, $content);
    }

    /**
     * create the migration template
     *
     * @param string $name
     * @param array $params
     * @return string
     */
    private function migrate($name, $params = [])
    {
        $generator = new TemplateGenerator();
        $generator->setContent(file_get_contents($name));

        return $generator->generate($params);
    }
}