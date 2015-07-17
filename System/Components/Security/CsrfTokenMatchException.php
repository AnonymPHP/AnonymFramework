<?php

    namespace Anonym\Security;

    use Exception;

    class CsrfTokenMatchException extends Exception
    {
        public function __construct($message = '')
        {
            $this->message = $message;
        }
    }
