<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJasakatagori extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jasakatagori', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_jasakatagori');
            $table->text('keterangan');
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
        Schema::dropIfExists('jasakatagori');
    }
}
