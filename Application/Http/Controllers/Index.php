<?php
    /**
     *  Bu sınıf AnonymFramework'un örnek bir controller dosyasıdır.
     *
     * @packpage Application\Controllers
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     */

    namespace Application\Controllers;


    use Anonym\Route\Controller;

    /**
     * Class IndexController
     *
     * @package Application\Controllers
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

            // Application/Http/Views/index.php
            return view('index');
        }
    }
