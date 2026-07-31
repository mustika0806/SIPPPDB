@extends('layouts.app')

@section('content')
    <style>
        .hasil-page {
            padding-bottom: 35px;
            font-size: 15px;
        }

        .hasil-card {
            overflow: hidden;
            background: #fff;
            border: 1px solid #e3e6f0;
            border-radius: 13px;
            box-shadow: 0 7px 20px rgba(58, 59, 69, .08);
        }

        .hasil-header {
            padding: 22px 25px;
            color: #fff;
            background: linear-gradient(135deg, #14795b, #0bbd82);
        }

        .hasil-header h4 {
            margin: 0 0 6px;
            font-size: 23px;
            font-weight: 700;
        }

        .hasil-header p {
            margin: 0;
            color: rgba(255, 255, 255, .85);
            font-size: 14px;
        }

        .hasil-body {
            padding: 24px;
        }

        .hasil-info {
            padding: 17px 20px;
            margin-bottom: 24px;
            color: #23677a;
            background: #eefaff;
            border: 1px solid #b9e2f4;
            border-left: 5px solid #36b9cc;
            border-radius: 8px;
            font-size: 14px;
            line-height: 1.7;
        }

        .hasil-info-title {
            margin-bottom: 8px;
            font-size: 16px;
            font-weight: 700;
        }

        .hasil-info ul {
            padding-left: 22px;
            margin-bottom: 0;
        }

        .hasil-table {
            min-width: 1100px;
            margin-bottom: 0;
            font-size: 14px;
        }

        .hasil-table th {
            padding: 14px 10px;
            color: #5d6274;
            background: #f4f6fa;
            border-color: #dfe3ec;
            font-size: 13px;
            text-align: center;
            vertical-align: middle;
            white-space: nowrap;
        }

        .hasil-table td {
            padding: 13px 10px;
            border-color: #e0e4ed;
            vertical-align: middle;
        }

        .jurusan-row td {
            padding: 13px !important;
            color: #fff;
            background: linear-gradient(135deg, #178160, #11ae79);
            border-color: #178160 !important;
            font-size: 15px;
            font-weight: 700;
            text-align: center;
        }

        .student-name {
            color: #333748;
            font-weight: 700;
        }

        .rank {
            display: inline-flex;
            width: 32px;
            height: 32px;
            align-items: center;
            justify-content: center;
            color: #fff;
            background: #4e73df;
            border-radius: 50%;
            font-weight: 700;
        }

        .rank-1 {
            color: #785900;
            background: #ffd95b;
        }

        .total-score {
            display: inline-block;
            min-width: 65px;
            padding: 7px 9px;
            color: #14795b;
            background: #e4f8f0;
            border-radius: 6px;
            font-weight: 800;
        }

        .status-form {
            display: flex;
            min-width: 250px;
            align-items: center;
            justify-content: center;
        }

        .status-form select {
            height: 38px;
            margin-right: 7px;
            font-size: 13px;
        }

        .status-form button {
            width: 39px;
            height: 38px;
            flex-shrink: 0;
        }

        .incomplete {
            color: #e74a3b;
            font-size: 13px;
            font-weight: 600;
        }

        .empty-state {
            padding: 35px !important;
            color: #858796;
            text-align: center;
        }
    </style>

    <div class="container-fluid hasil-page">
        <div class="hasil-card">

            <div class="hasil-header">
                <h4>
                    <i class="fas fa-chart-line mr-2"></i>
                    Data Hasil Akhir
                </h4>

                <p>
                    Total nilai dan peringkat dihitung otomatis, sedangkan
                    keputusan hasil seleksi ditentukan secara manual oleh admin.
                </p>
            </div>

            <div class="hasil-body">

                @if (session('success'))
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle mr-1"></i>
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle mr-1"></i>
                        {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="hasil-info">
                    <div class="hasil-info-title">
                        <i class="fas fa-info-circle mr-1"></i>
                        Ketentuan Penilaian
                    </div>

                    <ul>
                        <li>Nilai raport atau nilai rata-rata: 40%.</li>
                        <li>Nilai tes Al-Qur'an: 30%.</li>
                        <li>Nilai wawancara: 30%.</li>
                        <li>Total nilai dihitung otomatis oleh sistem.</li>
                        <li>Siswa diurutkan berdasarkan nilai per jurusan.</li>
                        <li>
                            Status diterima atau tidak diterima ditentukan
                            manual oleh admin.
                        </li>
                    </ul>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover hasil-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Siswa</th>
                                <th>Peringkat</th>
                                <th>Nilai raport</th>
                                <th>Nilai Al-Qur'an</th>
                                <th>Nilai Wawancara</th>
                                <th>Total Nilai</th>
                                <th>Status Manual</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse (
                                $siswas->groupBy(function ($siswa) {
                                    return optional($siswa->kelas)->nama_jurusan
                                        ?? 'Belum Memilih Jurusan';
                                }) as $jurusan => $dataSiswa
                            )
                                <tr class="jurusan-row">
                                    <td colspan="8">
                                        <i class="fas fa-graduation-cap mr-1"></i>
                                        Jurusan: {{ $jurusan }}
                                    </td>
                                </tr>

                                @foreach (
                                    $dataSiswa
                                        ->sortByDesc(function ($siswa) {
                                            return $siswa->total_nilai ?? -1;
                                        })
                                        ->values()
                                    as $index => $siswa
                                )
                                    @php
                                        $nilaiLengkap =
                                            $siswa->nilai_rata !== null &&
                                            $siswa->nilai_quran !== null &&
                                            $siswa->nilai_wawancara !== null;

                                        $peringkat =
                                            $siswa->total_nilai !== null
                                                ? $index + 1
                                                : null;
                                    @endphp

                                    <tr>
                                        <td class="text-center">
                                            {{ $index + 1 }}
                                        </td>

                                        <td>
                                            <span class="student-name">
                                                {{ optional($siswa->user)->name ?? '-' }}
                                            </span>
                                        </td>

                                        <td class="text-center">
                                            @if ($peringkat)
                                                <span class="rank {{ $peringkat == 1 ? 'rank-1' : '' }}">
                                                    {{ $peringkat }}
                                                </span>
                                            @else
                                                -
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            @if ($siswa->nilai_rata !== null)
                                                {{ $siswa->nilai_rata }}
                                            @else
                                                <span class="incomplete">
                                                    Belum ada
                                                </span>
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            @if ($siswa->nilai_quran !== null)
                                                {{ $siswa->nilai_quran }}
                                            @else
                                                <span class="incomplete">
                                                    Belum ada
                                                </span>
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            @if ($siswa->nilai_wawancara !== null)
                                                {{ $siswa->nilai_wawancara }}
                                            @else
                                                <span class="incomplete">
                                                    Belum ada
                                                </span>
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            @if ($siswa->total_nilai !== null)
                                                <span class="total-score">
                                                    {{ number_format(
                                                        $siswa->total_nilai,
                                                        2
                                                    ) }}
                                                </span>
                                            @else
                                                <span class="text-muted">
                                                    Belum diproses
                                                </span>
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            <form
                                                action="{{ route('admin.hasil_akhir.update-status', $siswa->id) }}"
                                                method="POST"
                                                class="status-form"
                                                onsubmit="return confirm('Simpan perubahan status siswa ini?')">
                                                @csrf
                                                @method('PUT')

                                                <select name="status"
                                                    class="form-control"
                                                    {{ !$nilaiLengkap ? 'disabled' : '' }}
                                                    required>
                                                    <!-- <option value="Menunggu Konfirmasi"
                                                        {{ $siswa->status == 'Menunggu Konfirmasi' ? 'selected' : '' }}>
                                                        Belum Diproses
                                                    </option> -->

                                                    <option value="Diterima"
                                                        {{ $siswa->status == 'Diterima' ? 'selected' : '' }}>
                                                        Diterima
                                                    </option>

                                                    <option value="Tidak Diterima"
                                                        {{ $siswa->status == 'Tidak Diterima' ? 'selected' : '' }}>
                                                        Tidak Diterima
                                                    </option>
                                                </select>

                                                <button type="submit"
                                                    class="btn btn-primary"
                                                    title="Simpan Status"
                                                    {{ !$nilaiLengkap ? 'disabled' : '' }}>
                                                    <i class="fas fa-save"></i>
                                                </button>
                                            </form>

                                            @if (!$nilaiLengkap)
                                                <small class="incomplete d-block mt-1">
                                                    Lengkapi nilai terlebih dahulu
                                                </small>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @empty
                                <tr>
                                    <td colspan="8" class="empty-state">
                                        Belum ada data siswa.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection