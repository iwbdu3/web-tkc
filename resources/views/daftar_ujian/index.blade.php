@extends('layouts.app')

@php use Carbon\Carbon; @endphp

@section('content')
    @foreach ($jadwalAktif as $jadwal)
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">{{ $jadwal->nama }}</h5>
            </div>

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-sm text-center align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Buka Pendaftaran</th>
                                <th>Tutup Pendaftaran</th>
                                <th>Tanggal Ujian</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $now = Carbon::now();
                                $status = 'Tertutup';
                                $badge = 'secondary';

                                if ($now->between($jadwal->buka_pendaftaran, $jadwal->tutup_pendaftaran)) {
                                    $status = 'Pendaftaran Dibuka';
                                    $badge = 'success';
                                } elseif ($now->lt($jadwal->buka_pendaftaran)) {
                                    $status = 'Belum Dibuka';
                                    $badge = 'info';
                                } elseif ($now->gt($jadwal->tutup_pendaftaran)) {
                                    $status = 'Pendaftaran Ditutup';
                                    $badge = 'danger';
                                }

                                $sudahDaftar = \App\Models\UjianPeserta::where('jadwal_ujian_id', $jadwal->id)
                                    ->where('user_id', auth()->id())
                                    ->exists();
                            @endphp

                            <tr>
                                <td>1</td>
                                <td>{{ $jadwal->nama }}</td>
                                <td>{{ \Carbon\Carbon::parse($jadwal->buka_pendaftaran)->format('d M Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($jadwal->tutup_pendaftaran)->subDay()->format('d M Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($jadwal->tanggal_ujian)->format('d M Y') }}</td>
                                <td><span class="badge bg-{{ $badge }}">{{ $status }}</span></td>
                                <td>
                                    @if ($sudahDaftar)
                                        <span class="text-success">Sudah Mendaftar</span>
                                    @elseif ($status === 'Pendaftaran Dibuka')
                                        <a href="{{ route('daftar_ujian.form', $jadwal->id) }}"
                                            class="btn btn-sm btn-primary">Daftar</a>
                                    @else
                                        <span class="text-muted">Tidak Tersedia</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach
@endsection
