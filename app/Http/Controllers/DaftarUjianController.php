<?php

namespace App\Http\Controllers;

use App\Models\JadwalUjian;
use App\Models\UjianPeserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class DaftarUjianController extends Controller
{
    /**
     * Menampilkan daftar jadwal ujian yang masih bisa didaftarkan.
     */
    public function index()
    {
        $now = Carbon::now();

        // $jadwalAktif = JadwalUjian::where('buka_pendaftaran', '<=', $now)
        //     ->where('tutup_pendaftaran', '>=', $now)
        //     ->orderBy('tanggal_ujian', 'asc')
        //     ->get();

        $jadwalAktif = JadwalUjian::all();

        return view('daftar_ujian.index', compact('jadwalAktif'));
    }

    public function form(JadwalUjian $jadwal)
    {
        $now = Carbon::now();

        if ($now->lt($jadwal->buka_pendaftaran) || $now->gt($jadwal->tutup_pendaftaran)) {
            return redirect()->route('daftar_ujian.index')
                ->with('error', 'Pendaftaran untuk jadwal ini sudah ditutup.');
        }

        return view('daftar_ujian.form', compact('jadwal'));
    }

    /**
     * Menampilkan form daftar ujian.
     */
    // public function daftar($id)
    // {
    //     $jadwal = JadwalUjian::findOrFail($id);
    //     return view('daftar_ujian.form', compact('jadwal'));
    // }

    /**
     * Simpan data pendaftaran ke tabel ujian_peserta.
     */
    public function store(Request $request, $jadwal_id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'kota_lahir' => 'required|string|max:255',
            'dojang' => 'required|string|max:255',
            'geup' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:20',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'bukti_pembayaran' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Cek jika sudah mendaftar sebelumnya
        $sudahDaftar = UjianPeserta::where('jadwal_ujian_id', $jadwal_id)
            ->where('custom_id', Auth::user()->custom_id)
            ->exists();

        if ($sudahDaftar) {
            return redirect()->route('daftar_ujian.index')->with('error', 'Kamu sudah mendaftar ujian ini.');
        }

        // Upload file jika ada
        $foto = $request->file('foto') ? $request->file('foto')->store('uploads/foto', 'public') : null;
        $bukti = $request->file('bukti_pembayaran') ? $request->file('bukti_pembayaran')->store('uploads/bukti', 'public') : null;

        UjianPeserta::create([
            'user_id' => Auth::id(), // Tambahkan baris ini
            'jadwal_ujian_id' => $jadwal_id,
            'custom_id' => Auth::user()->custom_id,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'kota_lahir' => $request->kota_lahir,
            'dojang' => $request->dojang,
            'geup' => $request->geup,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'foto' => $foto,
            'bukti_pembayaran' => $bukti,
            'status' => 'pending',
        ]);


        return redirect()->route('daftar_ujian.index')->with('success', 'Pendaftaran berhasil dikirim.');
    }
}
