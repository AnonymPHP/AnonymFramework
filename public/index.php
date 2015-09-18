<?php

/**
 * |*******************************
 * |
 * | Anonym Framework, Devoloped For Turkish PHP Devolopers
 * |
 * |-----------------------------
 * |
 * | @author vahitserifsaglam1 <vahit.serif119@gmail.com>
 * | @packpage Anonym
 * | @homepage gemframework.com, anonymphp.com
 * | @support anonymphp.com/support
 * |
 * |*****************************
 */

if(!file_exists('../system/bootstrap.php')){
   return false;
}

$app = include '../system/bootstrap.php';

$content = '<?php return '.var_export(get_included_files(), true).';'.PHP_EOL;
file_put_contents('../console/Commands/Optimize/core.php', $content);
