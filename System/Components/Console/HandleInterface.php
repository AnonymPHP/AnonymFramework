<?php
    /**
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     * @copyright AnonymMedya, 2015
     */

    namespace Application\Console;


    use Symfony\Component\Console\Output\OutputInterface;
    use Symfony\Component\Console\Input\InputInterface;

    /**
     * Interface HandleInterface
     * @package Application\Console
     */
    interface HandleInterface
    {
        /**
         * Komut yakalandığı zaman tetiklenecek fonksiyonlardan biridir
         * @param InputInterface $input
         * @param OutputInterface $output
         * @return mixed
         */
        public function handle(InputInterface $input, OutputInterface $output);
    }