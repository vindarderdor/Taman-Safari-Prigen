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
        Schema::create('order_tikets', function (Blueprint $table) {
            $table->increments('ID_TIKET');
            $table->unsignedInteger('ID_USER');
            $table->foreign('ID_USER')->references('ID_USER')->on('users')->onDelete('cascade');
            $table->unsignedInteger('ID_JADWAL');
            $table->foreign('ID_JADWAL')->references('ID_JADWAL')->on('jadwals')->onDelete('cascade');
            $table->integer('JUMLAH');
            $table->decimal('TOTAL_HARGA', 10, 2);
            $table->enum('payment_status', ['pending', 'paid', 'cancelled'])->default('pending');
            $table->string('snap_token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_tikets');
    }
};
