<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTindakanItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tindakan_item', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode')->nullable();
            $table->string('nama_tindakan');
            $table->integer('katagori_tindakan_id');
            $table->decimal('harga_jual');
            $table->decimal('fee_dokter')->nullable();
            $table->decimal('fee_asisten')->nullable();
            $table->decimal('fee_staff')->nullable();
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('tindakan_item');
    }
}
