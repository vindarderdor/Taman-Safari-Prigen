<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('message_tos', function (Blueprint $table) {
            $table->string('NO_RECORD', 36)->primary();
            $table->string('MESSAGE_ID', 36);
            $table->unsignedInteger('TO');
            $table->string('CC', 30)->nullable();
            $table->string('CREATE_BY', 30);
            $table->timestamp('CREATE_DATE');
            $table->string('DELETE_MARK', 1)->default('0');
            $table->string('UPDATE_BY', 30)->nullable();
            $table->timestamp('UPDATE_DATE')->nullable();
            $table->timestamps();

            // Set up foreign key constraints
            $table->foreign('MESSAGE_ID')->references('MESSAGE_ID')->on('messages')->onDelete('cascade');
            $table->foreign('TO')->references('ID_USER')->on('users')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
