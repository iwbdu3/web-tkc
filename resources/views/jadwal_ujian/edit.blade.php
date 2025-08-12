@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <strong>Edit Jadwal Ujian</strong>
            <a href="{{ route('jadwal_ujian.index') }}" class="btn btn-sm btn-secondary float-end">Kembali</a>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Ada masalah pada input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('jadwal_ujian.update', $jadwal->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama">Nama Ujian</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama', $jadwal->nama) }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="buka_pendaftaran">Buka Pendaftaran</label>
                    <input type="date" name="buka_pendaftaran" class="form-control"
                        value="{{ old('buka_pendaftaran', $jadwal->buka_pendaftaran) }}" required>
                </div>

                <div class="mb-3">
                    <label for="tutup_pendaftaran">Tutup Pendaftaran</label>
                    <input type="date" name="tutup_pendaftaran" class="form-control"
                        value="{{ old('tutup_pendaftaran', $jadwal->tutup_pendaftaran) }}" required>
                </div>

                <div class="mb-3">
                    <label for="tanggal_ujian">Tanggal Ujian</label>
                    <input type="date" name="tanggal_ujian" class="form-control"
                        value="{{ old('tanggal_ujian', $jadwal->tanggal_ujian) }}" required>
                </div>

                <div class="mb-3">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" class="form-control">{{ old('keterangan', $jadwal->keterangan) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
@endsection
