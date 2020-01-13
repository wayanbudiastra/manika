<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenerimaanDetil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerimaan_detil', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('penerimaan_id');
            $table->integer('produk_item_id');
            $table->integer('satian_kecil_id');
            $table->integer('satian_besar_id');
            $table->integer('isi_satuan');
            $table->decimal('harga_beli');
            $table->integer('qty');
            $table->decimal('subtotal');
            $table->enum('aktif',['Y','N'])->default('Y');
            $table->integer('user_id');
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
        Schema::dropIfExists('penerimaan_detil');
    }
}
