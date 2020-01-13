<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKartustok extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kartustok', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('periode');
            $table->integer('produk_item_id');
            $table->integer('stok_awal');
            $table->integer('stok_masuk');
            $table->integer('stok_keluar');
            $table->integer('stok_akhir');
            //$table->decimal('harga_rata2');
            $table->string('transaksi');
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('kartustok');
    }
}
