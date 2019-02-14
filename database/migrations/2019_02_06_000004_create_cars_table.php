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
            $table->string('plate', 32);
            $table->string('manufacturer', 64);
            $table->string('model', 64);
            $table->integer('year');
            $table->unsignedInteger('kilometrage');
            $table->unsignedInteger('hp');
            $table->unsignedInteger('cc');
            $table->unsignedInteger('user_id');
            $table->softDeletes();

            $table->index(["user_id"], 'fk_cars_users1_idx');

            $table->unique(["plate"], 'plate_UNIQUE');
            $table->nullableTimestamps();


            $table->foreign('user_id', 'fk_cars_users1_idx')
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
