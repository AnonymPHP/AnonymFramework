<?php

ini_set('display_errors', 'On');

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

if (!file_exists('../system/bootstrap.php')) {
    return false;
}

/**
 * | -----------------------------------
 * |
 * | Include bootstrap.php and get it return value.
 * | NOTE: system/bootstrap.php is starting application and run it.
 * |
 * | --------------------------------------
 *
 */

$app = include '../system/bootstrap.php';
