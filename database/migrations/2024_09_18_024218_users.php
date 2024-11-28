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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('ID_USER'); // Auto increment ID
            $table->string('NAMA_USER', 60);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            // $table->string('USERNAME', 60)->unique();
            $table->string('NO_HP', 30)->nullable();
            $table->string('WA', 30)->nullable();
            // $table->string('PIN', 30)->nullable();
            $table->unsignedInteger('ID_JENIS_USER');
            $table->string('STATUS_USER', 30)->nullable()->default('active');
            $table->string('DELETE_MARK', 1)->default('0');
            $table->string('CREATE_BY', 30)->nullable();
            $table->timestamp('CREATE_DATE')->nullable();
            $table->string('UPDATE_BY', 30)->nullable();
            $table->timestamp('UPDATE_DATE')->nullable();

            $table->foreign('ID_JENIS_USER')
                ->references('ID_JENIS_USER')
                ->on('JENIS_USER')
                ->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
