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
    Schema::create('messages', function (Blueprint $table) {
        $table->string('MESSAGE_ID', 36)->primary();
        $table->unsignedInteger('SENDER');
        $table->string('MESSAGE_REFERENCE', 30)->nullable();
        $table->string('SUBJECT', 300);
        $table->text('MESSAGE_TEXT');
        $table->string('MESSAGE_STATUS', 30);
        $table->string('NO_MK', 30)->nullable();
        $table->string('CREATE_BY', 30);
        $table->timestamp('CREATE_DATE');
        $table->string('DELETE_MARK', 1)->default('0');
        $table->string('UPDATE_BY', 30)->nullable();
        $table->timestamp('UPDATE_DATE')->nullable();
        $table->timestamps();

        $table->foreign('SENDER')
            ->references('ID_USER')
            ->on('users')
            ->onDelete('cascade');
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
