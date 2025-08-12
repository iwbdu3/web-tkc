@extends('layouts.app')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header">
            <h5 class="mb-0">Pendaftaran Ujian: {{ $jadwal->nama }}</h5>
        </div>

        <div class="card-body">
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('daftar_ujian.store', $jadwal->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="kota_lahir" class="form-label">Kota Lahir</label>
                    <input type="text" name="kota_lahir" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="dojang" class="form-label">Nama Dojang</label>
                    <input type="text" name="dojang" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="geup" class="form-label">Geup</label>
                    <input type="text" name="geup" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="no_hp" class="form-label">No HP</label>
                    <input type="text" name="no_hp" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Foto (opsional)</label>
                    <input type="file" name="foto" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="bukti_pembayaran" class="form-label">Bukti Pembayaran (opsional)</label>
                    <input type="file" name="bukti_pembayaran" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Kirim Pendaftaran</button>
                <a href="{{ route('daftar_ujian.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
