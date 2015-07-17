<?php
    /**
     *  Çağrılabilir Fonksiyon'u çalıştırır
     */
    namespace Anonym\Route\Http\Dispatchers;

    use Anonym\Support\Accessors;

    class CallableDispatcher
    {
        protected $content;
        use Accessors;

        public function __construct(callable $call = null, array $params = [])
        {
            $this->setContent(call_user_func_array($call, $params));
        }
    }
