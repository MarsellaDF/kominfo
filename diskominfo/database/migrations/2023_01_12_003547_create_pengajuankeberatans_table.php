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
        Schema::create('pengajuankeberatans', function (Blueprint $table) {
            $table->id();
            $table->string('tujuan');
            $table->string('nama1');
            $table->text('alamat1');
            $table->string('pekerjaan');
            $table->string('nomor1');
            $table->string('nama2');
            $table->text('alamat2');
            $table->string('nomor2');
            $table->text('alasan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuankeberatans');
    }
};