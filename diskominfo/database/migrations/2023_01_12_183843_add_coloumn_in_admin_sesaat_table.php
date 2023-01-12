<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admin_sesaats', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->text('ringkasan')->nullable();
            $table->string('penguasa')->nullable();
            $table->string('penanggungjawab')->nullable();
            $table->text('arsip')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin_sesaats', function (Blueprint $table) {
            $table->String('title');
            $table->dropColumn('ringkasan');
            $table->dropColumn('penguasa');
            $table->dropColumn('penanggungjawab');
            $table->dropColumn('arsip');
        });
    }
};
