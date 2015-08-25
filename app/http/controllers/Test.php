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
use Anonym\Components\HttpClient\Request;

class Test extends Controller
{

    public function hello(Request $request, $param)
    {
        print_r(func_get_args());
    }

}