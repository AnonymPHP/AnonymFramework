<?php
/**
 * This file belongs to the AnoynmFramework
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 * Thanks for using
 */

$app = include 'system/bootstrap.php';

$console = new \Anonym\Components\Console\Console(1);
// run the console
$console->run();