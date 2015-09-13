<?php
namespace Console\Commands;

use Anonym\Components\Console\Command as AnonymCommand;
use Anonym\Support\TemplateGenerator;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;
use Anonym\Facades\Migration as FacadeMigration;
use Anonym\Components\Console\HandleInterface;
use Anonym\Facades\App;
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
    protected $signature = 'migration { function? } { name? }';

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
    private $filesystem;

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
     * Dosyayı silmeye yarar
     * @param string $name
     */
    public function forget($name = '')
    {
        $filePath = FacadeMigration::createName($name);
        if ($this->filesystem->exists($filePath)) {
            $this->filesystem->delete($filePath);
            $this->info(sprintf('%s migration succesfully removed in %s', $name, $filePath));
        } else {
            $this->error(sprintf('%s migration could not removed in %s, file not exists', $name,
                $filePath));
        }
    }

    /**
     * deploy the migration
     *
     * @param string $name
     */
    public function deploy($name = '')
    {
        $response = FacadeMigration::run($name);
        foreach ($response as $answer) {
            $up = $answer['up'];
            $down = $answer['down'];
            $fname = $answer['name'];
            if (null !== $up) {
                if (false !== $up) {
                    $this->info(sprintf('up method worked succesfully in %s', $fname));
                } else {
                    $this->error(sprintf('up method worked not successfully in %s', $fname));
                }
            }else{
                $this->error(sprintf('up method worked not successfully in %s', $fname));
            }
            // düşürme işlemi
            if (null !== $down) {
                if (false !== $down) {
                    $this->info(sprintf('down method worked succesfully in %s', $fname));
                } else {
                    $this->error(sprintf('down method worked not succesfully in %s', $fname));
                }
            }else{
                $this->error(sprintf('down method worked not successfully in %s', $fname));
            }
        }
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