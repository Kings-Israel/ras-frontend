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
        Schema::create('wing_locations', function (Blueprint $table) {
            $table->id();
            $table->string('location_name');
            $table->text('description')->nullable();
            $table->double('height')->nullable();
            $table->double('width')->nullable();
            $table->double('square_fit')->nullable();
            $table->foreignId('wing_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
