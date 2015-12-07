<?php
/**
 *  This file belongs to AnonymPHP Framework
 *
 * @author vahitserifsaglam1 <vahit.serif119@gmail.com>
 * @website http://anonymphp.com/framework
 */

namespace Anonym\Validation;
use Exception;

/**
 * Class MethodNotExists
 * @package Anonym\Validation
 */
class MethodNotExists extends Exception
{

    /**
     * throws the given exception message
     *
     * the constructor of MethodNotExists .
     * @param string $message
     */
    public function __construct($message)
    {
        $this->message = $message;
    }
}
