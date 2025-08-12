<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UjianPeserta;
use App\Models\JadwalUjian;

class UjianPesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwalAktif = JadwalUjian::whereDate('buka_pendaftaran', '<=', now())
            ->whereDate('tutup_pendaftaran', '>=', now())
            ->first();

        if (!$jadwalAktif) {
            return view('peserta.index', [
                'data' => collect(), // kosong
                'jadwal' => null,
            ]);
        }

        $peserta = UjianPeserta::where('jadwal_ujian_id', $jadwalAktif->id)
            ->orderByRaw("FIELD(status, 'pending', 'verified', 'rejected')")
            ->get();

        return view('peserta.index', [
            'data' => $peserta,
            'jadwal' => $jadwalAktif,
        ]);
    }

    public function pesertaTerverifikasi()
    {
        return $this->hasMany(UjianPeserta::class, 'jadwal_ujian_id')->where('status', 'verified');
    }

    public function verifikasi($id)
    {
        $peserta = UjianPeserta::findOrFail($id);

        // Hitung jumlah peserta dengan geup yang sama pada jadwal ini
        $count = UjianPeserta::where('jadwal_ujian_id', $peserta->jadwal_ujian_id)
            ->where('geup', $peserta->geup)
            ->whereNotNull('nomor_peserta')
            ->count();

        // Nomor urut + 1
        $urutan = $count + 1;

        // Format nomor peserta: g{geup}-{urutan 3 digit}
        $nomorPeserta = 'G' . $peserta->geup . '-' . str_pad($urutan, 3, '0', STR_PAD_LEFT);

        $peserta->update([
            'status' => 'verified',
            'nomor_peserta' => $nomorPeserta,
        ]);

        return back()->with('success', 'Peserta berhasil diverifikasi.');
    }


    public function tolak($id)
    {
        $peserta = UjianPeserta::findOrFail($id);
        $peserta->status = 'rejected';
        $peserta->save();

        return back()->with('success', 'Pendaftaran ditolak.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
