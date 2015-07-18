<?php
    /**
     *  Çağrılabilir Fonksiyon'u çalıştırır
     */
    namespace Anonym\Route\Http\Dispatchers;

    use Anonym\Support\Accessors;

    /**
     * Class CallableDispatcher
     * @package Anonym\Route\Http\Dispatchers
     */

    class CallableDispatcher
    {

        private $content;
        use Accessors;
        /**
         * Çağrılabilir fonkisonu yürütür
         *
         * @param callable|null $call
         * @param array $params
         */
        public function __construct(callable $call = null, array $params = [])
        {
            $this->setContent(call_user_func_array($call, $params));
        }
    }
