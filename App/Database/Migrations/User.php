<?php
/**
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @copyright GemMedya, 2015
 */

namespace App\Database\Migrations;

use Anonym\Components\Tools\Migration;
use Anonym\Components\Tools\MigrationInterface;
use Anonym\Components\Tools\Table;
use Anonym\Facades\Schema;

class User extends Migration implements MigrationInterface
{

    /**
     * Yükleme İşlemleri burada gerçekleşir
     */

    public function up()
    {

        Schema::create('User', function (Table $table) {
            return $table->primary('id')
                ->varchar('username')
                ->varchar('password')
                ->varchar('email')
                ->current('created_at')
                ->int('role')->defualt(0);
        });

    }


    /**
     * Düşürme işlemleri burada gerçekleşir
     */
    public function down()
    {
        //
    }
}
