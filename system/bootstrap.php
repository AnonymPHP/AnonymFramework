<?php
/**
 * This file belongs to the AnoynmFramework
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 * Thanks for using
 */

include dirname(__DIR__) . '/vendor/autoload.php';

define('BASE', dirname(__DIR__) . '/');

/**
 *
 *  the constant for application dir
 *
 */
define('APP', BASE . 'app/');

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
define('SYSTEM', BASE . 'system/');

/**
 *  CONSTANT for resoruces
 */
define('RESOURCE', BASE . 'resources/');


/**
 * the constant for public files
 */
define('PUBLIC', BASE . 'public/');


/**
 *
 * AnonymFramework Application
 *
 */
$app = new \Anonym\Bootstrap\Bootstrap('AnonymFramework', 2);
return $app;