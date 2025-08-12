@extends('layouts.app')

@php
    use Carbon\Carbon;
@endphp

@section('content')
    @if (!$jadwal)
        <div class="alert alert-warning">Belum ada jadwal ujian yang sedang berlangsung.</div>
    @else
        @php
            $now = Carbon::now();
            $ujianDimulai = $now->isSameDay(Carbon::parse($jadwal->tanggal_ujian));
        @endphp


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
                    <input type="hidden" name="jadwal_ujian_id" value="{{ $jadwal->id }}">

                    <div class="table-responsive">
                        <table class="table table-bordered table-sm text-center align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Pilih</th>
                                    <th>Nomor Peserta</th>
                                    <th>Nama</th>
                                    <th>Dojang</th>
                                    <th>Geup</th>
                                    <th>Nilai Akhir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($peserta as $item)
                                    @if ($item->status === 'verified')
                                        @php
                                            $sudahDinilai = $item->penilaian !== null;
                                        @endphp
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="peserta_terpilih[]" value="{{ $item->id }}"
                                                    {{ $sudahDinilai ? 'checked disabled' : '' }}>
                                            </td>
                                            <td>{{ $item->nomor_peserta }}</td>
                                            <td>{{ $item->user->name ?? '-' }}</td>
                                            <td>{{ $item->dojang ?? '-' }}</td>
                                            <td>{{ $item->geup ?? '-' }}</td>
                                            <td>
                                                @php
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
                                                    $total = $nilai->filter(fn($n) => $n !== null)->sum();
                                                    $rata = $count > 0 ? round($total / $count, 2) : '-';
                                                @endphp
                                                {{ $rata }}
                                            </td>
                                        </tr>
                                    @endif
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada peserta.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <button class="btn btn-primary mt-3" {{ !$ujianDimulai ? 'disabled' : '' }}>
                        Nilai Peserta
                    </button>

                    @if (!$ujianDimulai)
                        <small class="text-muted d-block mt-2">
                            Ujian belum dimulai.
                        </small>
                    @endif
                </form>
            </div>
        </div>
    @endif
@endsection
