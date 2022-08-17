<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('form_position_translates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('position_id');
            $table->string('locale');
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('position_id')->references('id')->on('form_positions')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('form_position_translates');
    }
};
