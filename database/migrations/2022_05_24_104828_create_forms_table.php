<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->uuid('ivid')->unique();
            $table->dateTime('expiration');
            $table->string('place_longitude');
            $table->string('place_latitude');
            $table->text('icon_src');
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('category_id');
            $table->integer('condition');
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('form_categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('forms');
    }
};
