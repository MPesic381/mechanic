<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('car_id');
            $table->unsignedInteger('service_id');
            $table->integer('kilometrage');
            $table->date('serviced_at');
    
            $table->index(["car_id"], 'fk_works_cars1_idx');
    
            $table->index(["service_id"], 'fk_works_services1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();
    
    
            $table->foreign('car_id', 'fk_works_cars1_idx')
                ->references('id')->on('cars')
                ->onDelete('no action')
                ->onUpdate('no action');
    
            $table->foreign('service_id', 'fk_works_services1_idx')
                ->references('id')->on('services')
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
        Schema::dropIfExists('works');
    }
}
