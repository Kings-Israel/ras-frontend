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
        Schema::table('financing_requests', function (Blueprint $table) {
            $table->string('requested_facility')->nullable();
            $table->string('facility_duration')->nullable();
            $table->text('facility_purpose')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('financing_requests', function (Blueprint $table) {
            $table->dropColumn('requested_facility');
            $table->dropColumn('facility_duration');
            $table->dropColumn('facility_purpose');
        });
    }
};
