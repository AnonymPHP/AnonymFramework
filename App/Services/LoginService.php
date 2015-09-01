<?php
/**
 * This file belongs to the AnoynmFramework
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 * Thanks for using
 */


namespace App\Services;
use Anonym\Bootstrap\ServiceProvider;

class LoginService  extends ServiceProvider
{

    /**
     * parameters for login
     *
     * @var array
     */
    protected $login = ['username', 'password'];

    /**
     * register the provider
     *
     * @return mixed
     */
    public function register()
    {


    }
}