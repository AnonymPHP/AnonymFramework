<?php
    /**
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     * @copyright AnonymMedya, 2015
     */

    namespace Anonym\Database\Tools\Migration;

    /**
     * Interface MigrationInterface
     * @package Anonym\Database\Tools\Migration
     */
    interface MigrationInterface
    {
        public function up();

        public function down();
    }