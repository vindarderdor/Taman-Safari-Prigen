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
        Schema::create('midtrans', function (Blueprint $table) {
            $table->increments('ID_MIDTRANS');
            $table->unsignedInteger('ID_TIKET');
            $table->string('TRANSACTION_ID')->unique(); // Midtrans transaction ID
            $table->string('STATUS'); // Status from Midtrans (e.g., 'pending', 'settlement', 'deny')
            $table->decimal('GROSS_AMOUNT', 10, 2); // Total amount
            $table->string('PAYMENT_TYPE'); // Payment type (e.g., 'credit_card', 'gopay')
            $table->string('TRANSACTION_TIME'); // Transaction time
            $table->string('TRANSACTION_STATUS'); // Transaction status from Midtrans
            $table->string('FRAUD_STATUS')->nullable(); // Fraud status if available
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('ID_TIKET')->references('ID_TIKET')->on('order_tikets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('midtrans');
    }
};
