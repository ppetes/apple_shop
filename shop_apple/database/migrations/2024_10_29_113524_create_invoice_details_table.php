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
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->unsignedBigInteger('OrderID'); // Define the foreign key column
            $table->unsignedBigInteger('ProductID'); // Define the foreign key column
            $table->integer('Quantity');
            $table->timestamps();
        
            // Define foreign key constraints after the column definitions
            $table->foreign('OrderID')->references('OrderID')->on('invoices')->onDelete('cascade');
            $table->foreign('ProductID')->references('ProductID')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_details');
    }
};
