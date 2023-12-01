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
        Schema::table('inspection_reports', function (Blueprint $table) {
            $table->string('applicant_company_name')->nullable();
            $table->string('applicant_company_address')->nullable();
            $table->string('applicant_company_email')->nullable();
            $table->string('applicant_company_phone_number')->nullable();
            $table->string('applicant_company_contact_person')->nullable();
            $table->string('applicant_company_contact_person_email')->nullable();
            $table->string('applicant_company_contact_person_phone_number')->nullable();
            $table->string('license_holder_company_name')->nullable();
            $table->string('license_holder_company_address')->nullable();
            $table->string('license_holder_company_email')->nullable();
            $table->string('license_holder_company_phone_number')->nullable();
            $table->string('license_holder_company_contact_person')->nullable();
            $table->string('license_holder_company_contact_person_phone_number')->nullable();
            $table->string('license_holder_company_contact_person_email')->nullable();
            $table->string('place_of_manufacture_company_name')->nullable();
            $table->string('place_of_manufacture_company_address')->nullable();
            $table->string('place_of_manufacture_company_phone_number')->nullable();
            $table->string('place_of_manufacture_company_email')->nullable();
            $table->string('place_of_manufacture_company_contact_person')->nullable();
            $table->string('place_of_manufacture_company_contact_person_phone_number')->nullable();
            $table->string('place_of_manufacture_company_contact_person_email')->nullable();
            $table->string('place_of_manufacture_factory_inspection_done_by')->nullable();
            $table->string('product')->nullable();
            $table->string('product_type_ref')->nullable();
            $table->string('product_trade_mark')->nullable();
            $table->string('product_ratings_and_principle_characteristics')->nullable();
            $table->string('differences_from_previously_certified_product')->nullable();
            $table->string('applicant_signature')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inspection_reports', function (Blueprint $table) {
            $table->dropColumn('applicant_company_name');
            $table->dropColumn('applicant_company_address');
            $table->dropColumn('applicant_company_email');
            $table->dropColumn('applicant_company_phone_number');
            $table->dropColumn('applicant_company_contact_person');
            $table->dropColumn('applicant_company_contact_person_email');
            $table->dropColumn('applicant_company_contact_person_phone_number');
            $table->dropColumn('license_holder_company_name');
            $table->dropColumn('license_holder_company_address');
            $table->dropColumn('license_holder_company_email');
            $table->dropColumn('license_holder_company_phone_number');
            $table->dropColumn('license_holder_company_contact_person');
            $table->dropColumn('license_holder_company_contact_person_phone_number');
            $table->dropColumn('license_holder_company_contact_person_email');
            $table->dropColumn('place_of_manufacture_company_name');
            $table->dropColumn('place_of_manufacture_company_address');
            $table->dropColumn('place_of_manufacture_company_phone_number');
            $table->dropColumn('place_of_manufacture_company_email');
            $table->dropColumn('place_of_manufacture_company_contact_person');
            $table->dropColumn('place_of_manufacture_company_contact_person_phone_number');
            $table->dropColumn('place_of_manufacture_company_contact_person_email');
            $table->dropColumn('place_of_manufacture_factory_inspection_done_by');
            $table->dropColumn('product');
            $table->dropColumn('product_type_ref');
            $table->dropColumn('product_trade_mark');
            $table->dropColumn('product_ratings_and_principle_characteristics');
            $table->dropColumn('differences_from_previously_certified_product');
            $table->dropColumn('applicant_signature');
        });
    }
};
