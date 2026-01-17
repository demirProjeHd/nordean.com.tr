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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name_tr');
            $table->string('name_en');
            $table->text('description_tr')->nullable();
            $table->text('description_en')->nullable();
            $table->text('short_description_tr')->nullable();
            $table->text('short_description_en')->nullable();
            $table->string('icon')->nullable(); // floor, wall, ceiling, vibration, rail, tools
            $table->string('image')->nullable();
            $table->string('applications_tr')->nullable();
            $table->string('applications_en')->nullable();
            $table->json('products')->nullable(); // Array of product names
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('products');
    }
};
