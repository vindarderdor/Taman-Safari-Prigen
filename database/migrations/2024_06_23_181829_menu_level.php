<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MenuLevel extends Migration
{
    public function up()
    {
        Schema::create('MENU_LEVEL', function (Blueprint $table) {
            $table->increments('ID_LEVEL'); // Auto increment ID
            $table->string('LEVEL', 60);
            $table->string('CREATE_BY', 30);
            $table->timestamp('CREATE_DATE');
            $table->string('DELETE_MARK', 1)->default('0');
            $table->string('UPDATE_BY', 30)->nullable();
            $table->timestamp('UPDATE_DATE')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('MENU_LEVEL');
    }
}
