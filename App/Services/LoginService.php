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
 *
 * Class LoginService
 * @package App\Services
 */
class LoginService  extends ServiceProvider
{

    /**
     * parameters for login
     *
     * @var array
     */
    protected $login = ['username', 'password'];

    /**
     * parameters for session
     *
     * @var array
     */
    protected $select = [
        'username', 'email', 'role'
    ];

    /**
     * parameters for role security
     *
     * @var array
     */
    protected $role = [
        'column' => 'role',
        'roles' => [
            'user' => 0,
            'password' => 1
        ]
    ];

    /**
     * register the provider
     *
     * @return mixed
     */
    public function register()
    {
        Config::set('database.tables.login', $this->login);
        Config::set('database.tables.select', $this->select);
        Config::set('database.tables.authentication', $this->role);
    }
}
