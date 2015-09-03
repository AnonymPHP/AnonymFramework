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
use Anonym\Components\Route\AccessBag;

class MiddlewareService extends ServiceProvider
{

    /**
     * the list of middlewares
     *
     * @var array
     */
    protected $middleware = [

    ];

    /**
     * register the provider
     *
     * @return mixed
     */
    public function register()
    {
        AccessBag::setAccesses($this->middleware);
    }
}