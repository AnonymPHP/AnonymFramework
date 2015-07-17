<?php

    /**
     * AnonymFramework Server Helper -> $_SERVER ile ilgili işlemleri yapar
     *
     * @package Anonym\Helpers
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     */

    namespace Anonym\Helpers;

    use Anonym\Security;

    trait Server
    {

        public $url;

        /**
         * @var array
         *  Özel arama terimleri
         */
        public $server_filters = [
            'useragent' => 'HTTP_USER_AGENT',
            'referer' => 'HTTP_REFERER',
            'host' => 'HTTP_HOST',
            'reditect' => 'REDIRECT_URL',
            'serverip' => 'SERVER_ADDR',
            'userip' => 'REMOTE_ADDR',
            'uri' => 'REQUEST_URI',
            'method' => 'REQUEST_METHOD',
            'protocol' => 'SERVER_PROTOCOL'
        ];

        /**
         *
         *
         * @return string
         */
        public function getMethod()
        {
            return $this->method;
        }

        /**
         * Özel terimlerden getirme
         *
         * @param string $name
         * @return unknown
         */
        public function get($name = 'HTTP_HOST')
        {
            if (isset($_SERVER[$name])) {
                return $_SERVER[$name];
            }
        }

        /**
         * Url i döndürür
         *
         * @return string
         */
        public function getUrl()
        {

            if($path = $this->get('PATH_TRANSLATED'))
            {
                $url = str_replace($this->get('DOCUMENT_ROOT'),'', $path);
            }else{
                $script = ($this->get('PHP_SELF') !== null) ? $this->get('PHP_SELF'):$this->get('SCRIPT_NAME');
                $script = str_replace('index.php','', $script);

                $url = str_replace($script, '', $this->uri);
            }

            return Security::xssProtection($url);
        }

        /**
         * Dinamik çağırma
         *
         * @param unknown $name
         * @throws \Exception
         * @return string
         */
        public function __get($name)
        {
            if (isset($this->server_filters[$name])) {
                if (isset($_SERVER[$this->server_filters[$name]])) {
                    return $_SERVER[$this->server_filters[$name]];
                } else {
                    return false;
                }
            } else {
                $big = mb_convert_case($name, MB_CASE_UPPER, 'UTF-8');
                if (isset($_SERVER[$big])) {
                    return $_SERVER[$big];
                } else {
                    throw new \Exception(sprintf("%s adında bir değişken bulunamadı", $name));
                }
            }
        }

        /**
         * Sayfanın yürütüldüğü url 'i bulur
         * @return string
         */
        public function findBasePath()
        {
            $type = $this->get('REQUEST_SCHEME');
            return sprintf("%s::%s%s", $type, $this->host, $this->uri);
        }


        /**
         * Kullanıcının ip adresini döndürür
         *
         * @return string
         */
        public function getIP()
        {
            if (getenv("HTTP_CLIENT_IP")) {
                $ip = getenv("HTTP_CLIENT_IP");
            } elseif (getenv("HTTP_X_FORWARDED_FOR")) {
                $ip = getenv("HTTP_X_FORWARDED_FOR");
                if (strstr($ip, ',')) {
                    $tmp = explode(',', $ip);
                    $ip = trim($tmp[0]);
                }
            } else {
                $ip = getenv("REMOTE_ADDR");
            }

            return $ip;
        }
    }
