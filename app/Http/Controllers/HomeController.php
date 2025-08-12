<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JadwalUjian;
use App\Models\UjianPeserta;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $jumlahAnggota = User::role(['peserta'])->count();
        $jumlahAnggota = User::count();
        $jumlahUjian = JadwalUjian::count();
        $jumlahPeserta = UjianPeserta::count();

        return view('home', compact('jumlahAnggota', 'jumlahUjian', 'jumlahPeserta'));
    }
}
