<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Menu extends Migration
{
    public function up()
    {
        Schema::create('MENU', function (Blueprint $table) {
            $table->increments('ID_MENU'); // Auto increment ID
            $table->string('MENU_NAME', 60);
            $table->string('MENU_LINK', 300);
            $table->string('MENU_ICON', 300)->nullable();
            $table->unsignedInteger('PARENT_ID')->nullable();
            $table->string('CREATE_BY', 30);
            $table->timestamp('CREATE_DATE');
            $table->string('DELETE_MARK', 1)->default('0');
            $table->string('UPDATE_BY', 30)->nullable();
            $table->timestamp('UPDATE_DATE')->nullable();

            // Foreign key for Parent Menu
            $table->foreign('PARENT_ID')->references('ID_MENU')->on('MENU')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('MENU');
    }
}
