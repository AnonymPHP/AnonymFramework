<?php

    /**
     * AnonymFramework Cookie işlemlerinin yapıldığı sınıf
     *
     * @package Anonym
     * @author vahitserifsaglam1 <vahit.serif119@gmail.com>
     */

    namespace Anonym;

    use Anonym\Http\CookieJar;
    use Anonym\Patterns\Singleton;

    class Cookie
    {

        public $cookies;
        private $headerBag;

        public function __construct()
        {

            $this->cookies = Singleton::make('Anonym\Http\CookieBag')->getCookies();
            $this->headerBag = Singleton::make('Anonym\Http\Response\HeadersBag');
        }

        /**
         * Cookie 'i döndürür
         *
         * @param string $name
         * @return mixed
         */
        public function get($name = '')
        {
            return $this->cookies[$name];
        }

        public function has($name = '')
        {
            return isset($this->cookies[$name]);
        }

        /**
         * Cookie Atamasını yapar
         * $name -> cookie adı
         * $value -> cookie değeri
         * $expires -> geçerlilik süresi
         * $path->cookie nin geçerli olacağı alan
         * $domain->cookie'in geçerli olduğu domain
         * $sucere->cookie'nin secure değeri
         * $httpOnly -> cookie'in httpony değeri
         *
         * @param string $name
         * @param string $value
         * @param int    $expires
         * @param string $path
         * @param null   $domain
         * @param bool   $secure
         * @param bool   $httpOnly
         * @return $this
         */
        public function set(
           $name = '',
           $value = '',
           $expires = 3600,
           $path = '/',
           $domain = null,
           $secure = false,
           $httpOnly = false
        ) {
            $this->headerBag->setCookie(new CookieJar($name, $value, $expires, $path, $domain, $secure, $httpOnly));

            return $this;
        }

        /**
         * Silme işlemini yapar
         *
         * @param string $name
         * @return $this
         */
        public function delete($name = '')
        {

            $this->set($name, '');

            return $this;
        }

        /**
         * Tüm cookileri temizler
         */
        public function flush()
        {

            foreach ($this->cookies as $cookie => $value) {

                $this->delete($cookie);
            }
        }

        /**
         * Çok uzun süre yaşayacak olan cookie olayı
         *
         * @param string $name
         * @param string $value
         * @param string $path
         * @param null   $domain
         * @param bool   $secure
         * @param bool   $httpOnly
         * @return $this
         */

        public function forever(
           $name = '',
           $value = '',
           $path = '/',
           $domain = null,
           $secure = false,
           $httpOnly = false
        ) {
            $this->set($name, $value, 2628000, $path, $domain, $secure, $httpOnly);

            return $this;
        }
    }
