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
     * |*********************************
     * |
     * | Anonym Framework Mail configs;
     * | ---------------------------
     * | variables;
     * |
     * | username => the username of mail
     * | password => the password of mail
     * | port =>     the port of mail
     * | secure =>   the secure of mail,use it  only in phpmailer driver!
     * | driver =>   the driver for send mail proccess, can be phpmailer or swift
     * |*********************************
     */

    'default' => [
        'username' => '',
        'password' => '',
        'port' => 587,
        'driver' => 'swift',

        'from' => [
            'mail' => 'vahit.serif119@gmail.com',
            'name' => 'Vahit'
        ]
    ],

    'mail_trap' => [
        'username' => '',
        'password' => '',

        'from' => [
            'mail' => 'vahit.serif119@gmail.com',
            'name' => 'Vahit'
        ]
    ]
];
