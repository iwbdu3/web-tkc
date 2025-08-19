<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UjianPeserta extends Model
{
    use HasFactory;

    protected $table = 'ujian_peserta';

    protected $fillable = [
        'user_id',
        'custom_id',
        'jadwal_ujian_id',
        'nomor_peserta',
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'kota_lahir',
        'dojang',
        'geup',
        'alamat',
        'no_hp',
        'foto',
        'bukti_pembayaran',
        'status',
    ];

    public function jadwal()
    {
        return $this->belongsTo(JadwalUjian::class, 'jadwal_ujian_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function penilaian()
    {
        return $this->hasOne(Penilaian::class, 'ujian_peserta_id');
    }

}
