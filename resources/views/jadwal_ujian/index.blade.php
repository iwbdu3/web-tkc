@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <strong>{{ __('Jadwal Ujian') }}</strong>
            <a class="btn btn-success btn-sm" href="{{ route('jadwal-ujian.create') }}">+ Tambah Jadwal</a>
            {{-- Tombol tambah (aktifkan sesuai route nantinya) --}}
        </div>

        <div class="card-body">
            <div class="table-responsive"> {{-- ✅ Tambahkan ini --}}

                <table class="table table-bordered table-sm align-middle text-center">
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
                            @endphp


                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $jadwal->nama }}</td>
                                <td>{{ $jadwal->buka_pendaftaran }}</td>
                                <td>{{ $jadwal->tutup_pendaftaran }}</td>
                                <td>{{ $jadwal->tanggal_ujian }}</td>
                                <td><span class="badge bg-{{ $badge }}">{{ $status }}</span></td>
                                <td>
                                    <a href="{{ route('jadwal_ujian.show', $jadwal->id) }}"
                                        class="btn btn-sm btn-info">Detail</a>
                                    <a href="{{ route('jadwal_ujian.edit', $jadwal->id) }}"
                                        class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('jadwal_ujian.destroy', $jadwal->id) }}" method="POST"
                                        class="d-inline">

                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger"
                                            onclick="return confirm('Hapus jadwal ini?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

            <div class="d-flex justify-content-center">
                {!! $data->links() !!}
            </div>
        </div>
    </div>
@endsection
