<?php
/**
 * This file belongs to the AnoynmFramework
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 * Thanks for using
 */

include dirname(__DIR__). '/vendor/autoload.php';

/**
 *
 *  the constant for application dir
 *
 */
define('APP', 'app/');

/**
 *
 * the constant for config dir
 *
 */

define('CONFIG', APP . 'configs/');

/**
 *
 *  the constant for system dir
 *
 */
define('SYSTEM', 'system/');

/**
 *
 * AnonymFramework Application
 *
 */
$app = new \Anonym\Bootstrap\Bootstrap('AnonymFramework', 2);
return $app;