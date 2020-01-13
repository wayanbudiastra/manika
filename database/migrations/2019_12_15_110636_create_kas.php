<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tgl_open');
            $table->date('tgl_close');
            $table->decimal('kas_awal');
            $table->decimal('total_tunai');
            $table->decimal('total_debit');
            $table->decimal('total_kredit');
            $table->decimal('total_lain');
            $table->decimal('total_transaksi');
            $table->decimal('total_kembali');
            $table->decimal('kas_akhir');
            $table->integer('users_id');
            $table->text('keterangan');
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
        Schema::dropIfExists('kas');
    }
}
