<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'bookings';

    /**
     * Run the migrations.
     * @table bookings
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('car_id');
            $table->unsignedInteger('service_id');
            $table->dateTime('start_time');
            $table->dateTime('end_time');

            $table->index(["service_id"], 'fk_bookings_services1_idx');

            $table->index(["car_id"], 'fk_bookings_cars1_idx');

            $table->unique(["service_id"], 'uq_bookings_cars_services');
            $table->nullableTimestamps();


            $table->foreign('service_id', 'fk_bookings_services1_idx')
                ->references('id')->on('services')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('car_id', 'uq_bookings_cars_services')
                ->references('id')->on('cars')
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
