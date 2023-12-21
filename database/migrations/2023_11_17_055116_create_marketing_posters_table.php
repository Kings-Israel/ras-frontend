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
        Schema::create('marketing_posters', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->text('description')->nullable();
            $table->string('description_text_color')->nullable()->default('#FFF');
            $table->enum('description_text_align', ['center', 'right', 'left'])->nullable()->default('center');
            $table->integer('font_size')->unsigned()->nullable()->default(12);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marketing_posters');
    }
};
