<?php

    /**
     *  Bu Dosya AnonymFramework'un bir dosyasıdır,
     *  İstenildiği gibi alınıp kullanılabilir.
     *
     * @package Anonym
     * @author  vahitserifsaglam <vahit.serif119@gmail.com>
     * @copyright (c)  AnonymFramework, vahit serif saglam
     */

    namespace Anonym;

    class Redirect
    {

        /**
         * Yönlendirme işlemi yapar
         *
         * @param string  $adress
         * @param integer $time
         */
        public static function to($adress, $time = null)
        {

            if ($time === null) {

                static::location($adress);
            } else {

                static::refresh($adress, $time);
            }
        }

        /**
         *  Eski sayfaya geri döndürür
         */

        public static function back()
        {

            self::to($_SERVER['HTTP_REFERER']);
        }

        /**
         * YÖnlendirme yapar
         * @param $url
         * @param $time
         */
        private static function refresh($url, $time)
        {

            header("Refresh:{$time},url=$url");
        }

        /**
         * Url yönlendirmesi yapar
         * @param string $url
         */
        private static function location($url)
        {

            header("Location:$url");
        }
    }
