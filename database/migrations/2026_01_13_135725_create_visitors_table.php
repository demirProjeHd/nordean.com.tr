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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('ip', 45); // IPv4 and IPv6
            $table->string('country_code', 2)->nullable(); // TR, US, etc.
            $table->string('country_name')->nullable();
            $table->string('city')->nullable();
            $table->string('user_agent')->nullable();
            $table->string('url')->nullable();
            $table->string('referer')->nullable();
            $table->timestamps();

            $table->index('created_at');
            $table->index('country_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitors');
    }
};
