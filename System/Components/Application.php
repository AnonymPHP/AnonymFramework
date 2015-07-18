<?php

    /**
     *      * Bu Sınıf AnonymFramework'un başlangıç sınıfıdr
     *      * Framework le ilgili olaylar ilk olarak bu s�n�fta ger�ekle�ir
     *      *
     *      * @author <vahitserifsaglam <vahit.serif119@gmail.com>
     *      * @version 1.0.0
     *      * @package Anonym
     *      */

    namespace Anonym;

    use Anonym\Helpers\Config;
    use Anonym\Helpers\Server;
    use Anonym\Patterns\Singleton;
    use Anonym\Security\TypeHint;
    use Anonym\Installation\AllConfigsLoader;
    use Anonym\Installation\AliasAndProviders;
    use Anonym\Installation\ErrorConfigs;
    use System\SystemManager;
    use ArrayAccess;
    use Anonym\Route\Router;

    /**
     * @class Application
     *
     */
    class Application implements ArrayAccess
    {

        use Server;

        /**
         * @var string
         *
         * Önbelleğe alınmış ayarın yolunu döndürür
         */
        private $cachedConfig = 'stroge/cache/system/config.php';

        /**
         * Yürütülen Bootstrap dosyalarını tutar
         *
         * @var array
         */
        private $runnedBootstraps;

        /**
         * Uygulumanın başlangıcı için gerekli olan dosyalar
         *
         * @var array
         */

        private $bootstraps = [
            AllConfigsLoader::class,
            SystemManager::class,
            AliasAndProviders::class,
            ErrorConfigs::class,
        ];

        /**
         *    Framework 'un adı ve versionu girilir,
         *    Ve framework başlatılır
         *
         * @param string $name
         * @param int $version
         *
         */
        public function __construct($name = '', $version = 1)
        {

            define('FRAMEWORK_NAME', $name);
            define('FRAMEWORK_VERSION', $version);

            $this->runBootstraps();
        }


        /**
         * Facade takma adlarını döndürür
         *
         * @return mixed
         */
        public function getAlias()
        {
            return Config::get('general.alias');
        }

        /**
         * Başlatıcı sınıfları yürütür
         */
        private function runBootstraps()
        {
            $classes = $this->bootstraps;

            foreach ($classes as $class) {
                $class = new $class($this);
                $this->runnedBootstraps[get_class($class)] = $class;
            }
        }

        /**
         *  $bool girilirse fonksiyonlar tip yakalaması gerçekleşir
         *
         * @param bool $bool
         *
         */
        public function typeHint($bool = true)
        {

            if (true === $bool) {
                TypeHint::setErrorHandler();
            }
        }


        /**
         *  Yeni bir singleton objesi oluşturur
         *
         * @param mixed $instance
         * @param mixed ...$parameters
         * @return Object
         *
         */
        public function singleton($instance, array $parameters = [])
        {

            return Singleton::make($instance, $parameters);
        }


        /**
         * Uygulamayı Yürütür
         *
         */
        public function run()
        {
            $make = $this->singleton(Router::class);
            $make->run();
            response()->send();
        }

        /**
         * Önbelleğe alınmış ayar dosyasını döndürür
         *
         * @return string
         */
        public function getCachedConfig()
        {
            return $this->cachedConfig;
        }

        /**
         * Dizi olarak erişilirken itemin olup olmadığına bakılır
         *
         * @param  string $key
         * @return bool
         */
        public function offsetExists($key)
        {
            $alais = $this->getAlias();

            if (isset($alias[$key])) {
                return true;
            } else {
                return false;
            }
        }

        /**
         * Dizi olarak erişilirken Veri çekmekte kullanılır
         *
         * @param  string $key
         * @return mixed
         */
        public function offsetGet($key)
        {
            $alias = $this->getAlias();
            $facade = $alias[$key];
            return $this->singleton($facade);
        }

        /**
         * Dizi olarak erişilirken veri eklemede kullanılır
         *
         * @param  string $key
         * @param  mixed $value
         * @return void
         */
        public function offsetSet($key, $value)
        {
            Config::set(sprintf('general.alias.%s', $key), $value);
        }

        /**
         * Array olarak erişilirken veri unset edildiğinde yapılır
         *
         * @param  string $key
         * @return void
         */
        public function offsetUnset($key)
        {
            Config::set(sprintf('general.alias.%s', $key), null);
        }

        /**
         * Girilen fonksiyonu çağırır
         *
         * @param string $class
         * @param string $method
         * @param array $params
         * @return mixed
         */
        public function call($class, $method = '', $params = [])
        {
            return call_user_func_array([$class, $method], $params);
        }
    }