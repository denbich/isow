<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cloud_folders', function (Blueprint $table) {
            $table->id();
            $table->uuid('ivid');
            $table->boolean('isinroot');
            $table->unsignedBigInteger('folder_id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('color');
            $table->text('root');
            $table->unsignedBigInteger('user_id');
            $table->integer('condition');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('folder_id')->references('id')->on('cloud_folders')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cloud_folders');
    }
};
