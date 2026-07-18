@extends('layouts.app')

@section('content')
    <style>
        :root {
            --rekap-primary: #4e73df;
            --rekap-success: #16b877;
            --rekap-danger: #ef5350;
            --rekap-warning: #f4a62a;
            --rekap-info: #11aeb8;
            --rekap-purple: #8067dc;
            --rekap-dark: #313752;
            --rekap-muted: #858796;
            --rekap-background: #f5f7fb;
        }

        .rekap-page {
            padding-bottom: 30px;
        }

        /* HEADER */
        .rekap-header {
            position: relative;
            overflow: hidden;
            padding: 24px 26px;
            margin-bottom: 24px;
            color: #fff;
            background: linear-gradient(135deg, #14795b, #08bd82);
            border-radius: 14px;
            box-shadow: 0 8px 20px rgba(22, 184, 119, .18);
        }

        .rekap-header::before {
            position: absolute;
            top: -50px;
            right: -30px;
            width: 190px;
            height: 190px;
            content: "";
            background: rgba(255, 255, 255, .08);
            border-radius: 50%;
        }

        .rekap-header::after {
            position: absolute;
            right: 135px;
            bottom: -75px;
            width: 150px;
            height: 150px;
            content: "";
            background: rgba(255, 255, 255, .06);
            border-radius: 50%;
        }

        .rekap-header-content {
            position: relative;
            z-index: 2;
        }

        .rekap-header h4 {
            margin-bottom: 7px;
            font-size: 28px;
            font-weight: 700;
        }

        .rekap-header p {
            max-width: 700px;
            margin: 0;
            color: rgba(255, 255, 255, .87);
            font-size: 16px;
            line-height: 1.6;
        }

        .rekap-header-icon {
            display: flex;
            width: 58px;
            height: 58px;
            align-items: center;
            justify-content: center;
            color: #fff;
            background: rgba(255, 255, 255, .16);
            border: 1px solid rgba(255, 255, 255, .25);
            border-radius: 14px;
            font-size: 25px;
        }

        /* TOMBOL */
        .rekap-actions .btn {
            padding: 11px 18px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            box-shadow: 0 3px 8px rgba(58, 59, 69, .08);
        }

        /* KARTU STATISTIK */
        .stat-card {
            position: relative;
            height: 100%;
            min-height: 125px;
            overflow: hidden;
            background: #fff;
            border: 1px solid #e7eaf3;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(58, 59, 69, .06);
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 9px 22px rgba(58, 59, 69, .11);
        }

        .stat-card-body {
            display: flex;
            padding: 19px;
            align-items: center;
            justify-content: space-between;
        }

        .stat-label {
            margin-bottom: 5px;
            color: var(--rekap-muted);
            font-size: 13px;
            font-weight: 700;
            letter-spacing: .5px;
            text-transform: uppercase;
        }

        .stat-number {
            margin-bottom: 3px;
            color: var(--rekap-dark);
            font-size: 34px;
            font-weight: 800;
            line-height: 1;
        }

        .stat-description {
            color: #a0a4b4;
            font-size: 13px;
        }

        .stat-icon {
            display: flex;
            width: 48px;
            height: 48px;
            flex-shrink: 0;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            font-size: 20px;
        }

        .stat-primary {
            border-bottom: 3px solid var(--rekap-primary);
        }

        .stat-primary .stat-icon {
            color: var(--rekap-primary);
            background: rgba(78, 115, 223, .12);
        }

        .stat-success {
            border-bottom: 3px solid var(--rekap-success);
        }

        .stat-success .stat-icon {
            color: var(--rekap-success);
            background: rgba(22, 184, 119, .12);
        }

        .stat-danger {
            border-bottom: 3px solid var(--rekap-danger);
        }

        .stat-danger .stat-icon {
            color: var(--rekap-danger);
            background: rgba(239, 83, 80, .12);
        }

        .stat-warning {
            border-bottom: 3px solid var(--rekap-warning);
        }

        .stat-warning .stat-icon {
            color: var(--rekap-warning);
            background: rgba(244, 166, 42, .14);
        }

        .stat-info {
            border-bottom: 3px solid var(--rekap-info);
        }

        .stat-info .stat-icon {
            color: var(--rekap-info);
            background: rgba(17, 174, 184, .12);
        }

        .stat-purple {
            border-bottom: 3px solid var(--rekap-purple);
        }

        .stat-purple .stat-icon {
            color: var(--rekap-purple);
            background: rgba(128, 103, 220, .12);
        }

        /* CARD UMUM */
        .rekap-card {
            overflow: hidden;
            background: #fff;
            border: 1px solid #e7eaf3;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(58, 59, 69, .06);
        }

        .rekap-card-header {
            display: flex;
            padding: 20px 22px;
            align-items: center;
            justify-content: space-between;
            background: #fff;
            border-bottom: 1px solid #edf0f6;
        }

        .rekap-card-title {
            margin: 0;
            color: var(--rekap-dark);
            font-size: 18px;
            font-weight: 700;
        }

        .rekap-card-title i {
            margin-right: 7px;
            color: var(--rekap-primary);
        }

        .rekap-card-subtitle {
            margin-top: 3px;
            color: var(--rekap-muted);
            font-size: 13px;
        }

        .chart-box {
            position: relative;
            height: 300px;
            padding: 10px;
        }

        /* TABEL */
        .rekap-table {
            min-width: 1050px;
            margin-bottom: 0;
            color: #4f5263;
            font-size: 14px;
        }

        .rekap-table thead th {
            padding: 15px 11px;
            color: #686c7d;
            background: #f7f8fb;
            border-color: #e6e9f0;
            font-size: 13px;
            letter-spacing: .3px;
            text-align: center;
            text-transform: uppercase;
            vertical-align: middle;
        }

        .rekap-table td {
            padding: 14px 11px;
            border-color: #e6e9f0;
            vertical-align: middle;
        }

        .jurusan-row td {
            padding: 13px !important;
            color: #fff;
            background: linear-gradient(135deg, #168663, #14b980);
            border: 0 !important;
        }

        .jurusan-name {
            font-size: 16px;
            font-weight: 700;
        }

        .jurusan-meta {
            color: rgba(255, 255, 255, .85);
            font-size: 13px;
        }

        .rank-badge {
            display: inline-flex;
            width: 34px;
            height: 34px;
            align-items: center;
            justify-content: center;
            color: #4e73df;
            background: rgba(78, 115, 223, .12);
            border-radius: 50%;
            font-size: 14px;
            font-weight: 700;
        }

        .rank-first {
            color: #8b6500;
            background: #ffe8a3;
        }

        .score-value {
            color: var(--rekap-dark);
            font-size: 15px;
            font-weight: 700;
        }

        .rekap-table .badge {
            padding: 7px 10px !important;
            font-size: 13px;
        }

        .empty-state {
            padding: 35px !important;
            color: var(--rekap-muted);
            text-align: center;
        }

        .empty-state i {
            display: block;
            margin-bottom: 8px;
            font-size: 30px;
        }

        @media (max-width: 767.98px) {
            .rekap-header {
                padding: 20px;
            }

            .rekap-header-icon {
                display: none;
            }

            .rekap-actions {
                margin-top: 12px;
                text-align: left !important;
            }

            .rekap-actions .btn {
                margin-bottom: 5px;
            }
        }

        /* CETAK */
        @media print {
            body * {
                visibility: hidden !important;
            }

            #area-rekapan,
            #area-rekapan * {
                visibility: visible !important;
            }

            #area-rekapan {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                padding: 10px;
                background: #fff;
            }

            .no-print {
                display: none !important;
            }

            .rekap-header {
                color: #222 !important;
                background: #fff !important;
                border: 2px solid #168663;
                box-shadow: none !important;
            }

            .rekap-header p {
                color: #555 !important;
            }

            .stat-card,
            .rekap-card {
                box-shadow: none !important;
            }

            #detail-data-pendaftar {
                margin-top: 0 !important;
                page-break-before: always;
                break-before: page;
            }

            #detail-data-pendaftar thead {
                display: table-header-group;
            }

            #detail-data-pendaftar tr {
                page-break-inside: avoid;
            }

            @page {
                size: A4;
                margin: 15mm;
            }
        }
    </style>

    @php
        $daftarSiswaCollection = collect($daftarSiswa ?? []);

        $rekapDetailJurusan = $daftarSiswaCollection
            ->groupBy(function ($siswa) {
                return optional($siswa->kelas)->nama_jurusan
                    ?? 'Belum Memilih Jurusan';
            })
            ->map(function ($items) {
                $sorted = $items
                    ->sortByDesc(function ($siswa) {
                        return $siswa->total_nilai ?? -1;
                    })
                    ->values();

                $siswaNilaiTertinggi = $sorted->first(function ($siswa) {
                    return $siswa->total_nilai !== null;
                });

                return [
                    'jumlah' => $items->count(),

                    'nilai_tertinggi' => $siswaNilaiTertinggi
                        ? number_format($siswaNilaiTertinggi->total_nilai, 2)
                        : '-',

                    'nama_nilai_tertinggi' => $siswaNilaiTertinggi
                        ? optional($siswaNilaiTertinggi->user)->name
                        : '-',

                    'data_siswa' => $sorted,
                ];
            });
    @endphp

    <div class="container-fluid rekap-page">

        {{-- TOMBOL AKSI --}}
        <div class="text-right mb-3 no-print rekap-actions">
            <button type="button"
                onclick="window.print()"
                class="btn btn-outline-secondary">
                <i class="fas fa-print mr-1"></i>
                Cetak Rekapan
            </button>

            <a href="{{ route('admin.rekap.export-csv') }}"
                class="btn btn-success">
                <i class="fas fa-file-excel mr-1"></i>
                Export Excel
            </a>
        </div>

        <div id="area-rekapan">

            {{-- HEADER --}}
            <div class="rekap-header">
                <div class="rekap-header-content">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4>
                                Rekapitulasi PPDB
                            </h4>

                            <p>
                                Ringkasan data pendaftaran, hasil seleksi,
                                pembayaran, dokumen, tes Al-Qur'an, dan wawancara.
                            </p>
                        </div>

                        <div class="col-auto">
                            <div class="rekap-header-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- KARTU STATISTIK --}}
            <div class="row">

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="stat-card stat-primary">
                        <div class="stat-card-body">
                            <div>
                                <div class="stat-label">
                                    Total Pendaftar
                                </div>

                                <div class="stat-number">
                                    {{ $totalPendaftar }}
                                </div>

                                <div class="stat-description">
                                    Seluruh calon siswa
                                </div>
                            </div>

                            <div class="stat-icon">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="stat-card stat-success">
                        <div class="stat-card-body">
                            <div>
                                <div class="stat-label">Diterima</div>

                                <div class="stat-number">
                                    {{ $totalDiterima }}
                                </div>

                                <div class="stat-description">
                                    Siswa dinyatakan lulus
                                </div>
                            </div>

                            <div class="stat-icon">
                                <i class="fas fa-user-check"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="stat-card stat-danger">
                        <div class="stat-card-body">
                            <div>
                                <div class="stat-label">
                                    Tidak Diterima
                                </div>

                                <div class="stat-number">
                                    {{ $totalTidakDiterima }}
                                </div>

                                <div class="stat-description">
                                    Tidak lolos seleksi
                                </div>
                            </div>

                            <div class="stat-icon">
                                <i class="fas fa-user-times"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="stat-card stat-warning">
                        <div class="stat-card-body">
                            <div>
                                <div class="stat-label">
                                    Belum Diproses
                                </div>

                                <div class="stat-number">
                                    {{ $totalBelumDiproses }}
                                </div>

                                <div class="stat-description">
                                    Menunggu proses seleksi
                                </div>
                            </div>

                            <div class="stat-icon">
                                <i class="fas fa-user-clock"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="stat-card stat-info">
                        <div class="stat-card-body">
                            <div>
                                <div class="stat-label">
                                    Pembayaran Masuk
                                </div>

                                <div class="stat-number">
                                    {{ $totalPembayaran }}
                                </div>

                                <div class="stat-description">
                                    Pembayaran diterima
                                </div>
                            </div>

                            <div class="stat-icon">
                                <i class="fas fa-wallet"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="stat-card stat-purple">
                        <div class="stat-card-body">
                            <div>
                                <div class="stat-label">
                                    Upload Dokumen
                                </div>

                                <div class="stat-number">
                                    {{ $totalDokumen }}
                                </div>

                                <div class="stat-description">
                                    Dokumen telah diunggah
                                </div>
                            </div>

                            <div class="stat-icon">
                                <i class="fas fa-folder-open"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="stat-card stat-success">
                        <div class="stat-card-body">
                            <div>
                                <div class="stat-label">
                                    Tes Al-Qur'an
                                </div>

                                <div class="stat-number">
                                    {{ $totalTesQuran }}
                                </div>

                                <div class="stat-description">
                                    Tes sudah dilaksanakan
                                </div>
                            </div>

                            <div class="stat-icon">
                                <i class="fas fa-book-open"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="stat-card stat-primary">
                        <div class="stat-card-body">
                            <div>
                                <div class="stat-label">
                                    Wawancara
                                </div>

                                <div class="stat-number">
                                    {{ $totalWawancara }}
                                </div>

                                <div class="stat-description">
                                    Wawancara diselesaikan
                                </div>
                            </div>

                            <div class="stat-icon">
                                <i class="fas fa-comments"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- GRAFIK --}}
            <div class="row mb-4 no-print">
                <div class="col-lg-6 mb-4">
                    <div class="rekap-card h-100">
                        <div class="rekap-card-header">
                            <div>
                                <h6 class="rekap-card-title">
                                    <i class="fas fa-chart-pie"></i>
                                    Status Seleksi
                                </h6>

                                <div class="rekap-card-subtitle">
                                    Perbandingan hasil seleksi pendaftar
                                </div>
                            </div>
                        </div>

                        <div class="chart-box">
                            <canvas id="chartStatusSeleksi"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="rekap-card h-100">
                        <div class="rekap-card-header">
                            <div>
                                <h6 class="rekap-card-title">
                                    <i class="fas fa-chart-pie"></i>
                                    Pendaftar per Jurusan
                                </h6>

                                <div class="rekap-card-subtitle">
                                    Persebaran pilihan jurusan pendaftar
                                </div>
                            </div>
                        </div>

                        <div class="chart-box">
                            <canvas id="chartJurusan"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            {{-- DETAIL PENDAFTAR --}}
            <div id="detail-data-pendaftar"
                class="rekap-card mt-2">

                <div class="rekap-card-header">
                    <div>
                        <h6 class="rekap-card-title">
                            <i class="fas fa-list-alt"></i>
                            Detail Pendaftar per Jurusan
                        </h6>

                        <div class="rekap-card-subtitle">
                            Data diurutkan berdasarkan total nilai tertinggi
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover rekap-table">
                        <thead>
                            <tr>
                                <th width="5%">No.</th>
                                <th>Nama Siswa</th>
                                <th>Peringkat</th>
                                <th>Nilai Rapor</th>
                                <th>Nilai Al-Qur'an</th>
                                <th>Nilai Wawancara</th>
                                <th>Total Nilai</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($rekapDetailJurusan as $jurusan => $data)
                                <tr class="jurusan-row">
                                    <td colspan="8">
                                        <div class="d-flex flex-wrap align-items-center justify-content-between">
                                            <div>
                                                <div class="jurusan-name">
                                                    <i class="fas fa-graduation-cap mr-1"></i>
                                                    {{ $jurusan }}
                                                </div>

                                                <div class="jurusan-meta">
                                                    {{ $data['jumlah'] }} pendaftar
                                                </div>
                                            </div>

                                            <div class="text-right">
                                                <div class="jurusan-name">
                                                    Nilai tertinggi:
                                                    {{ $data['nilai_tertinggi'] }}
                                                </div>

                                                <div class="jurusan-meta">
                                                    {{ $data['nama_nilai_tertinggi'] }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                @foreach ($data['data_siswa'] as $index => $siswa)
                                    @php
                                        $peringkat = $siswa->total_nilai !== null
                                            ? $index + 1
                                            : null;
                                    @endphp

                                    <tr>
                                        <td class="text-center">
                                            {{ $index + 1 }}
                                        </td>

                                        <td>
                                            <strong>
                                                {{ optional($siswa->user)->name ?? '-' }}
                                            </strong>
                                        </td>

                                        <td class="text-center">
                                            @if ($peringkat)
                                                <span class="rank-badge {{ $peringkat == 1 ? 'rank-first' : '' }}">
                                                    {{ $peringkat }}
                                                </span>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            {{ $siswa->nilai_rata ?? '-' }}
                                        </td>

                                        <td class="text-center">
                                            {{ $siswa->nilai_quran ?? '-' }}
                                        </td>

                                        <td class="text-center">
                                            {{ $siswa->nilai_wawancara ?? '-' }}
                                        </td>

                                        <td class="text-center">
                                            @if ($siswa->total_nilai !== null)
                                                <span class="score-value">
                                                    {{ number_format($siswa->total_nilai, 2) }}
                                                </span>
                                            @else
                                                <span class="text-muted">
                                                    Belum diproses
                                                </span>
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            @if ($siswa->status == 'Diterima')
                                                <span class="badge badge-success px-2 py-1">
                                                    Diterima
                                                </span>
                                            @elseif ($siswa->status == 'Tidak Diterima')
                                                <span class="badge badge-danger px-2 py-1">
                                                    Tidak Diterima
                                                </span>
                                            @elseif ($siswa->total_nilai === null)
                                                <span class="badge badge-warning px-2 py-1">
                                                    Belum Diproses
                                                </span>
                                            @else
                                                <span class="badge badge-secondary px-2 py-1">
                                                    {{ $siswa->status ?? '-' }}
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @empty
                                <tr>
                                    <td colspan="8" class="empty-state">
                                        <i class="fas fa-folder-open"></i>
                                        Belum ada data pendaftar.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- CHART.JS --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const statusCanvas =
                document.getElementById('chartStatusSeleksi');

            if (statusCanvas) {
                new Chart(statusCanvas, {
                    type: 'doughnut',

                    data: {
                        labels: [
                            'Diterima',
                            'Tidak Diterima',
                            'Belum Diproses'
                        ],

                        datasets: [{
                            data: [
                                {{ $totalDiterima }},
                                {{ $totalTidakDiterima }},
                                {{ $totalBelumDiproses }}
                            ],

                            backgroundColor: [
                                '#16b877',
                                '#ef5350',
                                '#f4a62a'
                            ],

                            borderColor: '#ffffff',
                            borderWidth: 4,
                            hoverOffset: 5
                        }]
                    },

                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        cutout: '67%',

                        plugins: {
                            legend: {
                                position: 'bottom',

                                labels: {
                                    usePointStyle: true,
                                    padding: 18,
                                    font: {
                                        size: 14
                                    }
                                }
                            }
                        }
                    }
                });
            }

            const jurusanCanvas =
                document.getElementById('chartJurusan');

            if (jurusanCanvas) {
                new Chart(jurusanCanvas, {
                    type: 'doughnut',

                    data: {
                        labels: @json(
                            ($rekapJurusan ?? collect())
                                ->keys()
                                ->values()
                        ),

                        datasets: [{
                            data: @json(
                                ($rekapJurusan ?? collect())
                                    ->values()
                                    ->values()
                            ),

                            backgroundColor: [
                                '#4e73df',
                                '#16b877',
                                '#f4a62a',
                                '#ef5350',
                                '#11aeb8',
                                '#8067dc',
                                '#fd7e14',
                                '#20c997'
                            ],

                            borderColor: '#ffffff',
                            borderWidth: 4,
                            hoverOffset: 5
                        }]
                    },

                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        cutout: '60%',

                        plugins: {
                            legend: {
                                position: 'bottom',

                                labels: {
                                    usePointStyle: true,
                                    padding: 14,
                                    font: {
                                        size: 14
                                    }
                                }
                            }
                        }
                    }
                });
            }
        });
    </script>
@endsection