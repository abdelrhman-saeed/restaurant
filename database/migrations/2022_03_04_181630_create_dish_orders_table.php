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
        Schema::create('dish_orders', function (Blueprint $table) {
            $table->smallIncrements('id');
            
            $table->smallInteger('dish_id', unsigned:true);
            $table->foreign('dish_id')->references('id')->on('dishes')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            
            $table->smallInteger('order_id', unsigned:true);
            $table->foreign('order_id')->references('id')->on('orders')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            
            $table->smallInteger('dish_count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dish_orders');
    }
};
