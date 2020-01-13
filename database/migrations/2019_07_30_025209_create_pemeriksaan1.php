<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemeriksaan1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemeriksaan1', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('registrasi_id');
            $table->integer('poli_id');
            $table->integer('dokter_id');
            $table->string('riwayat_alergi')->nullable();
            $table->text('keluhan_utama')->nullable();
            $table->text('riwayat_penyakit_sekarang')->nullable();
            $table->text('riwayat_penyakit_dahulu')->nullable();
            $table->text('riwayat_pengobatan')->nullable();
            $table->string('keadaan_umum')->nullable();
            $table->string('gcs_e')->nullable();
            $table->string('gcs_v')->nullable();
            $table->string('gcs_m')->nullable();
            $table->string('berat_badan')->nullable();
            $table->string('tinggi_badan')->nullable();
            $table->string('tekanan_darah')->nullable();
            $table->string('suhu_tubuh')->nullable();
            $table->string('nadi')->nullable();
            $table->string('respirasi')->nullable();
            $table->string('saturasi')->nullable();
            $table->string('saturasi_pada')->nullable();
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
        Schema::dropIfExists('pemeriksaan1');
    }
}
