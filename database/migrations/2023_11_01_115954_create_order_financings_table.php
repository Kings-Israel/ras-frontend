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
        Schema::create('order_financings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->references('id')->on('orders')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('financing_institution_id')->references('id')->on('financing_institutions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('first_approval_by')->nullable()->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
            $table->dateTime('first_approval_on')->nullable();
            $table->foreignId('second_approval_by')->nullable()->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
            $table->dateTime('second_approval_on')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_financings');
    }
};
