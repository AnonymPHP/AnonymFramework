<?php
    /**
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     * @copyright AnonymMedya, 2015
     */

    namespace Anonym\Log;

    use Anonym\Filesystem;

    /**
     * Bu sınıf ile log dosyalarını kaydedilmesi yaplır.
     * Class Log
     * @package Anonym\Log
     */
    class Log extends Filesystem
    {

        /**
         * @var string
         */
        private $logFile;

        /**
         * @param string $logFile
         */
        public function __construct($logFile = '')
        {
            $this->setLogFile($logFile);
        }


        /**
         * @param string $logFile
         * @return $this
         */
        public function setLogFile($logFile)
        {
            $this->logFile = $logFile;
            return $this;
        }

        /**
         * @return string
         */
        public function getLogFile()
        {
            return $this->logFile;;
        }

        /**
         * İçeriği log a yazar
         * @param string $logString
         * @return $this
         */
        protected function writeToLog($logString = '')
        {
            if (!$this->exists($this->getLogFile())) {
                $this->touch($this->getLogFile());
            }

            $this->write($this->getLogFile(), $logString, true);
            return $this;
        }

    }