<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKasDetil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kas_detil', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('kas_id');
            $table->date('tgl_transaksi');
            $table->string('transaksi');
            $table->decimal('total_tunai');
            $table->decimal('total_debit');
            $table->decimal('total_kredit');
            $table->decimal('total_lainya');
            $table->decimal('total_pembayaran');
            $table->decimal('total_kembali');
            $table->decimal('kurang_bayar');
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
        Schema::dropIfExists('kas_detil');
    }
}
