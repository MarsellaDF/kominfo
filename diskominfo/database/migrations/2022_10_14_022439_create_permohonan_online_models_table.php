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
        Schema::create('permohonan_online_models', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('nama');
            $table->text('alamat');
            $table->string('email');
            $table->string('pekerjaan');
            $table->string('nomor');
            $table->text('informasi');
            $table->text('alasan_tujuan');
            $table->string('cara');
            $table->string('ktp');
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
        Schema::dropIfExists('permohonan_online_models');
    }
};
