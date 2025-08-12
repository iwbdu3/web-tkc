@extends('layouts.app')

@php use Carbon\Carbon; @endphp

@section('content')
    @if (!$jadwal)
        <div class="alert alert-warning">Belum ada jadwal ujian yang sedang berlangsung.</div>
    @else
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Daftar Peserta Ujian - {{ $jadwal->nama }}</h5>
            </div>

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form action="{{ route('penilaian.form') }}" method="POST">
                    @csrf


                    @php $user = auth()->user(); @endphp


                    <input type="hidden" name="jadwal_ujian_id" value="{{ $jadwal->id }}">

                    <div class="table-responsive">
                        <table class="table table-bordered table-sm text-center align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Foto</th>
                                    <th>Nomor Peserta</th>
                                    <th>Nama</th>
                                    <th>Dojang</th>
                                    <th>Geup</th>
                                    <th>Nilai Akhir</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($peserta as $item)
                                    @if ($item->status === 'verified')
                                        @php
                                            $sudahDinilai = $item->penilaian !== null;
                                            $nilai = collect([
                                                $item->penilaian->gibon_dongjak ?? null,
                                                $item->penilaian->gibon_balchagi ?? null,
                                                $item->penilaian->poomsae ?? null,
                                                $item->penilaian->kyourugi ?? null,
                                                $item->penilaian->kyupa ?? null,
                                                $item->penilaian->tes_fisik ?? null,
                                                $item->penilaian->tes_tulis ?? null,
                                            ]);
                                            $count = $nilai->filter(fn($n) => $n !== null)->count();
                                            $total = $nilai->sum();
                                            $rata = $count > 0 ? round($total / $count, 2) : '-';
                                        @endphp
                                        <tr>
                                            <td>
                                                @if ($item->foto)
                                                    <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto"
                                                        width="60" class="img-thumbnail" style="cursor: pointer"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#fotoModal{{ $item->id }}">
                                                    <div class="modal fade" id="fotoModal{{ $item->id }}" tabindex="-1"
                                                        aria-labelledby="fotoModalLabel{{ $item->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="fotoModalLabel{{ $item->id }}">Foto Peserta
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Tutup"></button>
                                                                </div>
                                                                <div class="modal-body text-center">
                                                                    <img src="{{ asset('storage/' . $item->foto) }}"
                                                                        class="img-fluid" alt="Foto Peserta">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <span class="text-muted">Tidak ada foto</span>
                                                @endif
                                            </td>
                                            <td>{{ $item->nomor_peserta }}</td>
                                            <td>{{ $item->user->name ?? '-' }}</td>
                                            <td>{{ $item->dojang ?? '-' }}</td>
                                            <td>{{ $item->geup ?? '-' }}</td>
                                            <td>{{ $rata }}</td>
                                            <td>
                                                @if (is_numeric($rata))
                                                    @if ($rata >= 75)
                                                        <span class="badge bg-success">Lulus</span>
                                                    @else
                                                        <span class="badge bg-danger">Tidak Lulus</span>
                                                    @endif
                                                @else
                                                    <span class="text-muted">Belum Dinilai</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('hasil_ujian.panitia_show', $item->id) }}"
                                                    class="btn btn-sm btn-info">
                                                    Detail
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Tidak ada peserta.</td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>
                </form>
            </div>
        </div>
    @endif
@endsection
