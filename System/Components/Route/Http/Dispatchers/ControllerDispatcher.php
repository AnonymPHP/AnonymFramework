<?php

    namespace Anonym\Route\Http\Dispatchers;

    use Anonym\Support\Accessors;

    /**
     * Class ControllerDispatcher
     * @package Anonym\Route\Http\Dispatchers
     */
    class ControllerDispatcher
    {

        /**
         * @param null $controller
         * @param array $params
         */
        public function __construct($controller = null, array $params = [])
        {

            if (is_string($controller)) {
                list($controller, $method) = $this->parseControllerString($controller);

                $controller = "Application\\Controllers\\" . $controller;
                $controller = new $controller();
            } else {
                $method = "handle";
            }

           call_user_func_array([$controller, $method], $params);
        }

        /**
         * Veriyi :: ile parçalar
         *
         * @param string $controller
         * @return array
         */
        private function parseControllerString($controller = '')
        {

            $parse = explode('::', $controller);
            if (count($parse) == 1) {
                $parse[1] = "handle";
            }

            return $parse;
        }
    }

