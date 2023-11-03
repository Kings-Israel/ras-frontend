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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->foreignId('invoice_id')->references('id')->on('invoices')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('business_id')->references('id')->on('businesses')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('status', ['pending', 'accepted', 'rejected', 'in progress', 'delivered', 'cancelled'])->nullable()->default('pending');
            $table->enum('payment_status', ['pending', 'paid', 'cancelled'])->nullable()->default('pending');
            $table->bigInteger('total_amount')->nullable();
            $table->string('delivery_location_address')->nullable();
            $table->string('delivery_location_lat')->nullable();
            $table->string('delivery_location_lng')->nullable();
            $table->text('additional_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};