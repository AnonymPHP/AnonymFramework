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
        'file' => [
            'ext' => '.cache',
            'folder' => RESOURCE.'cache',
        ],

    ],


    'session' => [

        'driver' => 'file',

        'file' => [
            'path' => RESOURCE . 'sessions/'
        ]

    ]
];
