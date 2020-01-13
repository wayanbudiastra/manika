<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTindakan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tindakan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode');
            $table->string('nm_tindakan');
            $table->integer('katagoritindakan_id');
            $table->decimal('tarif')->nullable();
            $table->decimal('feedokter')->nullable();
            $table->decimal('feenurse')->nullable();
            $table->text('keterangan');
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
        Schema::dropIfExists('tindakan');
    }
}
