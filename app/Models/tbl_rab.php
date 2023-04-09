<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_rab extends Model
{
    use HasFactory;
    protected  $primaryKey = 'id_rab';
    protected $fillable = ['id_penelitian', 'id_kegiatan', 'uraian_kegiatan', 'qty', 'nominal', 'satuan'];
}
