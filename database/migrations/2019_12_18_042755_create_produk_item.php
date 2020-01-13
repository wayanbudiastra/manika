<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdukItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_item', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode')->nullable();
            $table->string('nama_tindakan');
            $table->integer('katagori_item_id');
            $table->integer('satuan_besar_id');
            $table->integer('satuan_kecil_id');
            $table->integer('isi_satuan');
            $table->decimal('harga_beli');
            $table->decimal('harga_jual');
            $table->decimal('fee_dokter')->nullable();
            $table->decimal('fee_asisten')->nullable();
            $table->decimal('fee_staff')->nullable();
            $table->text('keterangan')->nullable();
            $table->integer('stok')->nullable();
            $table->integer('stok_max')->nullable();
            $table->integer('stok_min')->nullable();
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
        Schema::dropIfExists('produk_item');
    }
}
