<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trx_anggota_mahasiswa extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_anggota_mahasiswa';
    protected $fillable = ['nim', 'id_penelitian', 'uraian_tugas'];
}
