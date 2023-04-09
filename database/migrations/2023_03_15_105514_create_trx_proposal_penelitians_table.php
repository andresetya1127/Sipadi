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
        Schema::create('trx_proposal_penelitians', function (Blueprint $table) {
            $table->integer('id_penelitian')->autoIncrement();
            $table->char('nidn', 10);
            $table->integer('id_bidang');
            $table->string('judul_penelitian');
            $table->year('tahun_penelitian');
            $table->decimal('anggaran');
            $table->string('luaran_wajib');
            $table->string('luaran_tambahan');
            $table->string('dokumen_proposal', 50);
            $table->integer('id_jenis');
            $table->integer('status')->length(2);
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
        Schema::dropIfExists('trx_proposal_penelitians');
    }
};
