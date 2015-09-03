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
 * |----------------------------
 * |the constant for base files
 * |----------------------------
 */
define('BASE', getcwd() . '/');

/**
 * |----------------------------
 * |the constant for application files
 * |----------------------------
 */
define('APP', BASE . 'App/');

/**
 * |----------------------------
 * |the constant for config files
 * |----------------------------
 */
define('CONFIG', BASE. 'configs/');

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
define('UPLOAD', BASE. PUBLIC_FILES . 'uploads/');


/**
 * |----------------------------
 * |the constant for language files
 * |----------------------------
 */
define('LANGUAGE', RESOURCE . 'languages/');

/**
 * |----------------------------
 * |the constant for view files
 * |----------------------------
 */
define('VIEW', RESOURCE . 'views/');
/**
 * |----------------------------
 * |the constant for database files
 * |----------------------------
 */
define('DATABASE', APP . 'Database/');

/**
 * |----------------------------
 * |the constant for http files
 * |----------------------------
 */
define('HTTP', APP . 'Http/');
/**
 * |----------------------------
 * |the constant for routes.php
 * |----------------------------
 */
define('ROUTE_PHP', HTTP . 'routes.php');

/**
 * |----------------------------
 * |the constant for migration files
 * |----------------------------
 */
define('MIGRATION', DATABASE. 'Migrations/');

/**
 * |----------------------------
 * |the constant for migrations namespace
 * |----------------------------
 */
define('MIGRATION_NAMESPACE', 'App\Database\Migrations\\');

/**
 * |----------------------------
 * |the constant for backups files
 * |----------------------------
 */
define('BACKUP', DATABASE. 'Backups/');

/**
 * |----------------------------
 * |the constant for asset files
 * |----------------------------
 */
define('ASSETS', PUBLIC_FILES. 'assets/');

/**
 * |----------------------------
 * | include the autoloader
 * |----------------------------
 */

include BASE . 'vendor/autoload.php';

/**
 * |----------------------------
 * | create an application
 * |----------------------------
 */

$app = new \Anonym\Bootstrap\Bootstrap('AnonymPHP', 2);
return $app;
