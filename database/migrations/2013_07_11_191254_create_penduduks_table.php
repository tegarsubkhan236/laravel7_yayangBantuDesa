<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenduduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nik')->unsigned()->unique();
            $table->string('nama', 100);
            $table->text('alamat');
            $table->bigInteger('kk');
            $table->string('no_hp', 20);
            $table->string('jenis_kelamin', 2);
            $table->string('pendidikan', 50);
            $table->integer('jumlah_keluarga');
            $table->bigInteger('pekerjaan_id')->unsigned();
            $table->timestamps();

            $table->foreign('pekerjaan_id')
                ->references('id')->on('pekerjaans')
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
        Schema::dropIfExists('penduduks');
    }
}
