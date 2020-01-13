<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetilPembayaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detil_pembayaran', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->integer('pembayaran_id');
             $table->string('transaksi');
             $table->string('kode_item');
             $table->string('nama_item');
             $table->string('katagori_item');
             $table->integer('qty');
             $table->decimal('harga_jual');
             $table->decimal('payer_net')->nullable();
             $table->decimal('pasien_net')->nullable();
             $table->decimal('subtotal');
             $table->enum('aktif', ['Y', 'N'])->default('Y');
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
        Schema::dropIfExists('detil_pembayaran');
    }
}
