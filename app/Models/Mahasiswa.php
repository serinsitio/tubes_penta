<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';

    protected $fillable = [
        'id_user',
        'nim',
        'prodi'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function daftarsidang()
    {
        return $this->hasOne(DaftarSidang::class, 'id_mhs');
    }

    public function jadwalsidang()
    {
        return $this->hasOne(JadwalSidang::class, 'id_mhs');
    }
}
