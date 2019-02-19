<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableBookings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->softDeletes();
            $table->dropUnique('uq_bookings_cars_services');
            $table->foreign('car_id', 'fk_bookings_cars1_idx')
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
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropSoftDeletes();
            $table->unique(["service_id"], 'uq_bookings_cars_services');
            $table->foreign('car_id', 'uq_bookings_cars_services')
                ->references('id')->on('cars')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }
}
