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
        Schema::create('financing_request_companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('financing_request_id')->references('id')->on('financing_requests')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name')->nullable();
            $table->string('registration_number')->nullable();
            $table->string('country')->nullable();
            $table->string('country_of_incorporation')->nullable();
            $table->string('pin_no')->nullable();
            $table->date('date_trade_started')->nullable();
            $table->string('postal_address')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('physical_address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->text('business_nature')->nullable();
            $table->text('clients_information')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financing_request_companies');
    }
};
