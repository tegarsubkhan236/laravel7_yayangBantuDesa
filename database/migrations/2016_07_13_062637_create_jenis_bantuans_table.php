<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisBantuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_bantuans', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
            $table->string('asal_bantuan', 20);
            $table->string('bentuk_bantuan', 50);
            $table->integer('nominal')->unsigned();
            $table->integer('kuota_tetap');
            $table->integer('kuota');
            $table->string('tempat', 50);
            $table->dateTime('tgl_penyuluhan');
            $table->bigInteger('sasaran_id')->unsigned();
            $table->timestamps();

            $table->foreign('sasaran_id')
                ->references('id')->on('sasarans')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenis_bantuans');
    }
}
