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
        Schema::create('ins_req_buyer_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_request_id')->references('id')->on('order_requests')->onDelete('cascade')->onUpdate('cascade');
            $table->string('marital_status')->nullable();
            $table->string('nationality')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('postal_address')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('residential_address')->nullable();
            $table->string('income_tax_pin_number')->nullable();
            $table->string('income_tax_pin_file')->nullable();
            $table->boolean('is_employed')->nullable()->default(false);
            $table->text('employer_state')->nullable();
            $table->boolean('is_self_employed')->nullable()->default(false);
            $table->string('occupation')->nullable();
            $table->string('occupation_sector')->nullable();
            $table->json('income_sources')->nullable();
            $table->json('wealth_sources')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ins_req_buyer_details');
    }
};
