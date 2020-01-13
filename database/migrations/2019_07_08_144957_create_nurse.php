<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNurse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('nurse', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik');
            $table->string('nama');
            $table->string('tempat_lahir')->nullable();
            $table->string('tgl_lahir');
            $table->text('alamat');
            $table->string('str')->nullable();
            $table->date('masa_berlaku')->nullable();
            $table->integer('karyawan_id');
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
        Schema::dropIfExists('nurse');
    }
}
