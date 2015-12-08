<?php
/**
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @copyright GemMedya, 2015
 */

namespace App\Database\Migrations;

use Anonym\Tools\Migration;
use Anonym\Tools\MigrationInterface;
use Anonym\Tools\Table;
use Anonym\Facades\Schema;

/**
 * Class Installation
 * @package App\Database\Migrations
 */
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

        Schema::create('forgets', function(Table $table){
            return $table->primary('forget_id')
                ->varchar('user_id')
                ->varchar('key');
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
