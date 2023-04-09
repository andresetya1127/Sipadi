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
        Schema::create('tbl_rabs', function (Blueprint $table) {
            $table->integer('id_rab')->autoIncrement();
            $table->integer('id_penelitian');
            $table->integer('id_kegiatan');
            $table->string('uraian_kegiatan');
            $table->string('qty', 10);
            $table->integer('satuan');
            $table->decimal('nominal', $precision = 10, $sacel = 0);
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
        Schema::dropIfExists('rabs');
    }
};
