<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSasaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sasarans', function (Blueprint $table) {
            $table->id();
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
        Schema::dropIfExists('sasarans');
    }
}
