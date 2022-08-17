<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('prizes', function (Blueprint $table) {
            $table->id();
            $table->uuid('ivid')->unique();
            $table->integer('quantity');
            $table->integer('points');
            $table->boolean('with_combinations');
            $table->unsignedBigInteger('sponsor_id');
            $table->unsignedBigInteger('category_id');
            $table->text('icon_src');
            $table->unsignedBigInteger('author_id');
            $table->timestamps();

            $table->foreign('sponsor_id')->references('id')->on('prize_sponsors')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('prize_categories')->onDelete('cascade');
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('prizes');
    }
};
