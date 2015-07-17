<?php
    /**
     *  AnonymFramework Connection Manager Trait, veritabanı baağlantısını başlatır ve sonlandırılması
     *  ması bu trait de gerçekleşir
     *
     * @package  Anonym\Database\Traits;
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     */

    namespace Anonym\Database\Traits;

    trait ConnectionManager
    {

        private $connection;
        private $connectedTable;

        /**
         * Ba�lant� sonland�r�ld�
         */
        public function close()
        {

            $this->connection = null;
        }

        /**
         * Kullan�lacak tabloyu se�er
         *
         * @param string $table
         */
        public function connect($table)
        {

            $this->connectedTable = $table;
        }

        /**
         * Se�ilen tabloyu d�nd�r�r
         *
         * @return string
         */
        public function getTable()
        {

            return $this->connectedTable;
        }

        /**
         * @return \PDO
         */
        public function getConnection()
        {

            return $this->connection;
        }
    }
