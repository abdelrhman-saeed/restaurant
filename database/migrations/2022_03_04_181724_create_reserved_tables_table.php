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
        Schema::create('reserved_tables', function (Blueprint $table) {
            $table->smallIncrements('id');
            
            $table->smallInteger('table_id', unsigned:true);
            $table->foreign('table_id')->references('id')->on('tables');
            
            $table->string('customer_name');
            $table->string('customer_email')->nullable();
            
            $table->char('customer_phone', 11);
            $table->tinyInteger('customer_count');
            
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
        Schema::dropIfExists('reserved_tables');
    }
};
