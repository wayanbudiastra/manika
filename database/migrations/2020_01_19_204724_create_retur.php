<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRetur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retur', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('penerimaan_id');
            $table->date('tgl_retur');
            $table->text('keterangan');
            $table->integer('users_id');
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
        Schema::dropIfExists('retur');
    }
}
