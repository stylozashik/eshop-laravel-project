<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Products', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->integer('product_category_id')->unsigned();
            $table->integer('product_brand_id')->unsigned();
            $table->string('product_title');
            $table->string('product_subtitle');
            $table->double('price');
            $table->text('long_description');
            $table->text('short_description');
            $table->integer('product_status');
            $table->integer('product_quantity');
            $table->string('product_image')->nullable();
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
        Schema::dropIfExists('Products');
    }
}
