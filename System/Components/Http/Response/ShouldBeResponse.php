<?php

    /**
     *  Bu interface AnonymFramework 'Route Manager ve response arasındaki ilişikiyi sağlamakta kullanılır

     */
    namespace Anonym\Http\Response;

    /**
     * Interface ShouldBeResponse
     *
     * @package Anonym\Http\Response
     */
    interface ShouldBeResponse
    {
        /**
         *
         * @return mixed
         */
        public function execute();
    }
