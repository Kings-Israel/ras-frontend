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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->references('id')->on('businesses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('material')->nullable();
            $table->bigInteger('price')->nullable();
            $table->string('place_of_origin')->nullable();
            $table->string('brand')->nullable();
            $table->string('shape')->nullable();
            $table->string('color')->nullable();
            $table->string('min_order_quantity')->nullable();
            $table->string('max_order_quantity')->nullable();
            $table->foreignId('warehouse_id')->nullable()->references('id')->on('warehouses')->nullOnDelete()->onUpdate('cascade');
            $table->string('model_number')->nullable();
            $table->boolean('is_available')->default(true);
            $table->string('regional_featre')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
