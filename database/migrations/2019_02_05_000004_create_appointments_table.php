<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'appointments';

    /**
     * Run the migrations.
     * @table appointments
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->dateTime('datetime');
            $table->unsignedInteger('users_id');
            $table->unsignedInteger('cars_id');
            $table->timestamp('created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));


            $table->index(["cars_id"], 'fk_appointments_cars1_idx');

            $table->index(["users_id"], 'fk_appointments_users1_idx');


            $table->foreign('cars_id', 'fk_appointments_cars1_idx')
                ->references('id')->on('cars')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('users_id', 'fk_appointments_users1_idx')
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
