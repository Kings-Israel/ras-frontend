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
        Schema::create('import_clearing_forwarding_instructions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_request_id')->references('id')->on('order_requests')->onDelete('cascade')->onUpdate('cascade');
            $table->string('importer')->nullable();
            $table->string('reference')->nullable();
            $table->string('customs_code')->nullable();
            $table->string('vat_number')->nullable();
            $table->string('supplier')->nullable();
            $table->string('transport_mode')->nullable();
            $table->string('name_of_vessel')->nullable();
            $table->string('eta')->nullable();
            $table->string('transport_document_number')->nullable();
            $table->date('transport_document_date')->nullable();
            $table->string('shipment_reference_number')->nullable();
            $table->string('invoice_number')->nullable();
            $table->date('invoice_date')->nullable();
            $table->string('port_of_entry')->nullable();
            $table->string('customs_purpose_code')->nullable();
            $table->string('destination_code')->nullable();
            $table->string('tariff_determination')->nullable();
            $table->string('customs_valuation_code')->nullable();
            $table->string('customs_valuation_method')->nullable();
            $table->string('customs_value_date')->nullable();
            $table->string('number_of_packages')->nullable();
            $table->string('special_goods')->nullable();
            $table->string('gross_mass')->nullable();
            $table->string('measurement')->nullable();
            $table->string('import_permit_number')->nullable();
            $table->json('documents_attached')->nullable();
            $table->string('incoterms')->nullable();
            $table->string('mode_of_transport')->nullable();
            $table->string('delivery_address')->nullable();
            $table->string('split_delivery_address')->nullable();
            $table->string('special_instructions')->nullable();
            $table->string('other')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('import_clearing_forwarding_instructions');
    }
};
