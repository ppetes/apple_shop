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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id('OrderID'); // Primary key
            $table->unsignedBigInteger('OrderBy'); // Define the foreign key column
            $table->date('Date');
            $table->decimal('TotalAmount', 10, 2);
            $table->timestamps();
        
            // Define foreign key constraint after the column definition
            $table->foreign('OrderBy')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
