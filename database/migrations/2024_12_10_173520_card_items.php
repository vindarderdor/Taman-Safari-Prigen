<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('content_id');
            $table->uuid('transaksi_id')->nullable();
            $table->unsignedInteger('quantity')->default(1);
            $table->enum('ticket_type', ['adult', 'child']);
            $table->integer('price');
            $table->date('booking_date')->nullable();
            $table->timestamps();
            
            $table->foreign('user_id')
                ->references('ID_USER')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('content_id')
                  ->references('ID_KONTEN')
                  ->on('contents')
                  ->onDelete('cascade');
            $table->foreign('transaksi_id')
                  ->references('id')
                  ->on('transaksi')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cart_items');
    }
};