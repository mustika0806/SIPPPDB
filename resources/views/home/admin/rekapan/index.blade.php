@extends('layouts.app')

@section('content')

<style>
    .chart-box {
        height: 310px;
        position: relative;
    }

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
            left: 0;
            top: 0;
            width: 100%;
            background: #ffffff;
            padding: 20px;
        }

        .no-print {
            display: none !important;
        }

        #area-rekapan .card {
            box-shadow: none !important;
            border: 1px solid #dddddd !important;
        }

        /* Detail data pendaftar mulai di kertas baru */
        #detail-data-pendaftar {
            page-break-before: always;
            break-before: page;
            margin-top: 0 !important;
        }

        #detail-data-pendaftar .card-header {
            page-break-after: avoid;
        }

        #detail-data-pendaftar table {
            page-break-inside: auto;
        }

        #detail-data-pendaftar thead {
            display: table-header-group;
        }

        #detail-data-pendaftar tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }

        @page {
            size: A4;
            margin: 15mm;
        }
    }
</style>

<div class="container-fluid">

    <div class="text-right mb-3 no-print">
        <button onclick="window.print()" class="btn btn-outline-secondary">
            <i class="fas fa-print"></i>
            Cetak Rekapan
        </button>

        <a href="{{ route('admin.rekap.export-csv') }}" class="btn btn-success">
            <i class="fas fa-file-excel"></i>
            Export Excel
        </a>
    </div>

    <div id="area-rekapan">

        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0">
                    <i class="fas fa-chart-bar"></i>
                    Data Rekapan PPDB
                </h4>
            </div>

            <div class="card-body">
                <p class="mb-0 text-muted">
                    Halaman ini menampilkan ringkasan data pendaftaran, seleksi, pembayaran, dokumen, tes Al-Qur’an, dan wawancara.
                </p>
            </div>
        </div>

        {{-- KARTU ANGKA --}}
        <div class="row">

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow-sm h-100">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Pendaftar
                        </div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800">
                            {{ $totalPendaftar }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow-sm h-100">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Diterima
                        </div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800">
                            {{ $totalDiterima }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow-sm h-100">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Tidak Diterima
                        </div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800">
                            {{ $totalTidakDiterima }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow-sm h-100">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Belum Diproses
                        </div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800">
                            {{ $totalBelumDiproses }}
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow-sm h-100">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Pembayaran Masuk
                        </div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800">
                            {{ $totalPembayaran }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-secondary shadow-sm h-100">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                            Upload Dokumen
                        </div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800">
                            {{ $totalDokumen }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow-sm h-100">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Tes Al-Qur’an
                        </div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800">
                            {{ $totalTesQuran }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow-sm h-100">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Wawancara
                        </div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800">
                            {{ $totalWawancara }}
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- PIE CHART --}}
        <div class="row mb-4 no-print">

            <div class="col-lg-6 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-success text-white">
                        <strong>
                            <i class="fas fa-chart-pie"></i>
                            Grafik Status Seleksi
                        </strong>
                    </div>

                    <div class="card-body">
                        <div class="chart-box">
                            <canvas id="chartStatusSeleksi"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-primary text-white">
                        <strong>
                            <i class="fas fa-chart-pie"></i>
                            Grafik Pendaftar per Jurusan
                        </strong>
                    </div>

                    <div class="card-body">
                        <div class="chart-box">
                            <canvas id="chartJurusan"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- TABEL REKAP PER JURUSAN --}}
        <div class="row">

            <div class="col-lg-12 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-success text-white">
                        <strong>
                            <i class="fas fa-list"></i>
                            Rekap Pendaftar per Jurusan
                        </strong>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Jurusan</th>
                                    <th width="20%">Jumlah</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($rekapJurusan as $jurusan => $jumlah)
                                    <tr>
                                        <td>{{ $jurusan }}</td>
                                        <td>{{ $jumlah }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="text-center text-muted">
                                            Belum ada data jurusan.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        {{-- DETAIL DATA PENDAFTAR --}}
        <div id="detail-data-pendaftar" class="card shadow-sm border-0 mt-4">
            <div class="card-header bg-success text-white">
                <strong>
                    <i class="fas fa-users"></i>
                    Detail Data Pendaftar
                </strong>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama Siswa</th>
                                <th>Jurusan</th>
                                <th>Nilai Raport</th>
                                <th>Nilai Al-Qur'an</th>
                                <th>Nilai Wawancara</th>
                                <th>Total Nilai</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse(($daftarSiswa ?? collect()) as $index => $siswa)
                                <tr>
                                    <td>{{ $index + 1 }}</td>

                                    <td>{{ $siswa->user->name ?? '-' }}</td>

                                    <td>{{ $siswa->kelas->nama_jurusan ?? '-' }}</td>

                                    <td>{{ $siswa->nilai_rata ?? '-' }}</td>

                                    <td>{{ $siswa->nilai_quran ?? '-' }}</td>

                                    <td>{{ $siswa->nilai_wawancara ?? '-' }}</td>

                                    <td>
                                        {{ $siswa->total_nilai !== null ? number_format($siswa->total_nilai, 2) : '-' }}
                                    </td>

                                    <td>
                                        @if($siswa->status == 'Diterima')
                                            <span class="badge badge-success">
                                                Diterima
                                            </span>
                                        @elseif($siswa->status == 'Tidak Diterima')
                                            <span class="badge badge-danger">
                                                Tidak Diterima
                                            </span>
                                        @elseif($siswa->total_nilai === null)
                                            <span class="badge badge-warning">
                                                Belum Diproses
                                            </span>
                                        @else
                                            <span class="badge badge-secondary">
                                                {{ $siswa->status ?? '-' }}
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted">
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

</div>

{{-- CHART JS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const statusCanvas = document.getElementById('chartStatusSeleksi');

        if (statusCanvas) {
            new Chart(statusCanvas, {
                type: 'pie',
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
                            '#28a745',
                            '#dc3545',
                            '#ffc107'
                        ],
                        borderColor: '#ffffff',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        }

        const jurusanCanvas = document.getElementById('chartJurusan');

        if (jurusanCanvas) {
            new Chart(jurusanCanvas, {
                type: 'pie',
                data: {
                    labels: @json(($rekapJurusan ?? collect())->keys()->values()),
                    datasets: [{
                        data: @json(($rekapJurusan ?? collect())->values()->values()),
                        backgroundColor: [
                            '#007bff',
                            '#28a745',
                            '#ffc107',
                            '#dc3545',
                            '#17a2b8',
                            '#6f42c1',
                            '#fd7e14',
                            '#20c997'
                        ],
                        borderColor: '#ffffff',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        }
    });
</script>

@endsection