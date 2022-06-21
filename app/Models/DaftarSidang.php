<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarSidang extends Model
{
    use HasFactory;

    protected $table = 'daftar_sidang';

    protected $fillable = [
        'nilai_akhir',
        'judul_ta',
        'berkas',
        'status',
        'id_mhs'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mhs');
    }
}
