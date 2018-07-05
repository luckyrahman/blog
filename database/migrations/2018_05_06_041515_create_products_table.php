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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('code', 50);
            $table->integer('category');
            $table->integer('sub_category');
            $table->integer('product_group');
            $table->integer('measure_unit');
            $table->string('product_image', 255);
            $table->float('buying_price', 8, 2);
            $table->float('selling_price', 8, 2);
            $table->longText('description');
            $table->enum('status', ['0', '1']);
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
        Schema::dropIfExists('products');
    }
}
