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
     * | the configs for filesystem
     * |
     * | *****************
     */
    'filesystem' => [

        /**
         * | ****************
         * |
         * | the configs of local filesystem driver
         * |
         * | *****************
         */
        'local' => [
            'root' => BASE,
        ],
    ],
    /**
     * | ****************
     * |
     * | the configs of cache class
     * |
     * | *****************
     */
    'cache' => [

        /**
         * | ****************
         * |
         * | driver can be = file,memcache, redis, predis,apc, zend, xcache, array
         * | if driver has a special config, you must be give it
         * |
         * | *****************
         */
        'driver' => 'file',

        /**
         * | --------------------------------
         * |
         * | Cache file driver configs
         * |
         * | ---------------------------------
         * |
         * | ext = the extension of cache files
         * | folder = the folder path of cache files
         */

        'file' => [
            'ext' => '.cache',
            'folder' => RESOURCE . 'cache',
        ],

        /**
         * | --------------------------------
         * |
         * | Memcache driver configs
         * |
         * | ---------------------------------
         */

        'memcache' => [

        ],


        /**
         * | --------------------------------
         * |
         * | redis driver configs
         * |
         * | ---------------------------------
         */
        'redis' => [

        ],


    ],

    /**
     * | ****************
     * |
     * |  Session class configs
     * |
     * | *****************
     */
    'session' => [

        'encrypt' => false,

        /**
         * | ****************
         * |
         * | driver can be = file, cache, database, cookie
         * |
         * | *****************
         */
        'driver' => 'cookie',

        /**
         *  session file driver configs
         */
        'file' => [
            'path' => 'resources/sessions/'
        ],

        /**
         * | ****************
         * |
         * | database driver configs,
         * | table must be exists in your database.
         * | table pattern is must be like that  => key:value
         * |
         * | *****************
         */
        'database' => [
            'table' => 'sessions'
        ],

        /**
         * | ****************
         * |
         * | cookie driver configs
         * | lifetime must be an integer
         * |
         * | *****************
         */
        'cookie' => [
            'lifetime' => 1800,

            'encode' => true
        ]
    ]
];
