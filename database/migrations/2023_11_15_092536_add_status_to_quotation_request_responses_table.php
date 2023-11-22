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
        Schema::table('quotation_request_responses', function (Blueprint $table) {
            $table->enum('status', ['pending', 'accepted', 'rejected'])->nullable()->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('quotation_request_responses', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
