@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <strong>Peserta Ujian - {{ $jadwal->nama ?? 'Tidak Ada Jadwal Aktif' }}</strong>
        </div>

        <div class="card-body">
            <div class="table-responsive"> {{-- ✅ Tambahkan ini --}}

                <table class="table table-bordered table-sm align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nomor Peserta</th>
                            <th>Nama</th>
                            <th>JK</th>
                            <th>Tgl Lahir</th>
                            <th>Kota Lahir</th>
                            <th>Dojang</th>
                            <th>Geup</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Status</th>
                            <th>Bukti</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $i => $d)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>
                                    @if ($d->foto)
                                        <!-- Gambar thumbnail -->
                                        <img src="{{ asset('storage/foto/' . $d->foto) }}" alt="Foto" width="60"
                                            class="img-thumbnail" style="cursor: pointer" data-bs-toggle="modal"
                                            data-bs-target="#fotoModal{{ $d->id }}">

                                        <!-- Modal Bootstrap -->
                                        <div class="modal fade" id="fotoModal{{ $d->id }}" tabindex="-1"
                                            aria-labelledby="fotoModalLabel{{ $d->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="fotoModalLabel{{ $d->id }}">Foto
                                                            Peserta</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Tutup"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <img src="{{ asset('storage/' . $d->foto) }}" class="img-fluid"
                                                            alt="Foto Peserta">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif

                                </td>
                                <td>{{ $d->nomor_peserta ?? '-' }}</td>
                                <td>{{ $d->nama }}</td>
                                <td>{{ $d->jenis_kelamin }}</td>
                                <td>{{ $d->tanggal_lahir }}</td>
                                <td>{{ $d->kota_lahir }}</td>
                                <td>{{ $d->dojang }}</td>
                                <td>{{ $d->geup }}</td>
                                <td>{{ $d->alamat }}</td>
                                <td>{{ $d->no_hp }}</td>
                                <td>
                                    @php
                                        $badge = match ($d->status) {
                                            'verified' => 'success',
                                            'pending' => 'warning',
                                            'rejected' => 'danger',
                                            default => 'secondary',
                                        };
                                    @endphp
                                    <span class="badge bg-{{ $badge }}">{{ ucfirst($d->status) }}</span>
                                </td>
                                <td>
                                    @if ($d->bukti_pembayaran)
                                        <!-- Thumbnail bukti pembayaran -->
                                        <img src="{{ asset('storage/' . $d->bukti_pembayaran) }}" width="60"
                                            class="img-thumbnail" style="cursor: pointer" data-bs-toggle="modal"
                                            data-bs-target="#buktiModal{{ $d->id }}">

                                        <!-- Modal untuk bukti pembayaran -->
                                        <div class="modal fade" id="buktiModal{{ $d->id }}" tabindex="-1"
                                            aria-labelledby="buktiModalLabel{{ $d->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="buktiModalLabel{{ $d->id }}">
                                                            Bukti
                                                            Pembayaran</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Tutup"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <img src="{{ asset('storage/' . $d->bukti_pembayaran) }}"
                                                            class="img-fluid" alt="Bukti Pembayaran">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>


                                <td>
                                    @if ($d->status === 'pending')
                                        <form action="{{ route('peserta.verifikasi', $d->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            <button class="btn btn-sm btn-success"
                                                onclick="return confirm('Verifikasi peserta ini?')">✔</button>
                                        </form>
                                        <form action="{{ route('peserta.tolak', $d->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            <button class="btn btn-sm btn-danger"
                                                onclick="return confirm('Tolak peserta ini?')">✘</button>
                                        </form>
                                    @elseif ($d->status === 'verified')
                                        <span class="text-success" style="font-size: 1.5rem;">✔</span>
                                    @elseif ($d->status === 'rejected')
                                        <span class="text-danger" style="font-size: 1.5rem;">✘</span>
                                    @else
                                        <em>-</em>
                                    @endif
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="14">Belum ada data peserta.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
