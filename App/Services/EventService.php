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
use Anonym\Components\Event\EventCollector;

class EventService extends ServiceProvider
{

    /**
     * the list of events
     *
     * @var array
     */
    protected $events = [

    ];

    /**
     * register the provider
     *
     * @return mixed
     */
    public function register()
    {
        EventCollector::setListeners($this->events);
        include APP.'events.php';
    }
}