<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalUjian;
use App\Models\UjianPeserta;
use App\Models\Penilaian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class HasilUjianController extends Controller
{
    public function index()
    {
        // Hanya ambil jadwal yang sudah lewat tanggal ujiannya (ujian selesai)
        $data = JadwalUjian::where('tanggal_ujian', '<', Carbon::today())
            ->orderBy('tanggal_ujian', 'desc')
            ->paginate(10);

        return view('hasil_ujian.index', compact('data'));
    }

    /**
     * Menampilkan detail hasil ujian berdasarkan jadwal.
     */
    public function show($id)
    {
        // Pastikan jadwal ditemukan dulu
        $jadwal = JadwalUjian::find($id);

        if (!$jadwal) {
            return redirect()->route('hasil_ujian.index')->with('error', 'Jadwal ujian tidak ditemukan.');
        }

        // Jika peserta, arahkan ke hasil pribadinya
        // if (Auth::user()->role === 'peserta') {
        //     return redirect()->route('hasil_peserta.index', $id);
        // }

        // Ambil semua peserta pada jadwal ini beserta user & penilaiannya
        $peserta = UjianPeserta::with(['user', 'penilaian'])
            ->where('jadwal_ujian_id', $jadwal->id)
            ->get();

        return view('hasil_ujian.show', compact('jadwal', 'peserta'));
    }

    public function showByPanitia($ujian_peserta_id)
    {
        // Hanya admin dan panitia bisa akses
        if (!auth::user()->role === ['admin', 'panitia']) {
            abort(403, 'User does not have the right roles.');
        }

        $peserta = UjianPeserta::where('id', $ujian_peserta_id)
            ->where('status', 'verified')
            ->first();

        if (!$peserta) {
            return redirect()->back()->with('error', 'Data peserta belum diverifikasi atau tidak ditemukan.');
        }

        $penilaian = Penilaian::where('ujian_peserta_id', $peserta->id)->first();

        if (!$penilaian) {
            return redirect()->back()->with('error', 'Hasil ujian belum tersedia.');
        }

        return view('hasil_peserta.show', [
            'ujianPeserta' => $peserta,
            'penilaian' => $penilaian,
        ]);
    }
}
