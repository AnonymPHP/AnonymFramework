<?php
    /**
     * Bu sınıf Eventler'i denl

     */
    namespace Anonym\Event;

    use Anonym\Application;

    class EventCollector
    {

        protected $application;
        private $listeners;

        /**
         * Uygulamayı atar
         *
         * @param Application $application
         */

        public function __construct(Application $application)
        {

            $this->application = $application;
        }

        /**
         * Dinleyicileri $this->listeners değerine atar
         *
         * @param array $listeners
         * @return $this
         */
        public function setListeners(array $listeners = [])
        {

            $this->listeners = $listeners;

            return $this;
        }

        /**
         * Dinleyicileri Döndürür
         *
         * @return mixed
         */
        public function getListeners()
        {

            return $this->listeners;
        }

        /**
         * Uygulama' yı döndürür
         *
         * @return Application
         */
        public function getApplication()
        {

            return $this->application;
        }
    }
