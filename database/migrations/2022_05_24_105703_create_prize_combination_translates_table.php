<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('prize_combination_translates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('combination_id');
            $table->string('locale');
            $table->string('title');
            $table->mediumText('description')->nullable();
            $table->timestamps();

            $table->foreign('combination_id')->references('id')->on('prize_combinations')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('prize_combination_translates');
    }
};
