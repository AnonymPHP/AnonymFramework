<?php


    /**
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     */
    namespace Anonym\Route\AccessManager\Interfaces;
    use Anonym\Http\Request;

    /**
     * Interface Handle
     * @package Anonym\Route\AccessManager\Interfaces
     */
    interface Handle
    {

        /**
         * Access Manager ilk yakalandığı zaman tetiklenecek işlem
         *
         * @param Request $request
         * @param callable|null $next
         * @param null $role
         * @return mixed
         */
        public function handle(Request $request, callable $next = null, $role = null);
    }
