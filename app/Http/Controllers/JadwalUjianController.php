<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalUjian;

class JadwalUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = JadwalUjian::latest()->paginate(10); // Tidak perlu withCount
        return view('jadwal_ujian.index', compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jadwal_ujian.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'buka_pendaftaran' => 'required|date',
            'tutup_pendaftaran' => 'required|date|after_or_equal:buka_pendaftaran',
            'tanggal_ujian' => 'required|date|after_or_equal:tutup_pendaftaran',
            'keterangan' => 'nullable|string',
        ]);

        JadwalUjian::create($request->all());

        return redirect()->route('jadwal_ujian.index')->with('success', 'Jadwal ujian berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $jadwal = JadwalUjian::with('peserta')->findOrFail($id);
        $jumlahPesertaVerified = $jadwal->peserta()->where('status', 'verified')->count();

        return view('jadwal_ujian.show', compact('jadwal', 'jumlahPesertaVerified'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jadwal = JadwalUjian::findOrFail($id);
        return view('jadwal_ujian.edit', compact('jadwal'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'buka_pendaftaran' => 'required|date',
            'tutup_pendaftaran' => 'required|date|after_or_equal:buka_pendaftaran',
            'tanggal_ujian' => 'required|date|after_or_equal:tutup_pendaftaran',
            'keterangan' => 'nullable|string',
        ]);

        $jadwal = JadwalUjian::findOrFail($id);
        $jadwal->update($request->all());

        return redirect()->route('jadwal_ujian.index')->with('success', 'Jadwal ujian berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jadwal = JadwalUjian::findOrFail($id);

        // Optional: Jika ada relasi ke peserta, hapus juga peserta terkait
        // $jadwal->peserta()->delete();

        $jadwal->delete();

        return redirect()->route('jadwal_ujian.index')->with('success', 'Jadwal ujian berhasil dihapus.');
    }
}
