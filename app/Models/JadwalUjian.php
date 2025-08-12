<?php

// app/Models/JadwalUjian.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalUjian extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'gambar',
        'buka_pendaftaran',
        'tutup_pendaftaran',
        'tanggal_ujian',
        'keterangan',
    ];

    public function peserta()
    {
        return $this->hasMany(UjianPeserta::class, 'jadwal_ujian_id');
    }
}
