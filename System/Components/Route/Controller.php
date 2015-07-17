<?php

    namespace Anonym\Route;

    use Anonym\App;
    use Anonym\Http\Response\ShouldBeResponse;
    use Anonym\Support\MethodDispatcher;

    /**
     * Bu sınıf AnonymFramework Controller dosyasında extend üzere yapılmıştır.
     * Class Controller
     *
     * @package Anonym\Route
     */
    abstract class Controller
    {
        use MethodDispatcher;
        protected $model;
        protected $job;
        protected $response;

        /**
         * Girilen model ismine göre Model'i çağırır
         *
         * @param string $modelName Kullanılacak olan Model'in ismi
         * @return mixed
         */
        public function model($modelName = '')
        {
            $this->model = App::uses($modelName, App::MODEL);

            return $this->model;
        }

        /**
         * Response Objesini atar
         *
         * @param ShouldBeResponse $response
         * @return $this
         */
        public function response(ShouldBeResponse $response)
        {
            $this->response = $response;

            return $this;
        }

        /**
         * @return Anonym\Http\Response
         */
        public function getResponse()
        {
            return $this->response;
        }


        /**
         * @param null $name
         * @param null $value
         * @return $this
         */
        public function __set($name = null, $value = null)
        {
            $this->job->$name = $value;

            return $this;
        }

    }
