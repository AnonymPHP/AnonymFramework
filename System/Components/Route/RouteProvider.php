<?php
    /**
     *
     *  Bu Sınıf AnonymFramework'de Route İşlemlerini toplaması için yapılmıştır
     *  private $routes değerleri değiştirilebilir.
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     *
     */

    namespace Anonym\Route;

    use Anonym\Application;

    class RouteProvider
    {

        private $routes = [

        ];

        /**
         * Dinleyiciyi oluşturur ve rötaları o sınıfa atar
         * @param Application $application
         */
        public function __construct(Application $application)
        {

            $listener = $application->singleton('Anonym\Route\RouteListener');
            $listener->setRoutes($this->routes);
            $application->singleton('Anonym\Route\RouteCollector');

        }

    }
