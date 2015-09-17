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

class ConfigCacheCommand extends Command implements HandleInterface
{
    /**
     * the signature of command
     *
     * @var string
     */
    protected $signature = 'config:cache';

    /**
     * the description of command
     *
     * @var string
     */
    protected $description = 'cache all config files';


}