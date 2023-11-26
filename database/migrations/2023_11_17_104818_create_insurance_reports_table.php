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
        Schema::create('insurance_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_item_id')->references('id')->on('order_items')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('insurance_company_id')->nullable()->references('id')->on('insurance_companies')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('report_file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurance_reports');
    }
};
