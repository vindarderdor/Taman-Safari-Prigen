<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JenisUser extends Migration
{
    public function up()
    {
        Schema::create('JENIS_USER', function (Blueprint $table) {
            $table->increments('ID_JENIS_USER'); // Auto increment ID
            $table->string('JENIS_USER', 60);
            $table->string('CREATE_BY', 30)->nullable();
            $table->timestamp('CREATE_DATE');
            $table->string('DELETE_MARK', 1)->default('0');
            $table->string('UPDATE_BY', 30)->nullable();
            $table->timestamp('UPDATE_DATE')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('JENIS_USER');
    }
}
