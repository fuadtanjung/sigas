<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArsipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arsips', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('indeks_id');
            $table->unsignedBigInteger('tingkat_perkembangan_id');
            $table->unsignedBigInteger('bentuk_id');
            $table->unsignedBigInteger('keterangan_id');

            $table->text('deskripsi');
            $table->year('tahun');
            $table->string('jumlah');
            $table->string('rak');
            $table->string('roll_o_pack');
            $table->string('boks');
            $table->string('buku');
            $table->string('sampul');

            $table->foreign('indeks_id')->references('id')->on('indeks')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tingkat_perkembangan_id')->references('id')->on('tingkatperkembangans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('bentuk_id')->references('id')->on('bentuks')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('keterangan_id')->references('id')->on('keterangans')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('arsips');
    }
}
