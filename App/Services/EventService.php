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
use Anonym\Facades\Config;
use App\Events\TestEvent;
use App\Listeners\TestListener;
/**
 * Class EventService
 * @package App\Services
 */
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
        $events = Config::get('event.events');

        EventCollector::setListeners(array_merge($this->events, $events));
        include APP.'events.php';
    }
}