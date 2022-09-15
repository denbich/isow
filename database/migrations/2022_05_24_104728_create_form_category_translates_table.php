<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('form_category_translates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('locale')->index();
            $table->string('name');
            $table->string('description')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('form_categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('form_category_translates');
    }
};
