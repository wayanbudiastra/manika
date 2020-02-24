<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePasien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nocm');
            $table->string('nama');
            $table->text('alamat')->nullable();
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('pekerjaan');
            $table->string('identitas');
            $table->string('no_identitas');
            $table->string('pendidikan');
            $table->string('no_telp');
            $table->enum('aktif', ['Y', 'N'])->default('Y');
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
        Schema::dropIfExists('pasien');
    }
}
