<?php
    /**
     *  Bu Sınıf AnonymFrameworkde view, ve veritabanındaki yapılan sorguları dinleyerek
     *  onlardaki yanlışlıkların farkedilmesini sağlar
     */
    namespace Anonym\Debug;

    use Anonym\Adapter;

    /**
     * Class DebugListener
     *
     * @package Anonym\Debug
     */

    class DebugListener extends Adapter
    {

        public function __construct()
        {
            parent::__construct('debug');
            $this->addAdapter( new ViewListener());
            $this->addAdapter( new DatabaseListener());
        }

        /**
         * Veritabanı ve view dosyalarını döndürür
         * @return array
         */
        public function getListenedValues()
        {
            return [
                'view' => $this->getViewListenedValues(),
                'database' => $this->getDatabaseListenedValues()
            ];
        }

        /**
         * View Verilerini döndürür
         * @return mixed
         */
        public function getViewListenedValues()
        {
            return $this->view->getAll();
        }

        /**
         * Veritabanı verilerini döndürür
         * @return mixed
         */
        public function getDatabaseListenedValues()
        {
            return $this->database->getAll();
        }
    }