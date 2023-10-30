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
        Schema::create('store_requests', function (Blueprint $table) {
            $table->id();
            $table->string('request_code');
            $table->foreignId('customer_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('warehouse_id')->references('id')->on('warehouses')->onDelete('cascade')->onUpdate('cascade');
//            $table->foreignId('packaging_id')->references('id')->on('packagings')->onDelete('cascade')->onUpdate('cascade');
            $table->string('status');
            $table->timestamp('requested_on');
            $table->timestamp('accepted_on')->nullable();
            $table->timestamp('received_on')->nullable();
            $table->timestamp('collected_on')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_requests');
    }
};
