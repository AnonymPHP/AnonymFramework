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
     * | if you input this true, database connection will start in database connection constructor
     * |
     * | *****************
     */
    'autostart' => true,

    /**
     * | ****************
     * |
     * | selected database connection
     * |
     * | *****************
     */
    'connection'  => 'default',  // selected connection, has to be in connections

    'connections' =>
        [
            'default' => [
                /**
                 * | ****************
                 * |
                 * | the variable of database host name
                 * |
                 * | *****************
                 */
                'host'     => 'localhost',
                /**
                 * | ****************
                 * |
                 * | the variable of database name
                 * |
                 * | *****************
                 */
                'db'       => 'test',
                /**
                 * | ****************
                 * |
                 * | the variable of database username
                 * |
                 * | *****************
                 */

                'username' => 'root',
                /**
                 * | ****************
                 * |
                 * | the variable of database password
                 * |
                 * | *****************
                 */
                'password' => 123456,
                /**
                 * | ****************
                 * |
                 * | driver can be pdo or mysqli
                 * |
                 * | *****************
                 */

                'driver'   => 'pdo'
            ]
        ],
    /**
     * | ****************
     * |
     * | this configs for Authentication.
     * |
     * | *****************
     */

    'tables'      => [

        /**
         * | ****************
         * |
         * | this configs for Login Process.
         * |
         * | *****************
         */
        'login'          => [
            'username',
            'password'
        ],
        /**
         * | ****************
         * |
         * | this configs for Register Process
         * |
         * | *****************
         */
        'register'       => [
            //
        ],
        /**
         * | ****************
         * |
         * | this configs for Authentication Process
         * |
         * | *****************
         */
        'authentication' =>
            [
                'column' => 'role',
                'roles'  => [
                    'user'  => 0,
                    'admin' => 1
                ]
            ]

    ]


];
