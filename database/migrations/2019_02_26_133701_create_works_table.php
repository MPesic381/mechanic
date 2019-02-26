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
            $table->unsignedInteger('cars_id');
            $table->unsignedInteger('services_id');
            $table->integer('kilometrage');
    
            $table->index(["cars_id"], 'fk_works_cars1_idx');
    
            $table->index(["services_id"], 'fk_works_services1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();
    
    
            $table->foreign('cars_id', 'fk_works_cars1_idx')
                ->references('id')->on('cars')
                ->onDelete('no action')
                ->onUpdate('no action');
    
            $table->foreign('services_id', 'fk_works_services1_idx')
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
