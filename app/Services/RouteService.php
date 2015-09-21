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
use Anonym\Components\Route\RouteMatchException;
use Anonym\Facades\App;

/**
 * Class RouteService
 * @package App\Services
 */
class RouteService extends ServiceProvider
{

    /**
     * register the provider
     *
     * @return mixed
     */
    public function register()
    {
        App::bind('route.not.found', function () {
            App::abort(404, 'Page Not Found');
        });

        App::bind('route.middleware.failed',  function(){
            throw new MiddlewareException('You can\'t access here, your authority is incorrect');
        });
    }
}
