<?php
namespace Console\Commands;

use Anonym\Components\Console\Command as AnonymCommand;
use Anonym\Support\TemplateGenerator;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;
use Anonym\Facades\Migration as FacadeMigration;
use Anonym\Components\Console\HandleInterface;
use Anonym\Facades\Stroge;

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
    protected $signature = 'make:migration { function? } { name? }';

    /**
     * the description of command
     *
     * @var string
     */
    protected $description = 'Migration oluşturma ve düzenleme komutları';

    /**
     * the filesystem adapter
     *
     * @var \Anonym\Components\Filesystem\FilesystemAdapter
     */
    private  $filesystem;

    /**
     *  create a new instance and register the filesystem
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->filesystem = Stroge::disk('local');
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
     * create a new migration
     *
     * @param string $name
     */
    public function create($name = '')
    {
        $content = $this->migrate('resources/migrations/migration.php.dist', ['name' => $name]);
        $fileName = FacadeMigration::createName($name);
        if (!$this->filesystem->exists($fileName)) {
            touch($fileName);
            $this->write(MIGRATION, $fileName, $content);
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
        if (!$this->filesystem->exists($src)) {
            $this->filesystem->createDir($src);
        }
        $this->filesystem->chmod($src, 0777);
        file_put_contents($fileName, $content);
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