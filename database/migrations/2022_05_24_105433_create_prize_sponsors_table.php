<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('prize_sponsors', function (Blueprint $table) {
            $table->id();
            $table->string('ivid')->unique();
            $table->string('name');
            $table->string('description');
            $table->string('address');
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('email');
            $table->string('telephone');
            $table->text('logo_src');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('prize_sponsors');
    }
};
