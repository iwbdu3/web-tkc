<?php

namespace App\Http\Controllers;

use App\Models\UjianPeserta;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasilPesertaController extends Controller
{
    /**
     * Tampilkan detail hasil peserta berdasarkan ID.
     */
    // public function show($id)
    // {
    //     // Ambil data peserta termasuk user dan penilaiannya
    //     $peserta = UjianPeserta::with(['user', 'penilaian'])->findOrFail($id);

    //     return view('hasil_peserta.show', compact('peserta'));
    // }

    public function show($jadwal_id, $custom_id)
    {
        // Validasi: hanya custom_id dengan prefix 'psa' (peserta) yang boleh akses
        // if (
        //     !str_starts_with($custom_id, 'psa') ||
        //     str_starts_with($custom_id, 'adm') ||
        //     str_starts_with($custom_id, 'pnt')
        // ) {
        //     return redirect()->back()->with('error', 'Anda bukan peserta.');
        // }

        // Ambil data ujian_peserta yang sesuai dengan jadwal dan user peserta
        $peserta = UjianPeserta::where('jadwal_ujian_id', $jadwal_id)
            ->where('custom_id', $custom_id)
            ->where('status', 'verified')
            ->first();

        // Jika tidak ditemukan atau belum diverifikasi
        if (!$peserta) {
            return redirect()->back()->with('error', 'Data peserta belum diverifikasi atau tidak ditemukan.');
        }

        // Ambil data penilaian jika sudah dinilai
        $penilaian = Penilaian::where('ujian_peserta_id', $peserta->id)->first();

        if (!$penilaian) {
            return redirect()->back()->with('error', 'Hasil ujian belum tersedia.');
        }

        return view('hasil_peserta.show', [
            'ujianPeserta' => $peserta,
            'penilaian' => $penilaian,
        ]);
    }

    // public function showByPanitia($ujian_peserta_id)
    // {
    //     // Hanya admin dan panitia bisa akses
    //     if (!auth::user()->role === ['admin', 'panitia']) {
    //         abort(403, 'User does not have the right roles.');
    //     }

    //     $peserta = UjianPeserta::where('id', $ujian_peserta_id)
    //         ->where('status', 'verified')
    //         ->first();

    //     if (!$peserta) {
    //         return redirect()->back()->with('error', 'Data peserta belum diverifikasi atau tidak ditemukan.');
    //     }

    //     $penilaian = Penilaian::where('ujian_peserta_id', $peserta->id)->first();

    //     if (!$penilaian) {
    //         return redirect()->back()->with('error', 'Hasil ujian belum tersedia.');
    //     }

    //     return view('hasil_ujian.show', [
    //         'ujianPeserta' => $peserta,
    //         'penilaian' => $penilaian,
    //     ]);
    // }
}
