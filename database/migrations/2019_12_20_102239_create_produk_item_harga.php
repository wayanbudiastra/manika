<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdukItemHarga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_item_harga', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('produk_item_id');
            $table->string('identitas');
            $table->decimal('harga_master');
            $table->decimal('markup');
            $table->decimal('harga_publish');
            $table->text('keterangan')->nullable();
            $table->enum('aktif',['Y','N'])->default('Y');
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
        Schema::dropIfExists('produk_item_harga');
    }
}
