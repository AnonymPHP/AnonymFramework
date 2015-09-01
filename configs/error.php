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
     * | these configs for handle the error or exceptions
     * |
     * | *****************
     */

    'handler' => [

        /**
         *
         *  true for enable, false to disable
         *
         */

        'errors'     => [
            'switch'  => E_USER_ERROR,
            'enabled' => true
        ],
        /**
         *
         *  true for enable, false to disable
         *
         */
        'exceptions' => true,

        /**
         *
         *  Save Logs in App/logs/error.log
         */

        'log' => true,
    ]

];