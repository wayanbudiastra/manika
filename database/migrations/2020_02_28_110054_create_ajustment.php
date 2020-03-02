<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAjustment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ajustment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tgl_ajust');
            $table->integer('produk_item_id');
            $table->string('jenis_ajust');
            $table->integer('qty');
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
        Schema::dropIfExists('ajustment');
    }
}
