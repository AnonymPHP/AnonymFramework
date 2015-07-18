<?php
    /**
     * Bu Dosya AnonymFramework'e ait bir dosyadır.
     *
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     * @see http://gemframework.com
     *
     */

    namespace Anony\Route\AccessManager;


    class Capsule
    {
        /**
         * Manager'ları tutar
         *
         * @var array
         */
         private static $managers;

        /**
         * Yeni bir manager ekler
         *
         * @param $name
         * @param string $class
         * @return bool
         */
        public function add($name, $class = '')
        {
            static::$managers[$name] = $class;
            return true;
        }

        /**
         * İçerikleri tanımlar
         *
         * @param array $managers
         * @return bool
         */
        public static function setManagers(array $managers = [])
        {
            static::$managers = $managers;
            return true;
        }

        /**
         * İçerikleri döndürür
         *
         * @return array
         */
        public static function getManagers()
        {
            return static::$managers;
        }

        /**
         * Tekil olarak içeriği döndürür
         *
         * @param string $name
         * @return mixed
         */
        public static function getManager($name = '')
        {
            return static::$managers[$name];
        }

        /**
         * $name ile girilen içerik varmı diye bakar
         *
         * @param string $name
         * @return bool
         */
        public static function has($name = '')
        {
            return isset(static::$managers[$name]);
        }
    }