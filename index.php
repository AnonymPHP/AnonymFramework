<?php
/**
 * This file belongs to the AnoynmFramework
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 * Thanks for using
 */
error_reporting(E_ALL);
ini_set('display_errors', 'On');
$app = include 'system/bootstrap.php';
var_dump(\Anonym\Facades\Config::get('general'));