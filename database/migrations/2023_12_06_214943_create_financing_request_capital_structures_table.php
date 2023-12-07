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
        Schema::create('capital_structures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('financing_request_id')->references('id')->on('financing_requests')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('authorized_capital_amount')->nullable();
            $table->bigInteger('authorized_capital_shares')->nullable();
            $table->bigInteger('authorized_capital_share_value')->nullable();
            $table->bigInteger('paid_up_capital_amount')->nullable();
            $table->bigInteger('paid_up_capital_shares')->nullable();
            $table->bigInteger('paid_up_capital_share_value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capital_structures');
    }
};
