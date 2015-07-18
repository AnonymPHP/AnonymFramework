<?php

    namespace Anonym\Route\Http;

    use Exception;
    use Anonym\Helpers\Access\Interfaces\Handle;
    use Anonym\Helpers\Access\Interfaces\Terminate;
    use Anonym\Http\Request;
    use Anonym\Http\Response\ShouldBeResponse;
    use Anonym\Route\Http\Dispatchers\CallableDispatcher;
    use Anonym\Route\Http\Dispatchers\ControllerDispatcher;
    use Anonym\View\ShouldBeView;

    class Dispatch
    {

        private $dispatchController;
        private $dispatchCallable;
        private $method = null;

        private $before = null;
        private $access = null;
        private $params = null;
        private $next = null;
        private $role = null;

        const CONTROLLER_METHOD = 1;
        const CALLABLE_METHOD = 2;

        protected function setRouteControllerForDispatch($controller = null)
        {
            $this->method = self::CONTROLLER_METHOD;
            $this->dispatchController = $controller;
        }

        /**
         * Route olayında bir callable çağırmak istiyorsanız bunu kullanırsınız
         *
         * @param null $callable
         * @return $this
         */
        protected function setRouteCallableForDispatch($callable = null)
        {

            $this->method = self::CALLABLE_METHOD;
            $this->dispatchCallable = $callable;
        }

        /**
         * @param callable $next
         * @return $this
         */
        protected function setNext(callable $next = null)
        {

            $this->next = $next;

            return $this;
        }

        /**
         * Before ataması yapar
         *
         * @param callable $before
         * @return $this
         */
        public function setBefore(callable $before = null)
        {
            $this->before = $before;

            return $this;
        }

        /**
         * Access Yöneticisini atar.
         *
         * @param HandleInterface $handler
         * @return $this
         */
        public function setAccess(Handle $handler = null)
        {

            $this->access = $handler;

            return $this;
        }

        public function setParams(array $params = [])
        {

            $this->params = $params;

            return $this;
        }

        /**
         * Çıktıyı oluşturur
         *
         * @throws Exception
         */
        public function dispatch()
        {

            $controller = $this->dispatchController;
            $callable = $this->dispatchCallable;
            if (is_null($controller) && is_null($callable)) {

                throw new Exception('Herhangi bir Controller veya Callable methodu atamadınız');
            }

            $method = $this->method;

            if ($this->beforeChecker() && $this->accessChecker(
                    new AccessManagerDispatcher($this->access, $this->next, $this->role)
                )
            ) {

                switch ($method) {

                    case self::CALLABLE_METHOD:
                        $this->response($this->callableDispatcher());
                        break;
                    case self::CONTROLLER_METHOD:
                        $this->response($this->controllerDispatcher());
                        break;
                    default:
                        throw new Exception('Geçersiz bir yapı girdiniz');
                        break;
                }
            }
        }

        /**
         * @param null $response
         */
        private function response($response = null)
        {
            if($response instanceof ShouldBeView)
            {
                $response->execute();
            }
        }

        /**
         * Parametreleri döndürür
         *
         * @return null
         */
        public function getParams()
        {

            return $this->params;
        }

        /**
         * @param null $role
         * @return $this
         */

        protected function setRole($role = null)
        {
            $this->role = $role;

            return $this;
        }

        /**
         * Çağrılabilir fonksiyonu çalıştırır
         *
         * @return mixed
         */
        private function callableDispatcher()
        {

            return  (new CallableDispatcher($this->dispatchCallable, $this->getParams()))->getContent();
        }


        /**
         * controller olarak oluşturulan sistemi parçalar
         *
         * @return ControllerDispatcher
         */
        private function controllerDispatcher()
        {

            return  (new ControllerDispatcher($this->dispatchController, $this->getParams()))->getContent();
        }

        /**
         * giriş yetkisinin olup olmadığını kontrol ediyoruz
         * @param AccessManagerDispatcher
         * @return bool
         */
        private function accessChecker(AccessManagerDispatcher $managerDispatcher)
        {
            return $managerDispatcher->dispatch();
        }

        /**
         * Before olayını test eder
         *
         * @return bool
         */
        private function beforeChecker()
        {

            if (null === $this->before) {
                return true;
            }
            if (call_user_func_array($this->before, $this->getParams())) {
                return true;
            }
        }
    }
