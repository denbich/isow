<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->uuid('ivid')->unique();
            $table->string('role');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('gender', 1);
            $table->text('photo_src');
            $table->string('telephone');
            $table->string('language', '3');
            $table->text('agreement_src')->nullable();
            $table->date('agreement_date')->nullable();
            $table->integer('condition');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
