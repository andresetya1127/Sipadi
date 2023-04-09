<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trx_proposal_penelitian extends Model
{
    use HasFactory;
    protected $primaryKey = "id_penelitian";
    protected $fillable =
    [
        'nidn',
        'id_bidang',
        'judul_penelitian',
        'tahun_penelitian',
        'anggaran',
        'luaran_wajib',
        'luaran_tambahan',
        'dokumen_proposal',
        'id_jenis',
        'status'
    ];
    public function anggota_dosen()
    {
        return $this->hasMany(trx_anggota_penelitian_dosen::class, 'id_penelitian', 'id_penelitian');
    }
    public function rab()
    {
        return $this->hasMany(tbl_rab::class, 'id_penelitian', 'id_penelitian');
    }
    public function bidang()
    {
        return $this->hasOne(tbl_bidang_peneltian::class, 'id_bidang', 'id_bidang');
    }
}
