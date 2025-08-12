<?php

namespace App\Http\Controllers;

use App\Models\JadwalUjian;
use App\Models\UjianPeserta;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PenilaianController extends Controller
{
    public function index()
    {
        $now = Carbon::now();

        // Cari jadwal ujian yang sedang berlangsung:
        $jadwal = JadwalUjian::where(function ($query) use ($now) {
            $query->whereDate('buka_pendaftaran', '<=', $now)
                ->whereDate('tutup_pendaftaran', '>=', $now)
                ->orWhereDate('tanggal_ujian', $now);
        })->first();

        if (!$jadwal) {
            return view('penilaian.index')->with('peserta', collect())->with('jadwal', null);
        }

        // Ambil peserta yang sudah diverifikasi
        $peserta = $jadwal->peserta()->where('status', 'verified')->with(['user', 'penilaian'])->get();

        return view('penilaian.index', compact('jadwal', 'peserta'));
    }

    // Menampilkan form input penilaian
    public function form(Request $request)
    {
        $request->validate([
            'peserta_terpilih' => 'required|array',
            'jadwal_ujian_id' => 'required|exists:jadwal_ujians,id',
        ]);

        $jadwal = JadwalUjian::findOrFail($request->jadwal_ujian_id);
        $pesertaList = UjianPeserta::whereIn('id', $request->peserta_terpilih)->get();

        return view('penilaian.form', compact('jadwal', 'pesertaList'));
    }

    // Menyimpan penilaian peserta
    public function store(Request $request)
    {
        foreach ($request->penilaian as $pesertaId => $nilai) {
            Penilaian::updateOrCreate(
                ['ujian_peserta_id' => $pesertaId],
                $nilai
            );
        }

        return redirect()->route('penilaian.index', $request->jadwal_ujian_id)
            ->with('success', 'Penilaian berhasil disimpan.');
    }
}
