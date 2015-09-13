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

class Installation extends Migration implements MigrationInterface
{

    /**
     * Yükleme İşlemleri burada gerçekleşir
     */

    public function up()
    {

        Schema::create('sessions', function (Table $table) {
            return $table->varchar('key')
                ->text('value');
        });

        Schema::create('logins', function(Table $table){
           return $table->primary('login_id')
               ->varchar('ip')
               ->varchar('username');
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
