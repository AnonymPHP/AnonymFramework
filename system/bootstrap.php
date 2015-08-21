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

/**
 * |----------------------------
 * |the constant for base files
 * |----------------------------
 */
define('BASE', dirname(__DIR__) . '/');

/**
 * |----------------------------
 * |the constant for application files
 * |----------------------------
 */
define('APP', BASE . 'app/');

/**
 * |----------------------------
 * |the constant for config files
 * |----------------------------
 */
define('CONFIG', APP . 'configs/');

/**
 * |----------------------------
 * |the constant for system files
 * |----------------------------
 */
define('SYSTEM', BASE . 'system/');

/**
 * |----------------------------
 * |the constant for resource files
 * |----------------------------
 */
define('RESOURCE', BASE . 'resources/');


/**
 * |----------------------------
 * |the constant for public files
 * |----------------------------
 */
define('PUBLIC_FILES', BASE . 'public/');

/**
 * |----------------------------
 * |the constant for upload files
 * |----------------------------
 */
define('UPLOAD', PUBLIC_FILES . 'uploads/');

/**
 *
 * AnonymFramework Application
 *
 */
$app = new \Anonym\Bootstrap\Bootstrap('AnonymPHP', 2);
return $app;