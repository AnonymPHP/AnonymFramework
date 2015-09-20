<?php
/**
 * |----------------------------
 * | define the base dir, if application working o a console define the root dir, if it is working on server define the public dir.
 * |----------------------------
 */
define('BASE', isset($_SERVER['HTTP_HOST']) ? dirname(getcwd()) . '/' : dirname(__DIR__) . '/');

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
define('CONFIG', BASE . 'configs/');

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
define('MIGRATION', DATABASE . 'Migrations/');

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
define('BACKUP', DATABASE . 'Backups/');

/**
 * |----------------------------
 * |the constant for asset files
 * |----------------------------
 */
define('ASSETS', PUBLIC_FILES . 'assets/');

/**
 * |----------------------------
 * | include the autoloader
 * |----------------------------
 */

include BASE . 'vendor/autoload.php';

/**
 * |
 * | we will include the compiled file, it gonna a better performance for framework
 * |
 */
if (file_exists($path = RESOURCE . 'bootstrap/_compiled.php.cache')) {
    include $path;
}

use Anonym\Bootstrap\Bootstrap;

/**
 * |----------------------------
 * |  create a new application and return it
 * |----------------------------
 */
return new Bootstrap('AnonymPHP', 2);
