@extends('layouts.app')

@section('content')

<style>
    .logo-pengumuman {
        width: 75px;
        height: 75px;
        object-fit: contain;
        margin-bottom: 10px;
    }

    @media print {
        body * {
            visibility: hidden !important;
        }

        #area-cetak-pengumuman,
        #area-cetak-pengumuman * {
            visibility: visible !important;
        }

        #area-cetak-pengumuman {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            padding: 20px;
            background: #ffffff;
        }

        .no-print {
            display: none !important;
        }

        #area-cetak-pengumuman .card {
            box-shadow: none !important;
            border: 1px solid #dddddd !important;
        }

        #area-cetak-pengumuman .card-header {
            color: #000000 !important;
            background: #eeeeee !important;
            border-bottom: 1px solid #dddddd !important;
        }

        #area-cetak-pengumuman .badge {
            color: #000000 !important;
            background: #ffffff !important;
            border: 1px solid #000000 !important;
            padding: 6px 10px;
        }

        #area-cetak-pengumuman .alert-success,
        #area-cetak-pengumuman .alert-danger,
        #area-cetak-pengumuman .alert-secondary {
            color: #000000 !important;
            background: #ffffff !important;
            border: 1px solid #dddddd !important;
        }

        @page {
            size: A4;
            margin: 15mm;
        }
    }
</style>

<div class="container-fluid">

    <div class="card shadow-sm border-0">

        <div class="card-header bg-success text-white no-print">
            <h4 class="mb-0">
                <i class="fas fa-bullhorn"></i>
                Pengumuman Hasil Seleksi
            </h4>
        </div>

        <div class="card-body">

            @if(!$siswa)

                <div class="alert alert-warning">
                    Data siswa tidak ditemukan.
                </div>

            @elseif($siswa->total_nilai === null)

                <div class="alert alert-warning">
                    Pengumuman hasil seleksi belum tersedia.
                    Silakan menunggu proses penilaian dari pihak sekolah.
                </div>

            @elseif($siswa->status == 'Diterima')

                {{-- AREA INI SAJA YANG DICETAK --}}
                <div id="area-cetak-pengumuman">

                    <div class="text-center mb-4">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRBqz_N0J0bUGFQnLZihDE8REdidm_DDnaJXQ&s"
                             alt="Logo Sekolah"
                             class="logo-pengumuman">

                        <h3 class="font-weight-bold mb-1">
                            PENGUMUMAN HASIL SELEKSI
                        </h3>

                        <h5 class="mb-1">
                            SMKS Ma'arif NU Kota Batam
                        </h5>

                        <p class="mb-0">
                            Penerimaan Peserta Didik Baru
                        </p>
                    </div>

                   <div class="alert alert-success">
    <h4 class="font-weight-bold mb-2">
        Selamat, Anda Dinyatakan <strong>DITERIMA</strong>
    </h4>

    <hr>

    <p class="mb-0">
        Berdasarkan hasil seleksi penerimaan peserta didik baru,
        Anda dinyatakan diterima sebagai calon siswa baru
        SMKS Ma'arif NU Kota Batam.
    </p>
