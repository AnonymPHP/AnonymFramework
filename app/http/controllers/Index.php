<?php
/**
 * This file belongs to the AnoynmFramework
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 * Thanks for using
 */

namespace App\Http\Controllers;


use Anonym\Components\Route\Controller;
use Anonym\Patterns\Singleton;

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
        return view('index');
    }

}