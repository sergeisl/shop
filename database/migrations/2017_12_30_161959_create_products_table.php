<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up () {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->string('brief')->nullable();
            $table->text('text')->nullable();
            $table->text('seotext')->nullable();
            $table->integer('price_old')->nullable();
            $table->integer('price')->nullable();
            $table->string('label')->nullable();
            $table->string('keywords')->nullable();
            $table->text('description')->nullable();
            $table->string('param_name')->nullable();
            $table->integer('published')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down () {
        Schema::drop('products');
    }
}
