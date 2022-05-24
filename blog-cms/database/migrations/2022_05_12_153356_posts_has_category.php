<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_has_category', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_category');
            $table->foreign('id_category')->references('id')->on('category');
            $table->unsignedBigInteger('id_post');
            $table->foreign('id_post')->references('id')->on('posts');
            $table->tinyInteger('phc_status')->default('1');
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
        Schema::dropIfExists('posts_has_category');
    }
};
