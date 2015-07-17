<?php

    /**
     * Bu trait AnonymFramework'un yardımcılarından biridir, bir olaya erişim hakkınızın olup olmadığını kontrol eder.
     *
     * @see Laravel\Middleware
     * @see AnonymFramework\AccessManager
     * @copyright (c) 2015, MyfcYazilim
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     */

    namespace Anonym\Helpers;

    use Anonym\Helpers\Access\Interfaces\Handle;
    use Anonym\Helpers\Access\Interfaces\Terminate;
    use Anonym\Http\Request;
    use RuntimeException;

    trait Access
    {

        private $access;

        /**
         * Geçerli bir access atanmışmı diye bakar
         *
         * @param string $name
         * @return string|boolean
         */
        public function getAccess($name)
        {

            if (isset($this->access[$name])) {

                return $this->access[$name];
            } else {

                return false;
            }
        }

        /**
         * Fonksiyonları tetikleyerek dönen verileri alır
         *
         * @param string  $name
         * @param Closure $next
         * @param string  $role
         * @return boolean
         */
        public function checkAccess($name, $next, $role = null)
        {

            if ($access = $this->getAccess($name)) {

                $manager = new $access;

                if ($manager instanceof Handle) {
                    $request = new Request();
                    $response = $manager->handle($request, $next, $role);
                    if ($response) {

                        return true;
                    } elseif ($manager instanceof Terminate) {

                        $response = $manager->terminate($request);
                        if ($response) {

                            return true;
                        }
                    }
                } else {

                    throw new RuntimeException(
                       sprintf('%s isimli Access sınıfınız %s interface\'ine sahip olmalıdır ',
                          $name,
                          'Anonym\AccessManager\Interfaces\Handable'
                       ));
                }
            } else {

                throw new RuntimeException(sprintf('%s isimli bir Access bulunamadı', $name));
            }
        }

        /**
         * AccessAtaması yapar
         *
         * @param array $access
         */
        public function setAccess(array $access = [])
        {

            $this->access = $access;
        }
    }
