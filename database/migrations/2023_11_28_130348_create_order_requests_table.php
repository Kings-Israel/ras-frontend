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
        Schema::create('order_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_item_id')->references('id')->on('order_items')->onDelete('cascade')->onUpdate('cascade');
            $table->string('requesteable_id')->nullable();
            $table->string('requesteable_type')->nullable();
            $table->enum('status', ['pending', 'accepted', 'rejected'])->nullable()->default('pending');
            $table->bigInteger('cost')->nullable();
            $table->string('cost_description_file')->nullable();
            $table->string('cost_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_requests');
    }
};
