<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SettingMenuUser extends Migration
{
    public function up()
    {
        Schema::create('SETTING_MENU_USER', function (Blueprint $table) {
            $table->increments('NO_SETTING'); // Auto increment ID
            $table->unsignedInteger('ID_JENIS_USER');
            $table->unsignedInteger('MENU_ID');
            $table->string('CREATE_BY', 30);
            $table->timestamp('CREATE_DATE');
            $table->string('DELETE_MARK', 1)->default('0');
            $table->string('UPDATE_BY', 30)->nullable();
            $table->timestamp('UPDATE_DATE')->nullable();

            // Foreign Keys
            $table->foreign('ID_JENIS_USER')->references('ID_JENIS_USER')->on('JENIS_USER')->onDelete('cascade');
            $table->foreign('MENU_ID')->references('ID_MENU')->on('MENU')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('SETTING_MENU_USER');
    }
}
