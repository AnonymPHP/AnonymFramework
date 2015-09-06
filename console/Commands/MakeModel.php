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
use Anonym\Support\TemplateGenerator;
use Anonym\Facades\Stroge;

class MakeModel extends Command implements HandleInterface
{

    /**
     * Komut yakalandığı zaman tetiklenecek fonksiyonlardan biridir
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return mixed
     */
    public function handle(InputInterface $input, OutputInterface $output)
    {

        $content = file_get_contents(RESOURCE.'migrations/model.php.dist');

        $generator = new TemplateGenerator($content);
        $name = $this->argument('name');

        $path = 'App/Models/'.$name.'.php';
        $generated = $generator->generate(['name' => $name]);
        if (!Stroge::exists($path)) {
            Stroge::create($path);
            Stroge::put($path, $generated);
            $this->info(sprintf('%s created succesfully to %s', $name, $path));
        } else {
            $this->error(sprintf('%s Model already exists', $name));
        }
    }
}
