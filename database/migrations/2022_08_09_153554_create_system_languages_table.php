<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('system_languages', function (Blueprint $table) {
            $table->id();
            $table->string('language')->unique();
            $table->string('polish');
            $table->string('english');
            $table->string('ukrainian');
            $table->string('native');
        });
    }

    public function down()
    {
        Schema::dropIfExists('system_languages');
    }
};
