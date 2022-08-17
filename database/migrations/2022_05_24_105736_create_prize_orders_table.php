<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('prize_orders', function (Blueprint $table) {
            $table->id();
            $table->uuid('ivid')->unique();
            $table->unsignedBigInteger('volunteer_id');
            $table->unsignedBigInteger('prize_id');
            $table->unsignedBigInteger('combination_id')->nullable();
            $table->string('info')->nullable();
            $table->integer('volunteer_points');
            $table->integer('prize_points');
            $table->timestamps();

            $table->foreign('volunteer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('prize_id')->references('id')->on('prizes')->onDelete('cascade');
            $table->foreign('combination_id')->references('id')->on('prize_combinations')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('prize_orders');
    }
};
