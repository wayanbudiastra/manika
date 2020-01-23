<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturDetil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retur_detil', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('retur_id');
            $table->integer('penerimaan_detil_id');
            $table->integer('produk_item_id');
            $table->decimal('harga_beli');
            $table->integer('qty');
            $table->decimal('subtotal');
            $table->enum('aktif',['Y','N'])->default('Y');
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
        Schema::dropIfExists('retur_detil');
    }
}
