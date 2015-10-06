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


    'csrf' => [
        'field_name' => '_token' // we will search this from your post
    ],

    /**
     * | ****************
     * |
     * | these configs for some firewall
     * |
     * | *****************
     */
    'firewall' => [

        'status' => false, // if status === true, process the firewall
        /**
         * | ****************
         * |
         * | this configs for ip firewall
         * |
         * |
         * | *****************
         */
        'ip_firewall' => [

            /**
             * | ****************
             * |
             * | blocked ip addresses must be in here
             * |
             * | *****************
             */

        ],
        'full_firewall' => [

            /**
             * | ****************
             * |
             * | allowed useragent, host, enconding, parameters must be in here
             * |
             * | *****************
             */
        ],
    ],
    /**
     * | ****************
     * |
     * | this config for hint string,integer,float types.
     * |
     * | *****************
     */
    'type_hint' => false,
];