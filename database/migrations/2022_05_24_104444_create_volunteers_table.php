<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->uuid('ivid')->unique();
            $table->unsignedBigInteger('user_id');
            $table->Integer('points');
            $table->date('birth');
            $table->string('tshirt_size');
            $table->string('pesel')->unique();
            $table->string('street');
            $table->string('house_number');
            $table->string('city');
            $table->string('description')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('volunteers');
    }
};
