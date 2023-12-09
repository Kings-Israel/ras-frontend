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
        Schema::create('bank_debts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('financing_request_id')->references('id')->on('financing_requests')->onDelete('cascade')->onUpdate('cascade');
            $table->string('bank_name');
            $table->string('facility_limits')->nullable();
            $table->text('debt_reason')->nullable();
            $table->bigInteger('outstanding_amounts')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_debts');
    }
};