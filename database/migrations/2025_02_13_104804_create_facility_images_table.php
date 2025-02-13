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
        Schema::create('facility_images', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->timestamps();
            
            $table->unsignedBigInteger('facility_id');
            $table->foreign('facility_id')->references('id')->on('facility_images')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facility_images');
    }
};
