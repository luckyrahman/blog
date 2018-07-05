<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('parent_id')->nullable();
            $table->string('title', 100);
            $table->string('description', 255)->nullable();
            $table->tinyInteger('position');
            $table->string('route_name', 255)->nullable();
            $table->boolean('status');
            $table->softDeletes();
            $table->timestamps();
        });
    } 

    public function store()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('parent_id')->nullable();
            $table->string('title', 100);
            $table->string('description', 255)->nullable();
            $table->tinyInteger('position');
            $table->string('route_name', 255)->nullable();
            $table->boolean('status');
            $table->softDeletes();
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
        Schema::dropIfExists('menus');
    }
}
