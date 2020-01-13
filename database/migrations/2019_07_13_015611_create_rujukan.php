<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRujukan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rujukan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode');
            $table->string('nm_rujukan');
            $table->string('alamat')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('rujukan');
    }
}
