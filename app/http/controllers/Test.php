<?php
/**
 * This file belongs to the AnoynmFramework
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 * Thanks for using
 */

namespace Anonym\Controllers;


use Anonym\Components\Route\Controller;

class Test extends Controller
{

    public function hello($param)
    {
        echo $param;
    }

}