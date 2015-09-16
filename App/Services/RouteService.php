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
         App::bind('route.not.found', function(){
              throw new RouteMatchException(sprintf('There is nothing Here'));
         });
    }
}
