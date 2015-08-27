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
     * | selected database connection
     * |
     * | *****************
     */
    'connection'  => 'defualt',  // selected connection, has to be in connections

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
                'password' => '',

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
        'login'    => [
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
        'register' => [
            //
        ]

    ]


];
