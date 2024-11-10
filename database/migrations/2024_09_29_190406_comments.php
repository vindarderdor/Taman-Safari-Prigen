<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('KOMEN_ID');
            $table->unsignedInteger('POSTING_ID');
            $table->unsignedInteger('USER_ID');
            $table->text('KOMENTAR_TEXT');
            $table->string('KOMENTAR_GAMBAR', 200)->nullable();
            $table->string('CREATE_BY', 30)->nullable();
            $table->timestamp('CREATE_DATE')->nullable();
            $table->char('DELETE_MARK', 1)->default('0');
            $table->string('UPDATE_BY', 30)->nullable();
            $table->timestamp('UPDATE_DATE')->nullable();

            $table->foreign('POSTING_ID')
                ->references('POSTING_ID')
                ->on('posts')
                ->onDelete('cascade');
            $table->foreign('USER_ID')
                ->references('ID_USER')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
