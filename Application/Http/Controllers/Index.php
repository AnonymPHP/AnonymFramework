<?php
    /**
     *  Bu sınıf AnonymFramework'un örnek bir controller dosyasıdır.
     *
     * @packpage Anonym\Controllers
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     */

    namespace Anonym\Controllers;

    use Anonym\Cache;
    use Anonym\Redis;
    use Anonym\Route\Controller;
    use Anonym\View;

    /**
     * Class IndexController
     *
     * @package Anonym\Controllers
     */
    class Index extends Controller
    {
        /**
         *  Starter Function
         */
        public function __construct()
        {
            //
        }

        /**
         * Route tarafından Index::boot atandığı için bu tetiklenir.
         *
         * @return View
         */

        public function open()
        {

            $cache = new Cache();
            $cache->set('aa','bb');
            // Application/Http/Views/index.php
            return view('index');
        }
    }
