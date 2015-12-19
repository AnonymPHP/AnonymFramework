<?php
/**
 *  This file belongs to AnonymPHP Framework
 *
 * @author vahitserifsaglam1 <vahit.serif119@gmail.com>
 * @website http://anonymphp.com/framework
 */

namespace Database\Migrations;

use Anonym\Facades\Config;
use Anonym\Facades\Schema;
use Anonym\Tools\Migration;
use Anonym\Tools\MigrationInterface;
use Anonym\Tools\Table;

/**
 * Class Billing
 * @package Database\Migrations
 */
class Billing extends Migration implements MigrationInterface
{

    /**
     * Eklenecek verileri bu fonksiyon içinde ayarlarız
     *
     * @return mixed
     */
    public function up()
    {
        $table = Config::get('billing.table_name');
        Schema::create($table, function (Table $table) {
            return $table->primary('billing_id')
                ->int('subscription_started')
                ->varchar('subscription_plan')
                ->varchar('subscription_status')
                ->int('trail_started')
                ->int('trail_ends_at')
                ->int('cash');

        });
    }

    /**
     * Silinecek verileri bu fonksiyon içinde ayarlarız
     *
     * @return mixed
     */
    public function down()
    {
        $table = Config::get('billing.table_name');
        Schema::drop($table);
    }
}