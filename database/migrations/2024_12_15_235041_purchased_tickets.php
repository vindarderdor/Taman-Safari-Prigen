<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('purchased_tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('content_id');
            $table->uuid('transaksi_id')->nullable();
            $table->string('ticket_type');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->date('booking_date');
            $table->string('ticket_number')->unique();
            $table->enum('status', ['unused', 'used'])->default('unused');
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
        Schema::dropIfExists('purchased_tickets');
    }
};

