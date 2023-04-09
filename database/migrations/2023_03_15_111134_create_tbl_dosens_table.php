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
        Schema::create('tbl_dosens', function (Blueprint $table) {
            $table->char('nidn', 10)->primary();
            $table->string('nama_lengkap', 50);
            $table->char('jafung', 20);
            $table->string('prodi', 20);
            $table->char('no_telpon', 13)->unique();
            $table->string('email', 30)->unique();
            $table->string('alamat', 50);
            $table->string('tmp_lahir', 50);
            $table->date('tgl_lahir');
            $table->string('keilmuan', 50);
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
        Schema::dropIfExists('tbl_dosens');
    }
};
