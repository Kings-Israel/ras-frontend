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
        Schema::create('business_sales_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_request_id')->references('id')->on('order_requests')->onDelete('cascade')->onUpdate('cascade');
            $table->string('country')->nullable();
            $table->string('sales_in_twelve_months')->nullable();
            $table->string('projected_sales_in_twelve_months')->nullable();
            $table->text('terms_of_payment')->nullable();
            $table->string('country_limit_required')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_sales_information');
    }
};
