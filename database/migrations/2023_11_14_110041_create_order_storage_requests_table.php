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
        Schema::create('order_storage_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_item_id')->references('id')->on('order_items')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('warehouse_id')->references('id')->on('warehouses')->onDelete('cascade')->onUpdate('cascade');
            $table->string('quantity')->nullable();
            $table->bigInteger('cost')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_storage_requests');
    }
};
