<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Shippings', function (Blueprint $table) {
            $table->bigIncrements('s_id');
            $table->string('customer_id');
            $table->string('s_first_name');
            $table->string('s_last_name');
            $table->string('s_address_1');
            $table->string('s_address_2');
            $table->UnsignedInteger('s_phone');
            $table->string('s_email');
            $table->integer('s_delivery_status')->nullable();
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
        Schema::dropIfExists('Shippings');
    }
}
