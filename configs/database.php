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
    'connection' => 'default',  // the selected connection name must be an index of connections array

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
                'host' => 'localhost',
                /**
                 * | ****************
                 * |
                 * | the variable of database name
                 * |
                 * | *****************
                 */
                'db' => 'deneme',

                /**
                 * | ****************
                 * |
                 * | the username to sql connection
                 * |
                 * | *****************
                 */

                'username' => 'root',
                /**
                 * | ****************
                 * |
                 * | the password to sql connection
                 * |
                 * | *****************
                 */
                'password' => '',

                /**
                 * | ********************
                 * |
                 * | The type of sql driver.
                 * |
                 * | ********************
                 */
                'bridge' => 'mysql'
            ],
        ],
    /**
     * | ****************
     * |
     * | this configs for Authentication.
     * |
     * | *****************
     */

    'tables' => [


        /**
         * | ****************
         * |
         * | this configs for Login Process.
         * |
         * | *****************
         */
        'login' => [

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
        ],
        /**
         * | ****************
         * |
         * | parameters for session
         * |
         * | *****************
         */
        'select' => [

        ],
        /**
         * | ****************
         * |
         * | this configs for Authentication
         * |
         * | *****************
         */
        'authentication' =>
            [

            ],

    ],


];
