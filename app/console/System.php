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
    protected $commands;

    /**
     * return the registered commands
     *
     * @return array
     */
    public function getCommands()
    {
        return $this->commands;
    }

    /**
     * register the commands
     *
     * @param array $commands
     * @return System
     */
    public function setCommands($commands)
    {
        $this->commands = $commands;
        return $this;
    }


}