</div>

                    <div class="card mt-3">
                        <div class="card-header bg-primary text-white">
                            Informasi Hasil Seleksi
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">Nama Siswa</th>
                                    <td>{{ $siswa->user->name ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <th>Jurusan</th>
                                    <td>{{ $siswa->kelas->nama_jurusan ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <th>Nilai Raport</th>
                                    <td>{{ $siswa->nilai_rata ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <th>Nilai Tes Al-Qur'an</th>
                                    <td>{{ $siswa->nilai_quran ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <th>Nilai Wawancara</th>
                                    <td>{{ $siswa->nilai_wawancara ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <th>Total Nilai</th>
                                    <td>
                                        <strong>
                                            {{ $siswa->total_nilai !== null ? number_format($siswa->total_nilai, 2) : '-' }}
                                        </strong>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Status Seleksi</th>
                                    <td>
                                        <span class="badge badge-success">
                                            Diterima
                                        </span>
                                    </td>
                                </tr>
                            </table>

                            @if($siswa->catatan_admin)
                                <div class="alert alert-secondary mt-3">
                                    <strong>Catatan Admin:</strong>
                                    <br>
                                    {{ $siswa->catatan_admin }}
                                </div>
                            @endif
                        </div>
                    </div>

                </div>

                {{-- BAGIAN INI TIDAK IKUT DICETAK --}}
                <div class="card mt-4 border-0 shadow-sm no-print">

                    <div class="card-header text-white" style="background: linear-gradient(135deg, #17a2b8, #0f6674);">
                        <h5 class="mb-0">
                            <i class="fas fa-clipboard-check"></i>
                            Informasi Daftar Ulang
                        </h5>
                    </div>

                    <div class="card-body">

                        <div class="alert alert-info mb-4">
                            <strong>Informasi:</strong>
                            Daftar ulang dilakukan secara langsung di sekolah.
                            Jadwal daftar ulang dan persyaratan administrasi dapat dilihat pada halaman utama PPDB.
                        </div>

                        <h6 class="font-weight-bold mb-3">
                            Alur Daftar Ulang
                        </h6>

                        <div class="row">

                            <div class="col-md-4 mb-3">
                                <div class="card h-100 text-center border-0 shadow-sm">
                                    <div class="card-body">
                                        <div class="rounded-circle bg-success text-white mx-auto mb-3 d-flex align-items-center justify-content-center"
                                             style="width: 45px; height: 45px;">
                                            1
                                        </div>

                                        <h6 class="font-weight-bold">
                                            Cek Informasi
                                        </h6>

                                        <p class="text-muted small mb-0">
                                            Lihat jadwal dan syarat daftar ulang pada halaman utama PPDB.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="card h-100 text-center border-0 shadow-sm">
                                    <div class="card-body">
                                        <div class="rounded-circle bg-success text-white mx-auto mb-3 d-flex align-items-center justify-content-center"
                                             style="width: 45px; height: 45px;">
                                            2
                                        </div>

                                        <h6 class="font-weight-bold">
                                            Datang ke Sekolah
                                        </h6>

                                        <p class="text-muted small mb-0">
                                            Calon siswa datang langsung ke sekolah bersama orang tua/wali sesuai jadwal yang telah ditentukan.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="card h-100 text-center border-0 shadow-sm">
                                    <div class="card-body">
                                        <div class="rounded-circle bg-success text-white mx-auto mb-3 d-flex align-items-center justify-content-center"
                                             style="width: 45px; height: 45px;">
                                            3
                                        </div>

                                        <h6 class="font-weight-bold">
                                            Pembayaran & Konfirmasi 
                                        </h6>

                                        <p class="text-muted small mb-0">
                                            Melakukan pembayaran biaya daftar ulang seperti seragam, uang pembangunan, SPP awal, dan biaya lainnya sesuai ketentuan sekolah.
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        
                        <div class="text-right mt-3">
                            <a href="{{ route('home') }}#jumbotron-card" class="btn btn-info">
                                <i class="fas fa-calendar-alt"></i>
                                Lihat Jadwal
                            </a>

                            <a href="{{ route('home') }}#syarat-administrasi" class="btn btn-success">
                                <i class="fas fa-file-alt"></i>
                                Lihat Syarat Administrasi
                            </a>

                            <button onclick="window.print()" class="btn btn-outline-secondary">
                                <i class="fas fa-print"></i>
                                Cetak Pengumuman
                            </button>
                        </div>

                    </div>
                </div>

            @elseif($siswa->status == 'Tidak Diterima')

                {{-- AREA INI SAJA YANG DICETAK --}}
                <div id="area-cetak-pengumuman">

                    <div class="text-center mb-4">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRBqz_N0J0bUGFQnLZihDE8REdidm_DDnaJXQ&s"
                             alt="Logo Sekolah"
                             class="logo-pengumuman">

                        <h3 class="font-weight-bold mb-1">
                            PENGUMUMAN HASIL SELEKSI
                        </h3>

                        <h5 class="mb-1">
                            SMKS Ma'arif NU Kota Batam
                        </h5>

                        <p class="mb-0">
                            Penerimaan Peserta Didik Baru
                        </p>
                    </div>

                    <div class="alert alert-danger">
                        <h3>Mohon Maaf</h3>

                        <p class="mb-0">
                            Anda belum dinyatakan diterima.
                            Terima kasih telah mengikuti seluruh proses seleksi.
                        </p>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header bg-danger text-white">
                            Detail Nilai Seleksi
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">Nama Siswa</th>
                                    <td>{{ $siswa->user->name ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <th>Jurusan</th>
                                    <td>{{ $siswa->kelas->nama_jurusan ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <th>Nilai Raport</th>
                                    <td>{{ $siswa->nilai_rata ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <th>Nilai Tes Al-Qur'an</th>
                                    <td>{{ $siswa->nilai_quran ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <th>Nilai Wawancara</th>
                                    <td>{{ $siswa->nilai_wawancara ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <th>Total Nilai</th>
                                    <td>
                                        <strong>
                                            {{ $siswa->total_nilai !== null ? number_format($siswa->total_nilai, 2) : '-' }}
                                        </strong>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Status Seleksi</th>
                                    <td>
                                        <span class="badge badge-danger">
                                            Tidak Diterima
                                        </span>
                                    </td>
                                </tr>
                            </table>

                            @if($siswa->catatan_admin)
                                <div class="alert alert-secondary mt-3">
                                    <strong>Catatan Admin:</strong>
                                    <br>
                                    {{ $siswa->catatan_admin }}
                                </div>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="text-right mt-3 no-print">
                    <button onclick="window.print()" class="btn btn-outline-secondary">
                        <i class="fas fa-print"></i>
                        Cetak Pengumuman
                    </button>
                </div>

            @else

                <div class="alert alert-warning">
                    Pengumuman hasil seleksi belum tersedia.
                </div>

            @endif

        </div>

    </div>

</div>

@endsection