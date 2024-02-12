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
        Schema::table('order_storage_requests', function (Blueprint $table) {
            $table->string('cost_description_file')->nullable();
            $table->text('cost_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_storage_requests', function (Blueprint $table) {
            $table->dropColumn('cost_description_file');
            $table->dropColumn('cost_description');
        });
    }
};
