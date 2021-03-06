<?php
/**
 * This file belongs to the AnoynmFramework
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 * Thanks for using
 */


namespace App\Http\Middleware;

use Anonym\Facades\Guard;
use Anonym\Facades\Redirect;
use Anonym\Http\Request;
use Anonym\Route\MiddlewareInterface;
use Anonym\Route\TerminateInterface;

/**
 * Class Auth
 * @package App\Http\Middleware
 */
class Auth implements MiddlewareInterface, TerminateInterface
{

    /**
     * Handle the user access
     *
     * @param Request $request the instance of request
     * @param mixed $role the user role
     * @param callable|null $next work to be done
     * @return mixed
     */
    public function handle(Request $request, $role, callable $next = null)
    {

        if (!Guard::isLogined()) {
            Redirect::to('/');
        }

        $next($request);

    }

    /**
     * terminate the request
     *
     * @param Request $request
     * @return mixed
     */
    public function terminate(Request $request)
    {
        //
    }
}
