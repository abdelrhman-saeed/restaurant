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
        Schema::create('food_orders', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->timestamps();

            $table->smallInteger('food_id', unsigned:true);
            $table->foreign('food_id')->references('id')->on('food');
            
            $table->smallInteger('order_id', unsigned:true);
            $table->foreign('order_id')->references('id')->on('orders');

            $table->smallInteger('food_quantity');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_orders');
    }
};
