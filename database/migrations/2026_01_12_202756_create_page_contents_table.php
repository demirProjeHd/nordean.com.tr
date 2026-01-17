<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_contents', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique(); // about, mission, vision, isolgomma, etc.
            $table->string('title_tr')->nullable();
            $table->string('title_en')->nullable();
            $table->text('content_tr')->nullable();
            $table->text('content_en')->nullable();
            $table->json('extra_data')->nullable(); // For features, etc.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_contents');
    }
};
