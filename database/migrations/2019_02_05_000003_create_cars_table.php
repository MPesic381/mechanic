<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'cars';

    /**
     * Run the migrations.
     * @table cars
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('model')->nullable()->default(null);
            $table->string('plates', 64);
            $table->unsignedInteger('users_id');
            $table->timestamp('timestamps')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->index(["users_id"], 'fk_cars_users1_idx');


            $table->foreign('users_id', 'fk_cars_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
