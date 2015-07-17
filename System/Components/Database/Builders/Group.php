<?php

    /**
     *  AnonymFramework Group Builder -> group burada oluştururlur
     *
     * @package  Anonym\Database\Builders;
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     */

    namespace Anonym\Database\Builders;

    class Group
    {


        public function group($group)
        {

            return "GROUP BY $group";
        }
    }
