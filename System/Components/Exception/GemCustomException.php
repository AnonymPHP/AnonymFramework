<?php
    namespace Anonym\Exception;
    use Exception;

    /**
     * Class AnonymCustomException
     * @package Anonym\Exception
     */

    class AnonymCustomException extends Exception
    {
        /**
         * @param string $message
         * @param int $code
         * @param string $file
         * @param int $line
         */
        public function __construct($message, $code, $file, $line)
        {
            $this->message = $message;
            $this->code = $code;
            $this->file = $file;
            $this->line = $line;
        }
    }