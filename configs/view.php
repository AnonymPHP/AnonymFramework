<?php
/**
 * This file belongs to the AnoynmFramework
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 * Thanks for using
 */

return [


    /**
     * | ****************
     * |
     * | driver can be file, twig, smarty or blade
     * |
     * | *****************
     */
    'driver' => 'blade',
    /**
     * | ****************
     * |
     * | this configs used for twig driver
     * |
     * | *****************
     */
    'twig' => [

    ],
    /**
     * | ****************
     * |
     * | this configs used for smarty driver
     * |
     * | *****************
     */
    'smarty' => [

    ],
    /**
     * | ****************
     * |
     * | this configs used for blade driver
     * |
     * | *****************
     */
    'blade' => [
        'view' => RESOURCE . 'views',
        'cache' => RESOURCE . 'cache',
    ],
    /**
     * | ****************
     * |
     * | the extension type of view files
     * |
     * | *****************
     */
    'ext' => '.php',
    /**
     * | ****************
     * |
     * | the root dir of view files
     * |
     * | *****************
     */
    'root' => VIEW,
    /**
     * | ****************
     * |
     * | the the root dir of language files
     * |
     * | *****************
     */
    'language' => LANGUAGE,
    /**
     * | ****************
     * |
     * | the files of header
     * | please change this in ViewService
     * |
     * | *****************
     */
    'header' => [

    ],
    /**
     * | ****************
     * |
     * | the files of footer
     * | please change this in ViewService
     * |
     * | *****************
     */
    'footer' => [
    ],


];