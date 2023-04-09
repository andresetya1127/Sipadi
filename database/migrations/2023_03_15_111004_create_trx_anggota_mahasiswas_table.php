<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trx_anggota_mahasiswas', function (Blueprint $table) {
            $table->integer('id_anggota_mahasiswa')->autoIncrement();
            $table->integer('id_penelitian');
            $table->char('nim', 10);
            $table->text('uraian_tugas');
            $table->timestamps();
            $table->foreign('id_penelitian')->references('id_penelitian')->on('trx_proposal_penelitians');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trx_anggota_mahasiswas');
    }
};
