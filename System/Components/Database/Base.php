<?php

    /**
     *  AnonymFramework Veritaban� s�n�f� ana s�n�f�
     *  # builder lerle ve di�er altyap�larla ileti�imi sa�layacak
     *
     * @package Anonym\Database
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     */

    namespace Anonym\Database;

    use Anonym\Database\Mode\Delete;
    use Anonym\Database\Mode\Read;
    use Anonym\Database\Mode\Update;
    use Anonym\Database\Mode\Insert;
    use Anonym\Database\Tools\BackUp;
    use Anonym\Database\Traits\ConnectionManager;
    use Anonym\Database\Traits\ModeManager;
    use Anonym\Helpers\Config;

    class Base extends Starter
    {

        use ConnectionManager,
           ModeManager;

        public function __construct()
        {

            $configs = Config::get('db.connection');
            parent::__construct($configs);
            $this->connection = $this->getDb();
        }

        /**
         * Select i�leminde sorgu olu�turmak da kullan�l�r
         *
         * @param string   $table
         * @param callable $callable
         * @return mixed
         * @access public
         */
        public function read($table, callable $callable = null)
        {

            $this->connect($table);
            $read = new Read($this);

            return $callable($read);
        }

        /**
         * Update ��lemlerinde kullan�l�r
         *
         * @param string   $table
         * @param callable $callable
         * @return mixed
         */
        public function update($table, callable $callable = null)
        {

            $this->connect($table);
            $update = new Update($this);

            return $callable($update);
        }

        /**
         * Insert ��lemlerinde kullan�l�r
         *
         * @param string   $table
         * @param callable $callable
         * @return mixed
         */
        public function insert($table, callable $callable = null)
        {

            $this->connect($table);
            $insert = new Insert($this);

            return $callable($insert);
        }

        /**
         * Delete delete işlemlerinde kullanılır
         *
         * @param string   $table
         * @param callable $callable
         * @return mixed
         */
        public function delete($table, callable $callable = null)
        {

            $this->connect($table);
            $delete = new Delete($this);

            return $callable($delete);
        }

        /**
         * Veritabanını yedekler
         *
         * @param string $tables Çekilecek tabloların adı, tüm tabloların çekilmesini istiyorsanız * girebilirisiz
         * @param string $src Dosyanın kaydedileceği yer
         * @return bool
         */
        public function backup($tables = '*', $src = DATABASE)
        {
            $backup = new BackUp($this->getConnection());

            return $backup->backUp($tables, $src);
        }

        /**
         * Yedeklenen veri tabanı dosyalarını yükler
         *
         * @return bool
         */
        public function load()
        {
            $backup = new BackUp($this->getConnection());

            return $backup->load($this);
        }

        /**
         * Dinamik method çağrımı
         *
         * @param string $method
         * @param array  $args
         * @return mixed
         */
        public function __call($method, array $args = [])
        {

            if ($this->isMode($method)) {

                $return = $this->callMode($method, $args);
            } else {

                $return = call_user_func_array([$this->getConnection(), $method], $args);
            }

            return $return;
        }
    }
