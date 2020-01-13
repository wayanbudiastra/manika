<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDokter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokter', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->string('nik');
            $table->string('nama');
            $table->string('tmp_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->integer('spesialis_id');
            $table->integer('sub_spesialis_id')->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_telp');
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('dokter');
    }
}
