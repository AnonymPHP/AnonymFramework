<?php
/**
 * This file belongs to the AnoynmFramework
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 * Thanks for using
 */


namespace Console\Commands;


use Anonym\Components\Console\Command;
use Anonym\Components\Console\HandleInterface;

/**
 * Class MakeEvent
 * @package Console\Commands
 */
class MakeEvent extends Command implements HandleInterface
{

    /**
     * the signature of command
     *
     * @var string
     */
    protected $signature = 'make:event {name}';


    /**
     * the description of command
     *
     * @var string
     */
    protected $description = 'create an event';

    /**
     * create an event instance
     */
    public function __construct()
    {
        parent::__construct();
    }

}
