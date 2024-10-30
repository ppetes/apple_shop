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
        Schema::create('products', function (Blueprint $table) {
            $table->id('ProductID');
            $table->string('ProductName');
            $table->unsignedBigInteger('ProductCategoryID'); // Foreign key column

            // Explicitly reference ProductCategoryID in product_categories
            $table->foreign('ProductCategoryID')
                  ->references('ProductCategoryID')
                  ->on('product_categories')
                  ->onDelete('cascade');

            $table->string('Photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
