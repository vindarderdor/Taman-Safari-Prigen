<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('POSTING_ID');
            $table->unsignedInteger('SENDER');
            $table->text('MESSAGE_TEXT');
            $table->string('MESSAGE_GAMBAR', 200)->nullable();
            $table->string('CREATE_BY', 30)->nullable();
            $table->timestamp('CREATE_DATE')->nullable();
            $table->char('DELETE_MARK', 1)->default('0');
            $table->string('UPDATE_BY', 30)->nullable();
            $table->timestamp('UPDATE_DATE')->nullable();

            $table->foreign('SENDER')
                ->references('ID_USER')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
