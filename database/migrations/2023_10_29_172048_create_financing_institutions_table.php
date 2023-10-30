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
        Schema::create('financing_institutions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('credit_limit')->nullable();
            $table->string('currency')->nullable();
            $table->foreignId('country_id')->nullable()->references('id')->on('countries')->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('city_id')->nullable()->references('id')->on('cities')->onDelete('set null')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financing_institutions');
    }
};
