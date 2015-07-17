<?php

    /**
     *   AnonymFramework dosyalarda Controller ve Model leri �a��rmakta kullan�lacak
     *
     * @package Anonym
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     * @copyright MyfcYazilim
     */

    namespace Anonym;

    use Anonym\Helpers\Config;
    use Anonym\Http\Response\ShouldBeResponse;
    use Anonym\Patterns\Singleton;
    use Anonym\View\ShouldBeView;
    use Anonym\Installation\Starter;
    use Exception;

    class App
    {


        /**
         * Sınıfa facede ekler
         *
         * @param array $facedes
         * @return bool
         */
        public static function facede($facedes = [])
        {
            Config::add('general.alias', $facedes);
            return true;
        }

        /**
         * Sınıfa providers ekler
         *
         * @param array $providers
         * @return bool
         */
        public static function serviceProviders($providers = [])
        {

            Config::add('general.providers', $providers);
            return true;
        }


        /**
         * Sayfayı kapatır
         * @param callable|null $callable
         * @return mixed
         */
        public static function Down(callable $callable = null)
        {
            $response = $callable(Singleton::make('Anonym\Http\Request'));
            if ($response instanceof ShouldBeView) {
                $view = $response->execute();
                response($view)->execute();
            } elseif ($response instanceof ShouldBeResponse) {
                return $response->execute();
            }
        }

        /**
         * Sayfa bulunamazsa yapılacak ayarı içerik
         * @param callable|null $miss
         */
        public static function miss($miss = null)
        {
            Config::set('general.route.miss', $miss);
        }

        /**
         * @param string $delimiter
         * @throws Exception
         */
        public static function delimiter($delimiter = '')
        {
            if (!is_string($delimiter)) {
                throw new Exception('Girdiğiniz sınırlayıcı değer geçerli bir string değeri değil');
            }

            Config::set('general.route.delimiter', $delimiter);

        }


        /**
         * @param callable|null $callback
         */
        public static function exception(callable $callback = null)
        {
            Config::set('app.exception.handler', $callback);
        }

        /**
         * Hataların yakalanacağı uygulamayı ayarlar
         * @param callable|null $callback
         */
        public static function error(callable $callback = null)
        {
            Config::set('app.error.handler', $callback);
        }
    }
