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

/**
 * Class Index
 * @package Anonym\Controllers
 */
class Index extends Controller
{

    /**
     *
     * start the controller
     *
     */
    public function boot()
    {
        print_r($_SERVER);
        return view('index');
    }

}