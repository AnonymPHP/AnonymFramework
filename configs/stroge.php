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
         * | ****************
         * |
         * | cache file driver configs
         * |
         * | *****************
         */
        'file' => [
            'ext' => '.cache',
            'folder' => RESOURCE.'cache',
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

        /**
         * | ****************
         * |
         * | driver can be = file, cache, database, cookie
         * |
         * | *****************
         */
        'driver' => 'file',

        /**
         *  session file driver configs
         */
        'file' => [
            'path' => RESOURCE . 'sessions/'
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
            'lifetime' => 1800
        ]
    ]
];
