<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trx_anggota_penelitian_dosen extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_anggota_dosen';
    protected $fillable = ['id_penelitian', 'nidn', 'uraian_tugas'];
}
