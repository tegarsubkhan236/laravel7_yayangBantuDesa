<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBantuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bantuans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('penduduk_id')->unsigned();
            $table->bigInteger('jenisbantuan_id')->unsigned();
            $table->string('profil', 100);
            $table->string('kk', 100);
            $table->string('ktp', 100);
            $table->string('status')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('penduduk_id')
                ->references('id')->on('penduduks')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('jenisbantuan_id')
                ->references('id')->on('jenis_bantuans')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bantuans');
    }
}
