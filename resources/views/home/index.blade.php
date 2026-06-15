@extends('layouts.app', ['title' => Auth::user()->level == 'admin' ? 'Admin' : 'Siswa'])
@section('content')
    <!-- Content Row -->
    @if (Auth::user()->level == 'admin')
        <div class="row">
            <!-- Kelas Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                    Jurusan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $kelas->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-house fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Siswa Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                    Siswa Pendaftar</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $siswa->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pembayaran Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                    Pembayaran</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $daftar_ulang->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Data Aspek Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                    Data Aspek</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $aspek }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-chart-bar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Data Kriteria Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                    Data Kriteria</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $kriteria }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-chart-bar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Data Penilaian Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Data Penilaian
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $penilaian }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-chart-bar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Data Perhitungan Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                    Data Perhitungan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $penilaian }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-chart-bar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Data Hasil Akhir Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                    Data Hasil Akhir</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $hasilAkhir }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-chart-bar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Data Rekapan Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Data Rekapan
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $hasilAkhir }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-chart-bar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Content Row -->

    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Welcome</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <h1>Selamat Datang {{ Auth::user()->name }}</h1>
                </div>
            </div>
        </div>
    </div>
    @if (auth()->check() && auth()->user()->level == 'siswa')

        <style>
            .ppdb-step-card {
                border-radius: 15px;
                transition: 0.3s ease;
                min-height: 100%;
                cursor: pointer;
                border-top: 6px solid transparent !important;
            }

            .ppdb-step-card:hover {
                transform: translateY(-3px);
            }

            .ppdb-lampu {
                width: 24px;
                height: 24px;
                border-radius: 50%;
                display: none;
                margin-bottom: 10px;
                border: 3px solid #ffffff;
            }

            .ppdb-status-text {
                display: none;
                font-size: 13px;
                font-weight: bold;
                margin-top: 8px;
            }

            /* BARU AKTIF SETELAH DIKLIK */
            .ppdb-step-card.ppdb-clicked .ppdb-lampu {
                display: inline-block;
            }

            .ppdb-step-card.ppdb-clicked .ppdb-status-text {
                display: block;
            }

            .ppdb-step-card.ppdb-clicked.ppdb-done {
                border-top-color: #28a745 !important;
            }

            .ppdb-step-card.ppdb-clicked.ppdb-current {
                border-top-color: #ffc107 !important;
            }

            .ppdb-step-card.ppdb-clicked.ppdb-locked {
                border-top-color: #adb5bd !important;
            }

            .ppdb-lampu-hijau {
                background-color: #28a745;
                box-shadow: 0 0 18px #28a745;
            }

            .ppdb-lampu-kuning {
                background-color: #ffc107;
                box-shadow: 0 0 18px #ffc107;
                animation: ppdb-kedip 0.8s infinite alternate;
            }

            .ppdb-lampu-abu {
                background-color: #adb5bd;
                box-shadow: 0 0 8px #adb5bd;
            }

            @keyframes ppdb-kedip {
                from {
                    opacity: 0.45;
                }

                to {
                    opacity: 1;
                }
            }
        </style>

        @php
            $user = auth()->user();

            $pembayaran = null;

            if (method_exists($user, 'pembayaran')) {
                $pembayaran = $user->pembayaran;
            } elseif (method_exists($user, 'daftarUlang')) {
                $pembayaran = $user->daftarUlang;
            } elseif (method_exists($user, 'daftar_ulang')) {
                $pembayaran = $user->daftar_ulang;
            }

            $pendaftaran = method_exists($user, 'pendaftaran') ? $user->pendaftaran : null;
            $berkas = method_exists($user, 'berkas') ? $user->berkas : null;
            $quranTes = method_exists($user, 'quranTes') ? $user->quranTes : null;
            $interviewTest = method_exists($user, 'interviewTest') ? $user->interviewTest : null;

            $cekAdaData = function ($data) {
                if ($data instanceof \Illuminate\Support\Collection) {
                    return $data->isNotEmpty();
                }

                return !empty($data);
            };

            $ambilDataPertama = function ($data) {
                if ($data instanceof \Illuminate\Support\Collection) {
                    return $data->first();
                }

                return $data;
            };

            $pembayaranData = $ambilDataPertama($pembayaran);

            $statusPembayaran = strtolower(trim($pembayaranData->status ?? ''));

            $adaBuktiPembayaran =
                !empty($pembayaranData->bukti_pembayaran ?? null) ||
                !empty($pembayaranData->bukti ?? null) ||
                !empty($pembayaranData->foto_bukti ?? null) ||
                !empty($pembayaranData->file_bukti ?? null) ||
                !empty($pembayaranData->gambar ?? null);

            $pembayaranDiterima = in_array($statusPembayaran, [
                'diterima',
                'lunas',
                'valid',
                'verified',
                'terverifikasi',
                'disetujui',
            ]);

            $pembayaranMenunggu = in_array($statusPembayaran, [
                'menunggu',
                'menunggu verifikasi',
                'menunggu_verifikasi',
                'pending',
                'diproses',
                'proses',
            ]);

            $sudahIsiFormulir = $cekAdaData($pendaftaran);
            $sudahUploadBerkas = $cekAdaData($berkas);
            $sudahTesQuran = $cekAdaData($quranTes);
            $sudahWawancara = $cekAdaData($interviewTest);

            /*
            STATUS:
            done = sudah selesai
            current = tahap sekarang
            locked = belum waktunya
            */

            $step1 = 'done';

            if ($pembayaranDiterima) {
                $step2 = 'done';
                $statusStep2 = 'Pembayaran Diterima';
            } elseif ($pembayaranMenunggu || $adaBuktiPembayaran) {
                $step2 = 'current';
                $statusStep2 = 'Menunggu Verifikasi';
            } else {
                $step2 = 'current';
                $statusStep2 = 'Tahap Saat Ini';
            }

            if ($sudahIsiFormulir) {
                $step3 = 'done';
            } elseif ($pembayaranDiterima) {
                $step3 = 'current';
            } else {
                $step3 = 'locked';
            }

            if ($sudahUploadBerkas) {
                $step4 = 'done';
            } elseif ($sudahIsiFormulir) {
                $step4 = 'current';
            } else {
                $step4 = 'locked';
            }

            if ($sudahTesQuran) {
                $step5 = 'done';
            } elseif ($sudahUploadBerkas) {
                $step5 = 'current';
            } else {
                $step5 = 'locked';
            }

            if ($sudahWawancara) {
                $step6 = 'done';
            } elseif ($sudahTesQuran) {
                $step6 = 'current';
            } else {
                $step6 = 'locked';
            }

            if ($sudahWawancara) {
                $step7 = 'current';
            } else {
                $step7 = 'locked';
            }

            $steps = [
                [
                    'status_kode' => $step1,
                    'badge' => 'badge-success',
                    'nomor' => 'Langkah 1',
                    'judul' => 'Registrasi & Login',
                    'gambar' => 'https://wismaagungkedoya.com/wp-content/uploads/2021/06/icon-pendaftaran-png.png',
                    'deskripsi' => 'Calon siswa membuat akun terlebih dahulu kemudian login ke sistem SIPPDB.',
                    'status_text' => 'Selesai',
                ],
                [
                    'status_kode' => $step2,
                    'badge' => 'badge-primary',
                    'nomor' => 'Langkah 2',
                    'judul' => 'Upload Bukti Pembayaran',
                    'gambar' => 'https://cdn-icons-png.freepik.com/512/10551/10551890.png',
                    'deskripsi' => 'Peserta yang telah melakukan pembayaran biaya pendaftaran sebesar Rp150.000 diwajibkan mengunggah bukti pembayaran melalui sistem untuk diverifikasi oleh panitia PPDB.',
                    'status_text' => $statusStep2,
                ],
                [
                    'status_kode' => $step3,
                    'badge' => 'badge-warning',
                    'nomor' => 'Langkah 3',
                    'judul' => 'Isi Formulir',
                    'gambar' => 'https://smkn1yogya.sch.id/wp-content/uploads/2018/07/formulir-icon-300x282.png',
                    'deskripsi' => 'Lengkapi seluruh data diri, data orang tua, dan data sekolah asal pada formulir pendaftaran.',
                    'status_text' => $step3 == 'done' ? 'Selesai' : ($step3 == 'current' ? 'Tahap Saat Ini' : 'Belum Waktunya'),
                ],
                [
                    'status_kode' => $step4,
                    'badge' => 'badge-danger',
                    'nomor' => 'Langkah 4',
                    'judul' => 'Upload Berkas',
                    'gambar' => 'https://cdn-icons-png.freepik.com/512/564/564793.png',
                    'deskripsi' => 'Upload dokumen yang dipersyaratkan seperti KK, Akta Kelahiran, dan berkas pendukung lainnya.',
                    'status_text' => $step4 == 'done' ? 'Selesai' : ($step4 == 'current' ? 'Tahap Saat Ini' : 'Belum Waktunya'),
                ],
                [
                    'status_kode' => $step5,
                    'badge' => 'badge-secondary',
                    'nomor' => 'Langkah 5',
                    'judul' => "Tes Al-Qur'an",
                    'gambar' => 'https://cdn-icons-png.flaticon.com/512/3145/3145765.png',
                    'deskripsi' => "Peserta mengikuti tes membaca Al-Qur'an sesuai jadwal yang telah ditentukan oleh panitia PPDB.",
                    'status_text' => $step5 == 'done' ? 'Selesai' : ($step5 == 'current' ? 'Tahap Saat Ini' : 'Belum Waktunya'),
                ],
                [
                    'status_kode' => $step6,
                    'badge' => 'badge-dark',
                    'nomor' => 'Langkah 6',
                    'judul' => 'Wawancara',
                    'gambar' => 'https://cdn-icons-png.flaticon.com/512/1995/1995574.png',
                    'deskripsi' => 'Peserta mengikuti wawancara sebagai bagian dari proses seleksi penerimaan peserta didik baru.',
                    'status_text' => $step6 == 'done' ? 'Selesai' : ($step6 == 'current' ? 'Tahap Saat Ini' : 'Belum Waktunya'),
                ],
                [
                    'status_kode' => $step7,
                    'badge' => 'badge-info',
                    'nomor' => 'Langkah 7',
                    'judul' => 'Pengumuman',
                    'gambar' => 'https://elzawa.uin-malang.ac.id/wp-content/uploads/2020/02/pengumuman.png',
                    'deskripsi' => 'Hasil seleksi akan diumumkan melalui sistem SIPPDB setelah seluruh tahapan seleksi selesai dilaksanakan.',
                    'status_text' => $step7 == 'current' ? 'Tahap Saat Ini' : 'Belum Waktunya',
                ],
            ];
        @endphp

        <div class="container-fluid">

            <div class="text-center mb-5">
                <h2 class="font-weight-bold text-success">
                    Alur Pendaftaran
                </h2>
                <p class="text-muted">
                    Klik langkah untuk melihat lampu status tahapan pendaftaran.
                </p>
            </div>

            <div class="row">

                @foreach ($steps as $index => $item)
                    <div class="{{ $index == 6 ? 'col-lg-12 col-md-12' : 'col-lg-4 col-md-6' }} mb-4">

                        <div class="card border-0 shadow h-100 text-center ppdb-step-card" data-status="{{ $item['status_kode'] }}">

                            <div class="card-body">

                                @if ($item['status_kode'] == 'done')
                                    <span class="ppdb-lampu ppdb-lampu-hijau"></span>
                                @elseif ($item['status_kode'] == 'current')
                                    <span class="ppdb-lampu ppdb-lampu-kuning"></span>
                                @else
                                    <span class="ppdb-lampu ppdb-lampu-abu"></span>
                                @endif

                                <div class="badge {{ $item['badge'] }} mb-3 p-2">
                                    {{ $item['nomor'] }}
                                </div>

                                <br>

                                <img src="{{ $item['gambar'] }}" width="90" class="mb-3" alt="{{ $item['judul'] }}">

                                <h4 class="font-weight-bold">
                                    {{ $item['judul'] }}
                                </h4>

                                <p class="text-muted">
                                    {{ $item['deskripsi'] }}
                                </p>

                                <div class="ppdb-status-text">
                                    Status: {{ $item['status_text'] }}
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const cards = document.querySelectorAll('.ppdb-step-card');

                cards.forEach(function (card) {
                    card.addEventListener('click', function () {
                        cards.forEach(function (item) {
                            item.classList.remove('ppdb-clicked');
                            item.classList.remove('ppdb-done');
                            item.classList.remove('ppdb-current');
                            item.classList.remove('ppdb-locked');
                        });

                        const status = card.getAttribute('data-status');

                        card.classList.add('ppdb-clicked');

                        if (status === 'done') {
                            card.classList.add('ppdb-done');
                        } else if (status === 'current') {
                            card.classList.add('ppdb-current');
                        } else {
                            card.classList.add('ppdb-locked');
                        }
                    });
                });
            });
        </script>

    @endif
@endsection