<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenerimaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerimaan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomor_penerimaan');
            $table->string('refensi')->nullable();
            $table->integer('suplier_id');
            $table->text('keterangan')->nullable();
            $table->enum('posting',['Y','N'])->default('N');
            $table->enum('aktif',['Y','N'])->default('Y');
            $table->date('tgl_add');
            $table->time('jam_add');
            $table->integer('users_id');
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
        Schema::dropIfExists('penerimaan');
    }
}
