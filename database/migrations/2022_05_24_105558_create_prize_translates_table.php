<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('prize_translates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prize_id');
            $table->string('locale');
            $table->string('title');
            $table->mediumText('description')->nullable();
            $table->timestamps();

            $table->foreign('prize_id')->references('id')->on('prizes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('prize_translates');
    }
};
