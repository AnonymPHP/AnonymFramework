<?php

    /**
     *  AnonymFramework Builders Order Trait -> order sorgular� burada olu�turulur
     *
     * @package Anonym\Database\Builders
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     */

    namespace Anonym\Database\Builders;

    class Order
    {

        public function order($id, $type = 'DESC')
        {

            return "ORDER BY {$id} {$type}";
        }
    }
