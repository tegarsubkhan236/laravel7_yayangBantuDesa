<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyuluhansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyuluhans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('bantuan_id')->unsigned();
            $table->date('tanggal_penyuluhan');
            $table->string('tempat', 50);
            $table->string('status', 20);
            $table->timestamps();
        });

        Schema::table('penyuluhans', function (Blueprint $table) {
            $table->foreign('bantuan_id')
                ->references('id')->on('bantuans')
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
        Schema::dropIfExists('penyuluhans');
    }
}
