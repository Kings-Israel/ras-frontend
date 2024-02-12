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
        Schema::create('export_clearing_forwarding_instructions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_request_id')->references('id')->on('order_requests')->onDelete('cascade')->onUpdate('cascade');
            $table->string('exporter')->nullable();
            $table->string('reference')->nullable();
            $table->string('vat_number')->nullable();
            $table->string('consignee')->nullable();
            $table->string('notify_party')->nullable();
            $table->string('place_of_collection')->nullable();
            $table->string('port_of_loading')->nullable();
            $table->string('port_of_discharge')->nullable();
            $table->string('final_destination')->nullable();
            $table->string('destination_country')->nullable();
            $table->string('method_of_payment')->nullable();
            $table->string('type_of_freight')->nullable();
            $table->string('number_of_packages')->nullable();
            $table->string('marks_and_numbers')->nullable();
            $table->text('description_of_goods')->nullable();
            $table->string('special_goods')->nullable();
            $table->string('gross_mass')->nullable();
            $table->string('measurement')->nullable();
            $table->string('cargo_insurance')->nullable();
            $table->string('cargo_value')->nullable();
            $table->json('documents_attached')->nullable();
            $table->string('incoterms')->nullable();
            $table->string('ci_value')->nullable();
            $table->string('customs_export_purpose_code')->nullable();
            $table->string('customs_export_number')->nullable();
            $table->string('tarrif_heading')->nullable();
            $table->text('special_instructions')->nullable();
            $table->text('other', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('export_clearing_forwarding_instructions');
    }
};
