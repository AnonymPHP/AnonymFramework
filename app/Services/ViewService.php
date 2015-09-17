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
 * Class ViewService
 * @package App\Services
 */
class ViewService extends ServiceProvider
{

    /**
     * the list of header files
     *
     * @var array
     */
    protected $headers = [

    ];

    /**
     * the list of footer files
     *
     * @var array
     */
    protected $footers = [

    ];

    /**
     * register the provider
     *
     * @return mixed
     */
    public function register()
    {
        Config::set('view.header', $this->headers);
        Config::set('view.footer', $this->footers);
    }
}