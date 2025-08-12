@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        <strong>Tambah Jadwal Ujian</strong>
        <a href="{{ route('jadwal_ujian.index') }}" class="btn btn-sm btn-secondary float-end">Kembali</a>
    </div>

    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Ada beberapa masalah dengan inputan Anda.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('jadwal_ujian.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Ujian</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
            </div>

            <div class="mb-3">
                <label for="buka_pendaftaran" class="form-label">Buka Pendaftaran</label>
                <input type="date" name="buka_pendaftaran" class="form-control" value="{{ old('buka_pendaftaran') }}" required>
            </div>

            <div class="mb-3">
                <label for="tutup_pendaftaran" class="form-label">Tutup Pendaftaran</label>
                <input type="date" name="tutup_pendaftaran" class="form-control" value="{{ old('tutup_pendaftaran') }}" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_ujian" class="form-label">Tanggal Ujian</label>
                <input type="date" name="tanggal_ujian" class="form-control" value="{{ old('tanggal_ujian') }}" required>
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea name="keterangan" class="form-control" rows="3">{{ old('keterangan') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
