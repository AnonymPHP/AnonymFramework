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
use Anonym\Filesystem\Filesystem;
use Anonym\Support\TemplateGenerator;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;
class MakeSeedCommand extends Command implements HandleInterface
{
    /**
     * the name of signature
     *
     * @var string
     */
    protected $signature = 'make:seed {name}';
    /**
     * @var string
     */
    protected $description = "create a seed file";
    /**
     * @var Filesystem
     */
    protected $file;
    /**
     * @param Filesystem $filesystem
     */
    public function __construct(Filesystem $filesystem){
        $this->file = $filesystem;
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
        $template = new TemplateGenerator($this->file->get(RESOURCE.'migrations/seed.php.dist'));
        $name = $this->argument('name');
        $content = $template->generate([
            'name' => $name
        ]);
        $path = "App/Database/Seeds/$name.php";
        if (!$this->file->exists($path)) {
            $this->file->create($path);
            $this->file->put($path, $content);
        }
        $this->info(sprintf('%s seed created successfully', $name));
    }
}