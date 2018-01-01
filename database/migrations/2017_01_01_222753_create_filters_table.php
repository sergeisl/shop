<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFiltersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up () {
       // $this->down();
        Schema::create('filters', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->integer('position')->nullable();
            $table->integer('visible')->nullable();
            $table->string('type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down () {
        Schema::drop('filters');
    }
}
