<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $fillable = [
        'ujian_peserta_id',
        'poomsae_1',
        'poomsae_2',
        'gibon_dongjak',
        'gibon_balchagi',
        'kyourugi',
        'kyupa',
        'tes_fisik',
        'tes_tulis',
    ];

    public function peserta()
    {
        return $this->belongsTo(UjianPeserta::class, 'ujian_peserta_id');
    }
}
