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
        Schema::create('vendor_storage_requests', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->foreignId('business_id')->references('id')->on('businesses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('warehouse_id')->references('id')->on('warehouses')->onDelete('cascade')->onUpdate('cascade');
            $table->string('quantity')->nullable();
            $table->bigInteger('cost')->nullable();
            $table->enum('status', ['pending', 'accepted', 'rejected'])->nullable()->default('pending');
            $table->enum('payment_status', ['pending', 'paid'])->nullable()->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_storage_requests');
    }
};