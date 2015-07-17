<?php

    /**
     * Bu sınıf AnonymFrameworkde cache verileri depolamak için kullanılmaktadır.
     *
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     * @copyright 2015, Vahit Şerif Sağlam
     */

    namespace Anonym;

    use Exception;

    /**
     * Class Cache
     * @package Anonym
     */

    class Cache extends Filesystem
    {
        /**
         * Zaman aşımı süresini ayarlar
         *
         * @var int
         */

        private $time = 3600;

        /**
         * Kaydedilecek yer
         *
         * @var string
         */
        private $cacheFolder = 'stroge/cache';

        /**
         * Kaydedilirken kullanılacak uzantı
         *
         * @var string
         */
        private $cacheExt = '.cache';

        public function __construct()
        {
            parent::__construct();
            if (!$this->exists($this->cacheFolder)) {
                if (!$this->mkdir($this->cacheFolder)) {
                    throw new Exception(sprintf('%s isimli cache dosyası oluşturulurken bir hatayla karşılaşıldı'));
                }
            }

            $this->chmod($this->cacheFolder, 0777);
            parent::__construct();
        }

        /**
         * Sınıfta kullanılmak üzere cache dosyalarını hazırlar
         *
         * @param $path
         * @return string
         */
        private function inPath($path)
        {

            $path =  $this->cacheFolder . '/' . $path;
            return $path;
        }

        /**
         * Yeni bir instance döndürür
         *
         * @return static
         */
        public static function getInstance()
        {

            return new static();
        }

        /**
         * Zaman aşımına düşecek zamanı ayarlar
         *
         * @param int $time
         * @return $this
         */
        public function setTime($time = 3600)
        {

            $this->time = $time;

            return $this;
        }

        /**
         * Cache dosyalarının tutulacağı klasörü ayarlar
         *
         * @param $folder
         * @return $this
         */
        public function setCacheFolder($folder)
        {

            $this->cacheFolder = $folder;

            return $this;
        }

        /**
         * Cache dosyalarının hangi dosya uzantısına sahip olacağını ayarlar
         * Not:default olarak .cache atanmıştır
         *
         * @param $ext
         * @return $this
         */
        public function setCacheExt($ext)
        {

            $this->cacheExt = $ext;

            return $this;
        }

        /**
         * Girilen veriyi Çeker, eğer $json true verilirse veriyi json_decode den geçirir.
         *
         * @param string $name
         * @param int $time
         * @param bool $json
         * @return bool|mixed|string
         * @throws Exception
         */

        public function get($name, $time = 3600, $json = false)
        {
            $this->setTime($time);
            $file = $this->cacheFileNameGenaretor($name);
            $file = $this->inPath($file);
            if ($this->exists($file)) {

                if ($this->checkTime($file)) {

                    $content = $this->read($file);
                    if ($json) {
                        $content = json_decode($content);
                    }

                    return $content;
                } else {

                    return false;
                }
            } else {

                return false;
            }
        }

        /**
         * Yeni bir cache ataması yapar, eğer $json true girilirse veri json_encodeden geçirilir
         *
         * @param string $name
         * @param mixed  $content
         * @param bool   $json
         * @return bool
         */
        public function set($name = '', $content = '', $json = false)
        {

            $file = $this->cacheFileNameGenaretor($name);
            $file = $this->inPath($file);

            var_dump($file);
            if (!$this->exists($file)) {
                $this->touch($file);
            }

            if ($json) {
                $content = json_encode($content);
            }

            $this->chmod($file, 0777);
            $this->write($file, $content);

            return true;
        }


        /**
         * Girilen isimdeki veriyi siler
         *
         * @param string $name
         * @return bool
         */
        public function delete($name = '')
        {

            $file = $this->cacheFileNameGenaretor($name);
            $file = $this->inPath($file);
            if ($this->exists($file)) {
                $this->delete($file);

                return true;
            } else {
                return false;
            }
        }

        /**
         * Tüm önbellek dosyalarını siler
         */
        public function flush()
        {

            $this->delete($this->cacheFolder);
        }

        /**
         * Girilen parametreye göre dosyanın yolunu hazırlar
         *
         * @param $file
         * @return string
         */

        private function cacheFileNameGenaretor($file)
        {

            return $file . $this->cacheExt;
        }

        /**
         * Dosyanın yaratılma zamanını ve şuanki zamana göre durup durmaması gerektiğini  kontrol eder
         *
         * @param string $fileName
         * @throws Exception
         * @return bool
         */
        private function checkTime($fileName = '')
        {

            $fileName = $this->inPath($fileName);
            if (!$this->exists($fileName)) {

                return false;
            }

            $createdTime = $this->ftime($fileName);
            $endTime = $createdTime + $this->time;
            $now = time();

            if ($endTime > $now) {
                $this->delete($fileName);

                return true;
            } else {

                return false;
            }
        }
    }
