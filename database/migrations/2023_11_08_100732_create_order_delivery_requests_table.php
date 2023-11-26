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
        Schema::create('order_delivery_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_item_id')->references('id')->on('order_items')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('logistics_company_id')->nullable()->references('id')->on('logistics_companies')->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
            $table->enum('status', ['pending', 'accepted', 'picked', 'in customs', 'in progress'])->nullable()->default('pending');
            $table->bigInteger('cost')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_delivery_requests');
    }
};
