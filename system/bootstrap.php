<?php
/**
 * This file belongs to the AnoynmFramework
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 * Thanks for using
 */

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
 * AnonymFramework Application
 *
 */
$app = new \Anonym\Bootstrap\Bootstrap('AnonymFramework', 2);
return $app;