<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatProductCriteriaTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up () {
        Schema::create('product_criteria', function (Blueprint $table) {
            $table->unsignedInteger('criterion_id');
            $table->unsignedInteger('product_id');
            $table->string('product_criteria_type');
            $table->foreign('criterion_id')->references('id')->on('criteria')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down () {
        Schema::dropIfExists('product_criteria');
    }
}
