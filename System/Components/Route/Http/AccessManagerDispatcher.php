<?php
    /**
     * Bu Dosya AnonymFramework'e ait bir dosyadır.
     *
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     * @see http://gemframework.com
     *
     */

    namespace Anonym\Route\Http;

    use Anony\Route\AccessManager\Capsule;
    use Anonym\Route\AccessManager\Interfaces\Handle;
    use Anonym\Route\AccessManager\Interfaces\Terminate;

    /**
     * Class AccessManagerDispatcher
     * @package Anonym\Route\Http
     */

    class AccessManagerDispatcher
    {

        /**
         * Erişim yönetimi nesnesini depolar
         *
         * @var null|Handle|strin g
         */
        private $manager;

        /**
         * Tetiklenecek sonraki işlemi tutar
         *
         * @var callable
         */
        private $next;

        /**
         * Röle bilgisini tutar
         *
         * @var string
         */
        private $role;

        /**
         * @param null $manager
         * @param callable|null $next
         * @param string $role
         */
        public function __construct($manager = null, callable $next = null, $role = '')
        {
            $this->manager = $manager;
            $this->next =  $next;
            $this->role = $role;
        }

        /**
         * İçeriği parçalar ve değeri döndürür
         *
         * @return bool
         */
        public function dispatch()
        {
             $manager = $this->manager;

             if(is_string($manager))
             {
                 if (Capsule::has($manager)) {
                     $manager = Capsule::getManager($manager);
                     $manager = new $manager();
                 }
             }

            if (null === $manager) {
                return true;
            }

            $next = $this->next;
            $request = new Request();
            $role = $this->role;

            $handle = call_user_func_array([$manager, 'handle'], [$request, $next, $role]);
            if ($handle) {
                return true;
            } else {

                if ($manager instanceof Terminate) {
                    call_user_func_array([$manager, 'terminate'], [$request]);
                }
            }
        }

    }