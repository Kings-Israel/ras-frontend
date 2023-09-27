<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('country_id')->references('id')->on('countries')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('city_id')->nullable()->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name')->nullable();
            $table->string('primary_cover_image')->nullable();
            $table->string('secondary_cover_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
