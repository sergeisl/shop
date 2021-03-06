<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCriteriaTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up () {
      //  $this->down();
        Schema::create('criteria', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->unsignedInteger('filter_id')->nullable();
            $table->integer('position')->nullable();
            $table->integer('visible')->nullable();
            $table->foreign('filter_id')->references('id')->on('filters')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down () {
        Schema::drop('criteria');
    }
}
