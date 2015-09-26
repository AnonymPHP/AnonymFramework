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


use Anonym\Application\ServiceProvider;
use Anonym\Facades\Config;
use Anonym\Facades\View;

/**
 * Class ViewService
 * @package App\Services
 */
class ViewService extends ServiceProvider
{

    /**
     *  register the composer and creator files in here
     */
    public function register()
    {

        $this->composers();
    }

    /**
     * register view composers in here or somewhere else, your call
     *
     *
     * @return void
     */
    protected function composers()
    {


    }
}
