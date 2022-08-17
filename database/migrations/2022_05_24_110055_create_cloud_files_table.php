<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cloud_files', function (Blueprint $table) {
            $table->id();
            $table->uuid('ivid');
            $table->unsignedBigInteger('folder_id');
            $table->string('name');
            $table->string('extention');
            $table->string('mimetype');
            $table->text('root');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('folder_id')->references('id')->on('cloud_folders')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cloud_files');
    }
};
