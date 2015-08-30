<?php
/**
 * This file belongs to the AnoynmFramework
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 * Thanks for using
 */

namespace Console;

use Console\Commands\Migration;
/**
 * Class System
 * @package Console
 */
class System
{

    /**
     * the repository of console commands
     *
     * @var array
     */
    protected $commands =
        [
            Migration::class
        ];

}