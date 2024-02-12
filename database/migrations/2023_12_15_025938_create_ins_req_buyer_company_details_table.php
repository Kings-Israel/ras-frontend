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
        Schema::create('buyer_company_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_request_id')->references('id')->on('order_requests')->onDelete('cascade')->onUpdate('cascade');
            $table->string('trade_name')->nullable();
            $table->string('registered_name')->nullable();
            $table->string('registration_number')->nullable();
            $table->string('country_of_incorporation')->nullable();
            $table->string('country_of_parent_company')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('postal_address')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('physical_location')->nullable();
            $table->text('nature_of_business')->nullable();
            $table->string('sector')->nullable();
            $table->string('income_tax_pin')->nullable();
            $table->string('income_tax_document')->nullable();
            $table->json('sources_of_income')->nullable();
            $table->json('sources_of_wealth')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buyer_company_details');
    }
};
