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
            $table->unsignedBigInteger('tingkat_perkembangan_id');
            $table->unsignedBigInteger('bentuk_id');
            $table->unsignedBigInteger('keterangan_id');

            $table->string('indeks');
            $table->string('deskripsi');
            $table->year('tahun');
            $table->string('jumlah');
            $table->string('rak')->nullable();
            $table->string('roll_o_pack')->nullable();
            $table->string('boks')->nullable();
            $table->string('bungkus')->nullable();
            $table->string('buku')->nullable();
            $table->string('sampul')->nullable();

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
