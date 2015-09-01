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
use Anonym\Facades\Config;

/**
 * Class RegisterServicer
 * @package App\Services
 */
class RegisterService extends ServiceProvider
{
    /**
     * parameters for login
     *
     * @var array
     */
    protected $register = [];

    /**
     * register the provider
     *
     * @return mixed
     */
    public function register()
    {
        Config::set('database.tables.register', $this->register);
    }
}
