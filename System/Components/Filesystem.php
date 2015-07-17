<?php

    namespace Anonym;

    use ArrayObject;
    use Exception;

    class Filesystem
    {

        public function __construct()
        {

        }

        /**
         * @param mixed $files
         * @return \ArrayObject
         */
        private function toIterator($files)
        {

            if (!$files instanceof \Traversable) {
                $files = new ArrayObject(is_array($files) ? $files : [$files]);
            }

            return $files;
        }

        /**
         * Klasörün içeriğini döndürür
         * @param string $path
         * @param int $type
         * @return array
         */
        public function listDir($path = '', $type = GLOB_NOSORT)
        {
            return glob($path, $type);
        }

        /**
         * Sadece klasörleri listeler
         * @param string $path
         * @return array
         */
        public function listDirOnlyDir($path = '')
        {
            return $this->listDir($path, GLOB_ONLYDIR);
        }

        /**
         * Dosyaya metni girmeye yarar
         *
         * @param string $data
         * @param mixed $filename
         * @param boolean|string $append
         * @return boolean
         */
        public function write($filename, $data, $append = false)
        {

            if (!$append) {
                $mode = "w";
            } else {
                $mode = "a";
            }
            if ($handle = fopen($filename, $mode)) {
                fwrite($handle, $data);
                fclose($handle);

                return true;
            }


            return false;
        }

        /**
         * Dosyanın okunabilir olup olmadığına bakar
         *
         * @param string $fileName
         * @return bool
         */
        public function isReadable($fileName = '')
        {
            return is_readable($fileName);
        }


        /**
         * Dosyanın yazılabilir olduğuna bakar
         *
         * @param string $fileName
         * @return bool
         */
        public function isWriteable($fileName = '')
        {
            return is_writeable($fileName);
        }

        /**
         * Girilen dosya yolundaki içeriği okur
         *
         * @param string $fileName
         * @param bool $fread
         * @return string
         * @throws Exception
         */
        public function read($fileName = '', $fread = false)
        {

            if ($this->exists($fileName)) {

                if ($this->isReadable($fileName)) {
                    if (false === $fread) {
                        return file_get_contents($fileName);
                    } elseif (true === $fread) {

                        $open = fopen($fread, 'r');
                        $read = fgetss($fread, filesize($fileName));
                        fclose($open);

                        return $read;
                    }
                } else {
                    return false;
                }

            } else {

                throw new Exception(
                    sprintf('Girdiğiniz %s dosyası bulunamadı', $fileName)
                );
            }
        }


        /**
         * Dosya varmı yokmu diye kontrol eder
         * @param string $fileName
         * @return bool
         */
        public function exists($fileName = '')
        {

            foreach ($this->toIterator($fileName) as $file) {

                if (!file_exists($file)) {
                    return false;
                }
            }

            return true;
        }

        /**
         * $filePath ile girilen yolda bir dosya oluşturur, $over  true girilirse dosya silinip yeni dosya oluştururlu.
         *
         * @param string $filePath
         * @param bool $over
         * @throws Exception
         * @return bool
         */
        public function touch($filePath = '', $over = false)
        {

            if(!is_string($filePath))
            {
                 throw new Exception(sprintf('%s fonksiyonunda girdiğiniz isim string olmalıdır', __FUNCTION__));
            }

            if (false === $over) {

                if (false === $this->exists($filePath)) {

                    return touch($filePath);
                }
            } else {

                if (true === $this->exists($filePath)) {

                    $this->delete($filePath);
                }

                return touch($filePath);
            }
        }

        /**
         * Girilen $dir yolundaki dosyayı siler
         *
         * @param string $dir
         * @return bool
         */
        public function delete($dir = '')
        {

            foreach ($this->toIterator($dir) as $dirs) {

                if (!file_exists($dirs)) {
                    return false;
                }

                if (is_file($dirs)) {

                    if (true !== unlink($dirs)) {

                        continue;
                    }
                } elseif (is_dir($dirs)) {

                    if (true !== rmdir($dirs)) {

                        continue;
                    }
                }
            }

            return true;
        }

        /**
         * $filepath ile girilen yola $mode değişkenindeki izinleri atar
         *
         * @param string $filePath
         * @param int $mode
         * @throws Exception
         * @return bool
         */
        public function chmod($filePath = '', $mode = 0777)
        {
            if(!is_string($filePath))
            {
                throw new Exception(sprintf('%s fonksiyonunda girdiğiniz isim string olmalıdır', __FUNCTION__));
            }

            if (true === $this->exists($filePath)) {

                return chmod($filePath, $mode);
            }
        }

        /**
         * Dosya Kopyalama İşlemini yapar
         *
         * @param string $src
         * @param string $desc
         * @throws Exception
         */
        public function copy($src = '', $desc = '')
        {

            if (!is_file($src)) {

                throw new Exception(
                    sprintf('girdiğiniz %s bir dosya değil', $src));
            }

            $this->mkdir($desc);

            if (true !== copy($src, $desc)) {

                $error = error_get_last();
                throw new Exception(
                    sprintf('Dosya kopyalama sırasında bir hata oluştu: %s', $error['message'])
                );
            }
        }


        /**
         * Girilen $dir değişkenine göre yeni bir dosya oluşturur
         *
         * @param string|array $dirs
         * @param int $mode
         * @throws Exception
         * @return bool
         */
        public function mkdir($dirs = '', $mode = 0777)
        {
            foreach ($this->toIterator($dirs) as $dir) {

                if (is_dir($dir)) {
                    continue;
                }

                if (true !== mkdir($dir, $mode, true)) {
                    $error = error_get_last();

                    $message = isset($error['message']) ? $error['message'] : 'Mesaj Bulunamadı';
                    return false;
                }

                return true;
            }
        }

        /**
         * Dosyaya yeni bir isim veri
         *
         * @param string $oldFile
         * @param string $newName
         * @throws Exception
         * @return bool
         */
        public function reName($oldFile = '', $newName = '')
        {

            if(!is_string($oldFile) || !is_string($newName))
            {
                throw new Exception(sprintf('%s fonksiyonunda girdiğiniz isim string olmalıdır', __FUNCTION__));
            }

            foreach ($this->toIterator($oldFile) as $file) {

                if (false === $this->exists($file)) {
                    continue;
                }

                if (false === rename($oldFile, $newName)) {

                    $error = error_get_last();
                    throw new Exception(
                        sprintf('İsim değiştirme işlemi sırasında bir hata oluştu: %s', $error['message'])
                    );
                }
            }

            return true;
        }

        /**
         * Yeni bir örnek oluşturur
         *
         * @return static
         */
        public static function getInstance()
        {

            return new static();
        }

        /**
         * Girilen parametre ve dosya ile include işlemi yapar
         *
         * @param       $fileName
         * @param array $parametres
         * @throws Exception
         * @return mixed
         */
        public function inc($fileName, $parametres = [])
        {

            if(!is_string($fileName))
            {
                throw new Exception(sprintf('%s fonksiyonunda girdiğiniz isim string olmalıdır', __FUNCTION__));
            }

            if (true === $this->exists($fileName)) {

                if (count($parametres) > 0) {
                    extract($parametres);
                }

                return include($fileName);
            }
        }
    }
