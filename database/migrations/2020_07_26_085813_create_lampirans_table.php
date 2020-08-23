<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLampiransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lampirans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('jenisbantuan_id')->unsigned();
            $table->string('foto1', 150);
            $table->string('foto2', 150);
            $table->string('foto3', 150);
            $table->string('foto4', 150);
            $table->string('foto5', 150);
            $table->timestamps();

            $table->foreign('jenisbantuan_id')
                ->on('jenis_bantuans')->references('id')
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
        Schema::dropIfExists('lampirans');
    }
}
