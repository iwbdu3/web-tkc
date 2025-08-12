@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <strong>{{ __('Hasil Ujian') }}</strong>
        </div>

        <div class="card-body">
            <div class="table-responsive"> {{-- ✅ Tambahkan ini --}}
                <table class="table table-bordered table-sm align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Keterangan</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $jadwal)
                            @php
                                $now = \Carbon\Carbon::now();
                                $buka = \Carbon\Carbon::parse($jadwal->buka_pendaftaran);
                                $tutup = \Carbon\Carbon::parse($jadwal->tutup_pendaftaran);
                                $ujian = \Carbon\Carbon::parse($jadwal->tanggal_ujian);

                                if ($now->between($buka, $tutup)) {
                                    $status = 'Pendaftaran';
                                    $badge = 'primary';
                                } elseif ($now->lt($ujian)) {
                                    $status = 'Pending';
                                    $badge = 'secondary';
                                } elseif ($now->isSameDay($ujian)) {
                                    $status = 'Ujian';
                                    $badge = 'warning';
                                } elseif ($now->gt($ujian)) {
                                    $status = 'Selesai';
                                    $badge = 'success';
                                } else {
                                    $status = 'Tidak Diketahui';
                                    $badge = 'dark';
                                }

                                $peserta = \App\Models\UjianPeserta::where('jadwal_ujian_id', $jadwal->id)
                                    ->where('user_id', Auth::id())
                                    ->first();
                            @endphp

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $jadwal->nama }}</td>
                                <td>{{ $jadwal->keterangan }}</td>
                                <td>{{ \Carbon\Carbon::parse($jadwal->tanggal_ujian)->format('d M Y') }}</td>
                                <td><span class="badge bg-{{ $badge }}">{{ $status }}</span></td>
                                <td>
                                    @php $user = auth()->user(); @endphp

                                    @if ($user->hasRole('peserta'))
                                        <a href="{{ route('hasil_peserta.show', ['jadwal_id' => $jadwal->id, 'custom_id' => $user->custom_id]) }}"
                                            class="btn btn-sm btn-info">Detail</a>
                                    @elseif ($user->hasRole('admin') || $user->hasRole('panitia'))
                                        <a href="{{ route('hasil_ujian.show', ['id' => $jadwal->id]) }}"
                                            class="btn btn-sm btn-info">Detail</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> {{-- ✅ Tutup div table-responsive --}}
            
            <div class="d-flex justify-content-center">
                {!! $data->links() !!}
            </div>
        </div>
    </div>
@endsection
