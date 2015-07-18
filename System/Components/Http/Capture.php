<?php
    /**
     * Bu Dosya AnonymFramework'e ait bir dosyadır.
     *
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     * @see http://gemframework.com
     *
     */

    namespace Anonym\Http;


    /**
     * Class Capture
     * @package Anonym\Http
     */

    class Capture
    {

        /**
         * Gönderilecek içeriği depolar
         *
         * @var string
         */
        protected static $content = null;


        /**
         * İçeriği döndürür
         *
         * @return string
         */
        public static function getContent()
        {
            if (null !== static::$content) {
                return static::$content;
            }else{
                return ob_get_clean();
            }
        }

        /**
         * İçeriği tanımlar
         *
         * @param string $content
         */
        public static function setContent($content = ''){
            static::$content = null;
        }

        /**
         * İçeriği temizler
         *
         */
        public static function clean()
        {
            static::setContent(null);
        }
    }