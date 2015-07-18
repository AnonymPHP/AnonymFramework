<?php
    /**
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     */
    namespace Anonym\Route\AccessManager\Interfaces;

    use Anonym\Http\Request;

    /**
     * Interface Terminate
     * @package Anonym\Route\AccessManager\Interfaces
     */

    interface Terminate
    {

        /**
         * İçerik sonlandırılacağı zaman tetiklenir
         *
         * @param Request $request
         * @return mixed
         */
        public function terminate(Request $request);
    }
