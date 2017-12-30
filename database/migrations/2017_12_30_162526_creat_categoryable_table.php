<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatCategoryableTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up () {
        Schema::create('categoryables', function (Blueprint $table) {
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('categoryable_id');
            $table->string('categoryable_type');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('categoryable_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
        });


    }


    /**
     *
     * create table topics (
     * id_topic int (10) AUTO_INCREMENT,
     * topic_name varchar(100) NOT NULL,
     * id_author int (10) NOT NULL,
     * PRIMARY KEY (id_topic),
     * FOREIGN KEY (id_author) REFERENCES users (id_user)
     * );
     *
     *
     * Reverse the migrations.
     *
     * @return void
     */
    public function down () {
        Schema::dropIfExists('categoryables');
    }
}