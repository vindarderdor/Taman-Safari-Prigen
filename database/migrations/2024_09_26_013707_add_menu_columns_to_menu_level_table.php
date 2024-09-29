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
        Schema::table('MENU_LEVEL', function (Blueprint $table) {
            $table->string('MENU_NAME', 100)->after('LEVEL');
            $table->string('MENU_LINK', 255)->after('MENU_NAME');
        });
    }

    public function down()
    {
        Schema::table('MENU_LEVEL', function (Blueprint $table) {
            $table->dropColumn(['MENU_NAME', 'MENU_LINK']);
        });
    }
};
