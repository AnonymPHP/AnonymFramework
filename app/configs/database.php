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
    'selected'    => 'defualt',  // selected connection, has to be in connections

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
        ]

];
