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

            'host' => '127.0.0.1',// the hostname of memcache
            'post' => 11211,      // the port address of memcache
            'timeout' => 30,  

        ],


        /**
         * | --------------------------------
         * |
         * | redis driver configs
         * |
         * | ---------------------------------
         */
        'redis' => [
            'host' => '127.0.0.1',// the hostname of redis
            'post' => 6379,       // the port address of redis
            'timeout' => 30,
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

        'encrypt' => false, // you can not use this with cookie driver, there is a bug with crypting for now

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

            /**
             *   -----------------------------
             * |
             * | The cookie expiration date
             * |
             *   -----------------------------
             */
            'lifetime' => 1800,

            /**
             * |-------------------------------
             * |
             * | if you entry this true, your cookies will be crypted
             * |
             * | ------------------------------
             */

            'crypting' => true,

        ]
    ]
];
