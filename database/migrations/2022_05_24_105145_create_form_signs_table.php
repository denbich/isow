<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('form_signs', function (Blueprint $table) {
            $table->id();
            $table->string('ivid')->unique();
            $table->unsignedBigInteger('volunteer_id');
            $table->unsignedBigInteger('form_id');
            $table->unsignedBigInteger('position_id');
            $table->unsignedBigInteger('choosen_position_id');
            $table->string('feedback')->nullable();
            $table->integer('condition');
            $table->timestamps();

            $table->foreign('volunteer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');
            $table->foreign('position_id')->references('id')->on('form_positions')->onDelete('cascade');
            $table->foreign('choosen_position_id')->references('id')->on('form_positions')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('form_signs');
    }
};
