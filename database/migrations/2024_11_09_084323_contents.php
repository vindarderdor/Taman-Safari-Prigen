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
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('ID_KONTEN');
            $table->string('TITLE');
            $table->text('DESCRIPSION')->nullable();
            $table->integer('HARGA_ADULT')->nullable();
            $table->integer('HARGA_CHILD')->nullable();
            $table->string('IMAGE')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
