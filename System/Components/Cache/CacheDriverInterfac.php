<?php
    /**
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     * @copyright AnonymMedya, 2015
     */

    namespace Anonym\Cache;

    interface CacheDriverInterface
    {

        /**
         * Driver 'ın yönetmeye uygun olup olmadığına bakar
         *
         * @return mixed
         */
        public function checkDriver();


    }