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
        Schema::create('business_credit_management', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_request_id')->references('id')->on('order_requests')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('separate_credit_manangement_dept')->nullable()->default(false);
            $table->string('person_responsible_name')->nullable();
            $table->string('person_responsible_position')->nullable();
            $table->boolean('asses_customer_creditworthiness')->nullable()->default(false);
            $table->json('methods_of_assessment')->nullable();
            $table->string('assessing_agencies')->nullable();
            $table->boolean('credit_score_buyers')->nullable()->default(false);
            $table->string('credit_information_update_frequency')->nullable();
            $table->boolean('has_credit_insurance_policy')->nullable()->default(false);
            $table->text('credit_insurance_policy_details')->nullable();
            $table->boolean('has_credit_insurance_policy_voided')->nullable()->default(false);
            $table->text('voided_insurance_policy_details')->nullable();
            $table->string('credit_management_procedure')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_credit_management');
    }
};
