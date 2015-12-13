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
     * | ****************************************
     * |
     * | the table name of billing in database
     * |
     * | *****************************************
     */
    'table_name' => 'billing',

    /**
     *  determine how many days will be trail
     */
    'trail_days' => 14,

    /**
     * | ********************************
     * |
     * | the plans and their days.
     * |
     * | *********************************
     */
    'plans' => [
        'weekly' => 7,
        'monthly' => 30,
        'yearly' => 365,
    ]
];