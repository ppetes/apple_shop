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
        Schema::create('carts', function (Blueprint $table) {
            $table->id('CartID'); // Primary key
            $table->unsignedBigInteger('ProductID'); // Define the foreign key column
            $table->unsignedBigInteger('CustomerID'); // Define the foreign key column
            $table->integer('Quantity');
            $table->timestamps();
        
            // Define foreign key constraints after the column definitions
            $table->foreign('ProductID')->references('ProductID')->on('products')->onDelete('cascade');
            $table->foreign('CustomerID')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
