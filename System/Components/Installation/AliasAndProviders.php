<?php
    /**
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     * @copyright AnonymMedya, 2015
     */

    namespace Anonym\Installation;


    use Anonym\Application;
    use Anonym\Helpers\Config;
    use Anonym\Patterns\Facade;

    class AliasAndProviders
    {

        /**
         * Takma at ve hazırlayıcıları çalıştırır
         * @param Application $app
         */
        public function __construct(Application $app)
        {

            $alias = Config::get('general.alias');
            $providers = Config::get('general.providers');

            Facade::$instance = $alias;

            foreach ($providers as $provider) {
                new $provider($app);
            }

        }

    }