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
        Schema::create('business_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_request_id')->references('id')->on('order_requests')->onDelete('cascade')->onUpdate('cascade');
            $table->date('period_from')->nullable();
            $table->date('period_to')->nullable();
            $table->text('general_information')->nullable();
            $table->bigInteger('number_of_employees')->nullable();
            $table->string('goods_to_insure')->nullable();
            $table->boolean('manufactures_goods')->nullable()->default(false);
            $table->text('manufacturing_details')->nullable();
            $table->text('normal_payment_terms')->nullable();
            $table->text('maximum_payment_terms')->nullable();
            $table->boolean('requires_pre_delivery_cover')->nullable()->default(false);
            $table->text('pre_credit_risk_details')->nullable();
            $table->text('in_place_security_details')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_information');
    }
};
