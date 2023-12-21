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
        Schema::create('buyer_proposal_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_request_id')->references('id')->on('order_requests')->onDelete('cascade')->onUpdate('cascade');
            $table->date('period_from')->nullable();
            $table->date('period_to')->nullable();
            $table->string('mode_of_conveyance')->nullable();
            $table->string('territorial_limits')->nullable();
            $table->text('packaging')->nullable();
            $table->json('transported_products')->nullable();
            $table->boolean('use_hired_vehicles')->nullable()->default(false);
            $table->string('hired_vehicles_details')->nullable();
            $table->text('goods_safety_details')->nullable();
            $table->json('vehicle_features')->nullable();
            $table->string('liability_limit_one_consignment')->nullable();
            $table->string('liability_limit_period_of_insurance')->nullable();
            $table->string('liability_limit_estimated_annual_carry')->nullable();
            $table->boolean('had_previous_insurance')->nullable()->default(false);
            $table->string('previous_insurer')->nullable();
            $table->text('current_precautions')->nullable();
            $table->json('previous_insurance_data')->nullable();
            $table->text('previous_insurance_details')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buyer_proposal_details');
    }
};
