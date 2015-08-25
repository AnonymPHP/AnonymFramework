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
use Anonym\Models\User;

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
        $get = User::find(1)->read();
        print_r($get->rowCount());
    }

}