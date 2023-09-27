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
        Schema::create('required_document_per_countries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_id')->references('id')->on('documents')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('country_id')->nullable()->references('id')->on('countries')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('required_document_per_countries');
    }
};
