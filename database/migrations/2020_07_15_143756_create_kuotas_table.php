<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKuotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuotas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('jenisbantuan_id')->unsigned();
            $table->integer('tersampaikan');
            $table->timestamps();

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
        Schema::dropIfExists('kuotas');
    }
}
