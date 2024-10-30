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
        Schema::create('product_photos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ProductID'); // Define ProductID column
            $table->unsignedBigInteger('VariantID'); // Define VariantID column
            $table->string('photo_path'); // Path to store photo in storage
            $table->timestamps();
        
            // Define foreign key constraints
            $table->foreign('ProductID')->references('ProductID')->on('products')->onDelete('cascade');
            $table->foreign('VariantID')->references('VariantID')->on('product_variants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_photos');
    }
};
