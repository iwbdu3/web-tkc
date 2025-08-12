@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Form Penilaian - {{ $jadwal->nama }}</h5>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
        </div>

        <div class="card-body">
            <form action="{{ route('penilaian.store') }}" method="POST">
                @csrf

                <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center">
                        <thead class="table-light">
                            <tr>
                                <th>Nomor Peserta</th>
                                <th>Nama Peserta</th>
                                <th>Dojang</th>
                                <th>Poomsae 1</th>
                                <th>Poomsae 2</th>
                                <th>Gibon Dongjak</th>
                                <th>Gibon Balchagi</th>
                                <th>Kyourugi</th>
                                <th>Kyupa</th>
                                <th>Tes Fisik</th>
                                <th>Tes Tulis</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesertaList as $peserta)
                                <tr>
                                    <td>
                                        {{ $peserta->nomor_peserta }}
                                    </td>
                                    <td>
                                        {{ $peserta->user->name ?? '-' }}<br>
                                    </td>
                                    <td>{{ $peserta->dojang }}</td>

                                    <td><input type="number" name="penilaian[{{ $peserta->id }}][poomsae_1]"
                                            class="form-control" required></td>
                                    <td><input type="number" name="penilaian[{{ $peserta->id }}][poomsae_2]"
                                            class="form-control" required></td>
                                    <td><input type="number" name="penilaian[{{ $peserta->id }}][gibon_dongjak]"
                                            class="form-control" required></td>
                                    <td><input type="number" name="penilaian[{{ $peserta->id }}][gibon_balchagi]"
                                            class="form-control" required></td>
                                    <td><input type="number" name="penilaian[{{ $peserta->id }}][kyourugi]"
                                            class="form-control"></td>
                                    <td><input type="number" name="penilaian[{{ $peserta->id }}][kyupa]"
                                            class="form-control"></td>
                                    <td><input type="number" name="penilaian[{{ $peserta->id }}][tes_fisik]"
                                            class="form-control"></td>
                                    <td><input type="number" name="penilaian[{{ $peserta->id }}][tes_tulis]"
                                            class="form-control"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-3">
                    <button class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const table = document.querySelector("table");
        const inputs = Array.from(table.querySelectorAll("input"));

        // Buat struktur kolom x baris (matrix)
        const columns = {};
        inputs.forEach((input) => {
            const nameMatch = input.name.match(/\[(\d+)]\[(.*?)\]/); // ambil pesertaId dan nama kolom
            if (!nameMatch) return;

            const pesertaId = nameMatch[1];
            const fieldName = nameMatch[2];

            if (!columns[fieldName]) columns[fieldName] = [];
            columns[fieldName].push(input);
        });

        const columnOrder = Object.keys(columns);

        inputs.forEach((input) => {
            input.addEventListener("keydown", function (e) {
                if (e.key === "Enter") {
                    e.preventDefault();

                    const nameMatch = input.name.match(/\[(\d+)]\[(.*?)\]/);
                    if (!nameMatch) return;

                    const pesertaId = nameMatch[1];
                    const fieldName = nameMatch[2];

                    const colInputs = columns[fieldName];
                    const indexInCol = colInputs.indexOf(input);

                    // Jika masih ada baris di bawah
                    if (indexInCol + 1 < colInputs.length) {
                        colInputs[indexInCol + 1].focus();
                    } else {
                        // Kalau mentok bawah, pindah ke kolom berikutnya di baris pertama
                        const currentColIndex = columnOrder.indexOf(fieldName);
                        const nextColName = columnOrder[currentColIndex + 1];
                        if (nextColName && columns[nextColName][0]) {
                            columns[nextColName][0].focus();
                        }
                    }
                }
            });
        });
    });
</script>

@endsection
