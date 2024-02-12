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
        Schema::table('logistics_companies', function (Blueprint $table) {
            $table->json('transportation_methods')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('logistics_companies', function (Blueprint $table) {
            $table->dropColumn('transportation_methods');
        });
    }
};
