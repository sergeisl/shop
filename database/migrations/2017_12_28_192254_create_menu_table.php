<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('parent_id')->nullable();
            $table->string('title')->nullable();
            $table->string('link')->nullable();
            $table->integer('position')->nullable();
            $table->integer('disabled')->nullable();
            $table->foreign('parent_id')->references('id')->on('menu')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('menu');
    }
}
