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
        Schema::create('product_criterias', function (Blueprint $table) {
            $table->unsignedInteger('criteria_id');
            $table->unsignedInteger('product_criteria_id');
            $table->string('product_criteria_type');
            $table->foreign('criteria_id')->references('id')->on('criteria')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_criteria_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down () {
        Schema::dropIfExists('product_criterias');
    }
}
