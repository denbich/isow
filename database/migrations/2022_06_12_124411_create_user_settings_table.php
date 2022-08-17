<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->boolean('google_auth');
            $table->string('google_auth_id')->unique()->nullable();
            $table->string('google_auth_email')->unique()->nullable();
            $table->boolean('facebook_auth');
            $table->string('facebook_auth_id')->unique()->nullable();
            $table->string('facebook_auth_email')->unique()->nullable();
            $table->boolean('google2fa');
            $table->string('google2fa_code', 32)->nullable();
            $table->boolean('email2fa');
            $table->boolean('messages_email');
            $table->boolean('messages_push');
            $table->boolean('notifications_email');
            $table->boolean('notifications_push');
            $table->boolean('marketing_email');
            $table->boolean('marketing_push');
            $table->boolean('login_email');
            $table->boolean('login_push');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_settings');
    }
};
