@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <strong>{{ __('Detail Jadwal Ujian') }}</strong>
            <a href="{{ route('jadwal_ujian.index') }}" class="btn btn-secondary btn-sm float-end">Kembali</a>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Nama</th>
                    <td>{{ $jadwal->nama }}</td>
                </tr>
                <tr>
                    <th>Buka Pendaftaran</th>
                    <td>{{ \Carbon\Carbon::parse($jadwal->buka_pendaftaran)->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <th>Tutup Pendaftaran</th>
                    <td>{{ \Carbon\Carbon::parse($jadwal->tutup_pendaftaran)->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <th>Tanggal Ujian</th>
                    <td>{{ \Carbon\Carbon::parse($jadwal->tanggal_ujian)->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <th>Keterangan</th>
                    <td>{{ $jadwal->keterangan ?? 'Tidak ada keterangan' }}</td>
                </tr>
                <tr>
                    <th>Jumlah Peserta</th>
                    <td>
                        <span class="badge bg-success">{{ $jumlahPesertaVerified }} Peserta</span>
                    </td>
                    {{-- <td>{{ $jumlahPesertaVerified }} Peserta</td> --}}
                </tr>

                <tr>
                    <th>Status</th>
                    <td>
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
                        @endphp
                        <span class="badge bg-{{ $badge }}">{{ $status }}</span>
                    </td>
                </tr>
            </table>

            <div class="d-flex justify-content-center mt-4">
                <a href="{{ route('jadwal_ujian.edit', $jadwal->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('jadwal_ujian.destroy', $jadwal->id) }}" method="POST" class="d-inline-block ml-2"
                    onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </div>
        </div>
    </div>
@endsection
