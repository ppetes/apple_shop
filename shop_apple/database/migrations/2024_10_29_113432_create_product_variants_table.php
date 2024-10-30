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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id('VariantID'); // Primary key
            $table->unsignedBigInteger('ProductID'); // Define the foreign key column
            $table->string('Storage')->nullable();
            $table->string('Color')->nullable();
            $table->decimal('Price', 10, 2);
            $table->integer('StockUnit');
            $table->timestamps();

            // Define foreign key constraint after the column definition
            $table->foreign('ProductID')->references('ProductID')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};
