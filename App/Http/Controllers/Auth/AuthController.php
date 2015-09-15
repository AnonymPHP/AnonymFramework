<?php
/**
 * This file belongs to the AnoynmFramework
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 * Thanks for using
 */

namespace App\Http\Controllers\Auth;

use Anonym\Components\Route\Controller;
use Anonym\Facades\Config;
use Anonym\Facades\Crypt;
use Anonym\Facades\Element;
use Anonym\Facades\Login;
use Anonym\Facades\Register;

/**
 * Class AuthController
 * @package App\Http\Controllers\Auth
 */
class AuthController extends Controller
{

    /**
     * create a new user
     *
     * @param array $data
     * @return mixed
     */
    protected function create($data){

        $results = [];

        array_walk($data, function($key, $value) use(&$results){

            $login = Config::get('database.tables.login');
            $table = $login[1];

            if($key === $table){

                $value = Crypt::encode($value);
            }
            $results[] = [$key,$value];
        });

        return Register::register($results);
    }


    /**
     * login a user with username and password
     *
     * @param string $username
     * @param string $password
     * @param bool|false $remember
     * @return mixed
     */
    protected function entry($username, $password, $remember = false){
        return Login::login($username, Crypt::encode($password), $remember);
    }

    protected function forgetSendMail($username, $mailDriver = 'default')
    {
        $table = Config::get('database.tables.table');

        $database = Element::table($table);
        $username = first(Config::get('database.tables.login'));


        $userInformation = $database->select(['email', 'id'])->where('username', $username);

        if($userInformation->rowCount()){

        }



    }
}
