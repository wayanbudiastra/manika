<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuplier extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suplier', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_suplier')->nullable();
            $table->string('nama_suplier');
            $table->string('email')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('pic')->nullable();
            $table->text('alamat')->nullable();
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
        Schema::dropIfExists('suplier');
    }
}
