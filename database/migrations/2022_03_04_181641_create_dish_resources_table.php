<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dish_resources', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->timestamps();

            $table->smallInteger('dish_id', unsigned:true);
            $table->foreign('dish_id')->references('id')->on('dishes');

            $table->smallInteger('resource_id', unsigned:true);
            $table->foreign('resource_id')->references('id')->on('resources');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dish_resources');
    }
};
