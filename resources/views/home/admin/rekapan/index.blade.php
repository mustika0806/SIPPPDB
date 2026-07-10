@extends('layouts.app')

@section('content')

<style>
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

        <div class="row">

            <div class="col-lg-6 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <strong>Rekap Status Pendaftaran</strong>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered mb-0">
                            <tr>
                                <th>Total Pendaftar</th>
                                <td>{{ $totalPendaftar }}</td>
                            </tr>

                            <tr>
                                <th>Menunggu Konfirmasi</th>
                                <td>{{ $totalMenunggu }}</td>
                            </tr>

                            <tr>
                                <th>Perbaiki Data</th>
                                <td>{{ $totalPerbaikiData }}</td>
                            </tr>

                            <tr>
                                <th>Perbaiki Dokumen</th>
                                <td>{{ $totalPerbaikiDokumen }}</td>
                            </tr>

                            <tr>
                                <th>Sudah Diproses Seleksi</th>
                                <td>{{ $totalSudahDiproses }}</td>
                            </tr>

                            <tr>
                                <th>Belum Diproses Seleksi</th>
                                <td>{{ $totalBelumDiproses }}</td>
                            </tr>

                            <tr>
                                <th>Diterima</th>
                                <td>{{ $totalDiterima }}</td>
                            </tr>

                            <tr>
                                <th>Tidak Diterima</th>
                                <td>{{ $totalTidakDiterima }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-success text-white">
                        <strong>Rekap Pendaftar per Jurusan</strong>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Jurusan</th>
                                    <th width="25%">Jumlah</th>
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
        <div class="card shadow-sm border-0 mt-4">
            <div class="card-header bg-dark text-white">
                <strong>Detail Data Pendaftar</strong>
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

@endsection