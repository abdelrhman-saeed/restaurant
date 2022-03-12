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
        Schema::create('orders', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->timestamps();

            $table->smallInteger('table_id', unsigned:true);
            $table->foreign('table_id')->references('id')->on('tables');

            $table->decimal('total_price', 7,2);
            $table->tinyInteger('customer_count');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
