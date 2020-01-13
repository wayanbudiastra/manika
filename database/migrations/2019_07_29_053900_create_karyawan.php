<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaryawan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nik');
            $table->string('nama');
            $table->string('tmp_lahir')->nullable();
            $table->integer('grade_id')->nullable();
            $table->integer('divisi_id')->nullable();
            $table->integer('departemen_id')->nullable();
            $table->text('alamat')->nullable();
            $table->integer('status_id')->nullable();
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
        Schema::dropIfExists('karyawan');
    }
}
