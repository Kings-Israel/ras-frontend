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
        Schema::create('logistics_companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->foreignId('country_id')->nullable()->references('id')->on('countries')->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('city_id')->nullable()->references('id')->on('cities')->onDelete('set null')->onUpdate('cascade');
            $table->json('modes_of_transport')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logistics_companies');
    }
};
