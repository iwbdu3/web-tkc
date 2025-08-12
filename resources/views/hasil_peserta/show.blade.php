@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Detail Hasil Peserta - {{ $ujianPeserta->user->name }}</h5>
        </div>
        <div class="card-body">
            <p><strong>Nomor Peserta:</strong> {{ $ujianPeserta->nomor_peserta }}</p>
            <p><strong>Dojang:</strong> {{ $ujianPeserta->dojang }}</p>
            <p><strong>Geup:</strong> {{ $ujianPeserta->geup }}</p>

            <hr>

            <h6>Nilai Penilaian:</h6>
            @if ($ujianPeserta->penilaian)
                @php
                    $nilai = collect([
                        $ujianPeserta->penilaian->gibon_dongjak,
                        $ujianPeserta->penilaian->gibon_balchagi,
                        $ujianPeserta->penilaian->poomsae,
                        $ujianPeserta->penilaian->kyourugi,
                        $ujianPeserta->penilaian->kyupa,
                        $ujianPeserta->penilaian->tes_fisik,
                        $ujianPeserta->penilaian->tes_tulis,
                    ]);

                    // Hitung hanya nilai yang tidak null
                    $count = $nilai->filter(fn($n) => $n !== null)->count();
                    $total = $nilai->sum();
                    $rata = $count > 0 ? round($total / $count, 2) : '-';
                @endphp
                <ul>
                    <li>Gibon Dongjak: {{ $ujianPeserta->penilaian->gibon_dongjak }}</li>
                    <li>Gibon Balchagi: {{ $ujianPeserta->penilaian->gibon_balchagi }}</li>
                    <li>Poomsae: {{ $ujianPeserta->penilaian->poomsae }}</li>
                    <li>Kyourugi: {{ $ujianPeserta->penilaian->kyourugi }}</li>
                    <li>Kyupa: {{ $ujianPeserta->penilaian->kyupa }}</li>
                    <li>Tes Fisik: {{ $ujianPeserta->penilaian->tes_fisik }}</li>
                    <li>Tes Tulis: {{ $ujianPeserta->penilaian->tes_tulis }}</li>
                    <li><strong>Nilai Akhir:</strong> {{ $rata }}</li>
                </ul>
                <div class="text-center mt-3">
                    @if (is_numeric($rata))
                        @if ($rata >= 75)
                            <span class="badge bg-success fs-2 p-2">Lulus</span>
                        @else
                            <span class="badge bg-danger fs-2 p-2">Tidak Lulus</span>
                        @endif
                    @else
                        <span class="text-muted fs-2">Belum Ada Penilaian</span>
                    @endif
                </div>
            @else
                <p class="text-muted">Belum ada penilaian.</p>
            @endif
        </div>
    </div>
@endsection
