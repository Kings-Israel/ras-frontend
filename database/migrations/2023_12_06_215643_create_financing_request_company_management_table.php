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
        Schema::create('company_management', function (Blueprint $table) {
            $table->id();
            $table->foreignId('financing_request_id')->references('id')->on('financing_requests')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->string('position')->nullable();
            $table->string('duration')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_management');
    }
};
