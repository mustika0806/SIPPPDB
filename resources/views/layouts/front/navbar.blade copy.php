<!-- START HEADER SECTION -->
<header class="main-header">

    <a href="{{ route('home') }}">

        <head>

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">
            <link href="https://ppdb.smkwikrama.sch.id/img/ikon.png" rel='shortcut icon'>

            <title>SIPPDB SMK MA'arif NU Kota Batam</title>

            <!-- Additional CSS Files -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

            <!-- PLUGINS CSS STYLE -->
            <link rel="stylesheet"
                href="https://ppdb.smkwikrama.sch.id/assets/template/plugins/bootstrap/bootstrap.min.css">
            <link rel="stylesheet"
                href="https://ppdb.smkwikrama.sch.id/assets/template/plugins/themify-icons/themify-icons.css">
            <link rel="stylesheet" href="https://ppdb.smkwikrama.sch.id/assets/template/plugins/slick/slick.css">
            <link rel="stylesheet" href="https://ppdb.smkwikrama.sch.id/assets/template/plugins/slick/slick-theme.css">
            <link rel="stylesheet"
                href="https://ppdb.smkwikrama.sch.id/assets/template/plugins/fancybox/jquery.fancybox.min.css">
            <link rel="stylesheet" href="https://ppdb.smkwikrama.sch.id/assets/template/plugins/aos/aos.css">
            <link rel="stylesheet" type="https://ppdb.smkwikrama.sch.id/text/css"
                href="assets/landing page/css/font-awesome.css">

            <!-- CUSTOM CSS -->
            <link href="https://ppdb.smkwikrama.sch.id/assets/template/css/style.css" rel="stylesheet">
            <link href="https://ppdb.smkwikrama.sch.id/assets/template/css/preloader.css" rel="stylesheet">
            <link href="https://ppdb.smkwikrama.sch.id/assets/template/css/header.css" rel="stylesheet">
            <link href="https://ppdb.smkwikrama.sch.id/assets/template/css/superiority.css" rel="stylesheet">
            <link href="https://ppdb.smkwikrama.sch.id/assets/template/css/slider-slick.css" rel="stylesheet">
            <link href="https://ppdb.smkwikrama.sch.id/assets/template/css/superiority.css" rel="stylesheet">
            <link href="https://ppdb.smkwikrama.sch.id/assets/template/css/contact.css" rel="stylesheet">
            <link href="https://ppdb.smkwikrama.sch.id/assets/template/css/slider.css" rel="stylesheet">
            <link href="https://ppdb.smkwikrama.sch.id/assets/template/css/additional.css" rel="stylesheet">

        </head>

        <body>

            <!-- ** Preloader Start ** -->
            <div id="preloader">
                <div class="jumper">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
            <!-- ** Preloader End ** -->


            <div class="modal" id="success-msg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content p-0 m-0">

                        <div class="modal-body">
                            <div class="alert alert-success mb-0 text-center" role="alert" style="height: fit-content;">
                                Pesan telah berhasil dikirim!
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ** Header Area Start ** -->
            <header class="header-area header-sticky">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <nav class="main-nav">
                                <!-- ** Logo Start ** -->
                                <a href="/" class="logo">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRBqz_N0J0bUGFQnLZihDE8REdidm_DDnaJXQ&s"
                                        alt="" height="30px" />
                                </a>
                                <!-- ** Logo End ** -->
                                <!-- ** Menu Start ** -->
                                <ul class="nav">
                                    <li><a href="#beranda" class="active">Jadwal Pendaftaran</a></li>
                                    <li><a href="#info-ppdb">Info PPDB</a></li>
                                    <li><a href="#features">Pembagian Jalur Masuk</a></li>
                                    <li><a href="#testimonials">Profil Sekolah</a></li>
                                    <li><a href="#contact-us">Hubungi Kami</a></li>
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                </ul>
                                <a class='menu-trigger'>
                                    <span>Menu</span>
                                </a>
                                <!-- ** Menu End ** -->
                            </nav>
                        </div>
                    </div>
                </div>
            </header>
            <!-- ** Header Area End ** -->

            <!--====================================
    =            Hero Section            =
    =====================================-->
            <section class="gradient-banner"
                style="background-image: linear-gradient( rgba(0,0,0,0.6), rgba(0,0,0,0.6) ), url('whatsapp-banner.jpeg'); background-repeat:no-repeat; background-size:cover">


                <div class="container mt-4" id="beranda">
                    <div class="row align-items-center">
                        <div class="col-12 order-2 order-md-1 text-center text-md-left mt-5">
                            <h2 class="text-white font-weight-bold mb-3">SIPPDB TA 2026-2027<br>SMKS Ma'arif NU Kota
                                Batam
                            </h2>
                            <p class="text-white mb-5">Ayo! segera daftarkan dirimu ke SMKS Ma'arif NU Kota Batam
                                <br>dengan
                                cara
                                klik
                                <b>PENDAFTARAN SIPPDB</b> dibawah ini! <br><strong>""Sekolah Unggul, Religius, dan Siap
                                    Kerja."</strong>
                            </p>
                            <a href="{{ route('register') }}"
                                class="btn btn-main-md shadow-md bordered font-weight-bold">REGISTER</a>
                        </div>

                    </div>
                </div>
            </section>
            <!--====  End of Hero Section  ====-->

            <section class="pt-0 position-relative pull-top mb-5" id="jumbotron-card">
                <div class="container">
                    <div class="rounded shadow p-5 bg-white">
                        <div class="row">
                            <style>
                                .modal-content {
                                    border: none;
                                    border-radius: 20px;
                                    overflow: hidden;
                                }

                                .modal-header {
                                    background: linear-gradient(135deg, #28a745, #146c43);
                                    color: #fff;
                                }

                                .modal-header .close {
                                    color: #fff;
                                    opacity: 1;
                                }

                                .gelombang-item {
                                    border: 1px solid #e9ecef;
                                    border-radius: 12px;
                                    padding: 15px;
                                    margin-bottom: 12px;
                                    transition: .3s;
                                }

                                .gelombang-item:hover {
                                    transform: translateY(-2px);
                                    box-shadow: 0 8px 20px rgba(0, 0, 0, .08);
                                }

                                .btn-gelombang {
                                    border-radius: 30px;
                                    padding: 6px 18px;
                                }
                            </style>

                            <!-- PENDAFTARAN -->
                            <!-- PENDAFTARAN -->
                            <div class="col-lg-4 col-md-12 text-center">

                                <h6 class="font-weight-bold text-uppercase">
                                    PENDAFTARAN
                                </h6>

                                @if ($jadwalAktif)
                                    <p class="regular text-muted mb-2">
                                        Pendaftaran dibuka pada
                                        <br>
                                        <strong>
                                            {{ \Carbon\Carbon::parse($jadwalAktif->mulai)->translatedFormat('d F Y') }}
                                            -
                                            {{ \Carbon\Carbon::parse($jadwalAktif->berakhir)->translatedFormat('d F Y') }}
                                        </strong>
                                    </p>
                                @else
                                    <p class="regular text-muted mb-2">
                                        Belum ada gelombang pendaftaran yang sedang berlangsung.
                                    </p>
                                @endif

                                <button type="button" class="btn btn-outline-success btn-sm btn-gelombang"
                                    data-toggle="modal" data-target="#modalGelombang">
                                    <i class="fas fa-calendar-alt mr-1"></i>
                                    Jadwal Gelombang
                                </button>

                            </div>

                            <!-- MODAL JADWAL GELOMBANG -->
                            <!-- MODAL JADWAL GELOMBANG -->
                            <div class="modal fade" id="modalGelombang" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h5 class="modal-title">
                                                Jadwal Gelombang PPDB
                                            </h5>

                                            <button type="button" class="close" data-dismiss="modal">
                                                <span>&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">

                                            @forelse ($gelombangs as $gelombang)
                                                @php
                                                    $today = \Carbon\Carbon::today();

                                                    $mulaiPendaftaran = \Carbon\Carbon::parse($gelombang->mulai);
                                                    $akhirPendaftaran = \Carbon\Carbon::parse($gelombang->berakhir);

                                                    $mulaiVerifikasi = $akhirPendaftaran->copy()->addDay();
                                                    $akhirVerifikasi = $akhirPendaftaran->copy()->addDays(7);

                                                    $mulaiDaftarUlang = $akhirVerifikasi->copy()->addDay();
                                                    $akhirDaftarUlang = $akhirVerifikasi->copy()->addDays(7);

                                                    if ($today->between($mulaiPendaftaran, $akhirPendaftaran)) {
                                                        $statusText = 'Pendaftaran Berlangsung';
                                                        $badgeClass = 'badge-success';
                                                    } elseif ($today->between($mulaiVerifikasi, $akhirVerifikasi)) {
                                                        $statusText = 'Verifikasi & Validasi';
                                                        $badgeClass = 'badge-info';
                                                    } elseif ($today->between($mulaiDaftarUlang, $akhirDaftarUlang)) {
                                                        $statusText = 'Pengumuman & Daftar Ulang';
                                                        $badgeClass = 'badge-primary';
                                                    } elseif ($today->lessThan($mulaiPendaftaran)) {
                                                        $statusText = 'Belum Dibuka';
                                                        $badgeClass = 'badge-warning';
                                                    } else {
                                                        $statusText = 'Selesai';
                                                        $badgeClass = 'badge-secondary';
                                                    }
                                                @endphp

                                                <div class="card border-0 shadow-sm mb-3">
                                                    <div class="card-body">

                                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                                            <div>
                                                                <h6 class="mb-0 font-weight-bold text-success">
                                                                    Gelombang {{ $loop->iteration }}
                                                                </h6>

                                                                @if ($gelombang->tahun_akademik)
                                                                    <small class="text-muted">
                                                                        Tahun Akademik {{ $gelombang->tahun_akademik }}
                                                                    </small>
                                                                @endif
                                                            </div>

                                                            <span class="badge {{ $badgeClass }}"
                                                                style="font-size: 13px; padding: 8px 12px;">
                                                                {{ $statusText }}
                                                            </span>
                                                        </div>

                                                        <div class="table-responsive">
                                                            <table class="table table-sm table-bordered mb-0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="35%">
                                                                            <strong>Pendaftaran</strong>
                                                                        </td>
                                                                        <td>
                                                                            {{ $mulaiPendaftaran->translatedFormat('d F Y') }}
                                                                            -
                                                                            {{ $akhirPendaftaran->translatedFormat('d F Y') }}
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>
                                                                            <strong>Verifikasi dan Validasi</strong>
                                                                        </td>
                                                                        <td>
                                                                            {{ $mulaiVerifikasi->translatedFormat('d F Y') }}
                                                                            -
                                                                            {{ $akhirVerifikasi->translatedFormat('d F Y') }}
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>
                                                                            <strong>Pengumuman dan Daftar Ulang</strong>
                                                                        </td>
                                                                        <td>
                                                                            {{ $mulaiDaftarUlang->translatedFormat('d F Y') }}
                                                                            -
                                                                            {{ $akhirDaftarUlang->translatedFormat('d F Y') }}
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                    </div>
                                                </div>
                                            @empty
                                                <div class="alert alert-warning mb-0 text-center">
                                                    Jadwal gelombang PPDB belum tersedia.
                                                </div>
                                            @endforelse

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12 mt-5 mt-lg-0 text-center">
                                <h6 class="font-weight-bold text-capitalize">VERIFIKASI & VALIDASI</h6>

                                @if ($jadwalAktif)
                                    @php
                                        $akhirPendaftaran = \Carbon\Carbon::parse($jadwalAktif->berakhir);

                                        $mulaiVerifikasi = $akhirPendaftaran->copy()->addDay();
                                        $akhirVerifikasi = $akhirPendaftaran->copy()->addDays(7);
                                    @endphp

                                    <p class="regular text-muted" id="teks-verifikasi">
                                        Verifikasi & Validasi
                                        <br>
                                        <b>
                                            {{ $mulaiVerifikasi->translatedFormat('d F') }}
                                            -
                                            {{ $akhirVerifikasi->translatedFormat('d F Y') }}
                                        </b>
                                    </p>
                                @else
                                    <p class="regular text-muted" id="teks-verifikasi">
                                        Jadwal verifikasi dan validasi belum tersedia
                                    </p>
                                @endif
                            </div>

                            <div class="col-lg-4 col-md-12 mt-5 mt-lg-0 text-center">
                                <h6 class="font-weight-bold text-capitalize">PENGUMUMAN & DAFTAR ULANG</h6>

                                @if ($jadwalAktif)
                                    @php
                                        $akhirPendaftaran = \Carbon\Carbon::parse($jadwalAktif->berakhir);

                                        // Verifikasi dan validasi: 1 minggu setelah pendaftaran berakhir
                                        $mulaiVerifikasi = $akhirPendaftaran->copy()->addDay();
                                        $akhirVerifikasi = $akhirPendaftaran->copy()->addDays(7);

                                        // Pengumuman dan daftar ulang: 1 minggu setelah verifikasi selesai
                                        $mulaiDaftarUlang = $akhirVerifikasi->copy()->addDay();
                                        $akhirDaftarUlang = $akhirVerifikasi->copy()->addDays(7);
                                    @endphp

                                    <p class="regular text-muted" id="teks-pengumuman">
                                        Pengumuman & Daftar Ulang
                                        <br>
                                        <b>
                                            {{ $mulaiDaftarUlang->translatedFormat('d F') }}
                                            -
                                            {{ $akhirDaftarUlang->translatedFormat('d F Y') }}
                                        </b>
                                    </p>
                                @else
                                    <p class="regular text-muted" id="teks-pengumuman">
                                        Jadwal pengumuman dan daftar ulang belum tersedia
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Informasi Sekolah & Program Unggulan -->
            <section class="py-5 bg-white" id="info-ppdb">
                <style>
                    #info-ppdb .section-title {
                        font-size: 34px;
                        font-weight: 700;
                        color: #009846;
                        letter-spacing: 1px;
                    }

                    #info-ppdb .section-subtitle {
                        color: #6c757d;
                        font-size: 15px;
                    }

                    #info-ppdb .info-wrapper {
                        border-radius: 22px;
                        background: #ffffff;
                        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.08);
                        overflow: hidden;
                    }

                    #info-ppdb .info-left {
                        padding: 38px;
                    }

                    #info-ppdb .info-left h4 {
                        color: #009846;
                        font-weight: 700;
                        margin-bottom: 18px;
                    }

                    #info-ppdb .info-left p {
                        color: #555;
                        line-height: 1.9;
                        font-size: 15px;
                        margin-bottom: 0;
                        text-align: justify;
                    }

                    #info-ppdb .program-title {
                        font-weight: 700;
                        color: #009846;
                        margin-top: 55px;
                        margin-bottom: 10px;
                    }

                    #info-ppdb .program-card {
                        border: none;
                        border-radius: 18px;
                        background: #ffffff;
                        box-shadow: 0 10px 28px rgba(0, 0, 0, 0.08);
                        height: 100%;
                        transition: 0.3s ease;
                    }

                    #info-ppdb .program-card:hover {
                        transform: translateY(-6px);
                        box-shadow: 0 16px 35px rgba(0, 0, 0, 0.12);
                    }

                    #info-ppdb .program-icon {
                        width: 58px;
                        height: 58px;
                        border-radius: 50%;
                        background: rgba(0, 152, 70, 0.12);
                        color: #009846;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-size: 26px;
                        margin: 0 auto 18px auto;
                    }

                    #info-ppdb .program-card h5 {
                        color: #009846;
                        font-weight: 700;
                        margin-bottom: 12px;
                    }

                    #info-ppdb .program-card p {
                        color: #6c757d;
                        font-size: 14px;
                        line-height: 1.7;
                        margin-bottom: 0;
                    }
                </style>

                <div class="container">

                    <!-- Judul Utama -->
                    <div class="text-center mb-5">
                        <h2 class="section-title">
                            Informasi Pendaftaran Peserta Didik Baru
                        </h2>
                    </div>

                    <!-- Informasi Sekolah -->
                    <div class="info-wrapper">
                        <div class="info-left">
                            <h4>
                                Informasi Sekolah
                            </h4>

                            <p>
                                <strong>SMKS Ma'arif NU Kota Batam</strong> merupakan sekolah menengah kejuruan swasta
                                yang berlokasi di Kecamatan Sekupang, Kota Batam, Kepulauan Riau. Sekolah ini didirikan
                                pada <strong>7 Agustus 2015</strong> berdasarkan Surat Keputusan Pendirian Nomor
                                <strong>1178/422.10/DIKMEN/VII/2015</strong> dan berada di bawah naungan Kementerian
                                Pendidikan, Kebudayaan, Riset, dan Teknologi. Saat ini sekolah dipimpin oleh
                                <strong>Nopvia Kristiningrum</strong> sebagai Kepala Sekolah, dengan dukungan tenaga
                                pendidik profesional dalam menciptakan lingkungan belajar yang unggul, religius, dan
                                berorientasi pada kebutuhan dunia kerja.
                            </p>
                        </div>
                    </div>

                    <!-- Program Unggulan -->
                    <div class="text-center">
                        <h3 class="program-title">
                            Program Unggulan
                        </h3>
                        <p class="text-muted mb-5">
                            Program unggulan yang mendukung pengembangan karakter, keterampilan, dan keagamaan peserta
                            didik.
                        </p>
                    </div>

                    <div class="row">

                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card program-card text-center">
                                <div class="card-body p-4">
                                    <div class="program-icon">
                                        <i class="fa fa-book"></i>
                                    </div>

                                    <h5>
                                        Tahfidz Al-Qur'an
                                    </h5>

                                    <p>
                                        Program pembinaan hafalan Al-Qur'an untuk membentuk karakter religius peserta
                                        didik.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card program-card text-center">
                                <div class="card-body p-4">
                                    <div class="program-icon">
                                        <i class="fa fa-microphone"></i>
                                    </div>

                                    <h5>
                                        Public Speaking
                                    </h5>

                                    <p>
                                        Melatih kemampuan berbicara, percaya diri, dan komunikasi di depan umum.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card program-card text-center">
                                <div class="card-body p-4">
                                    <div class="program-icon">
                                        <i class="fa fa-futbol-o"></i>
                                    </div>

                                    <h5>
                                        Olahraga
                                    </h5>

                                    <p>
                                        Mendukung pengembangan minat, bakat, kesehatan, dan sportivitas peserta didik.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card program-card text-center">
                                <div class="card-body p-4">
                                    <div class="program-icon">
                                        <i class="fa fa-university"></i>
                                    </div>

                                    <h5>
                                        Qiroatul Kutub
                                    </h5>

                                    <p>
                                        Pembinaan kemampuan membaca dan memahami kitab kuning sebagai penguatan keilmuan
                                        Islam.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </section>

            <!-- Syarat Administrasi -->
            <section class="py-5 bg-white" id="syarat-administrasi">
                <style>
                    #syarat-administrasi .syarat-box {
                        background: #ffffff;
                        border-radius: 22px;
                        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.08);
                        padding: 42px;
                    }

                    #syarat-administrasi .syarat-title {
                        color: #009846;
                        font-weight: 700;
                        margin-bottom: 10px;
                    }

                    #syarat-administrasi .syarat-subtitle {
                        color: #6c757d;
                        font-size: 15px;
                        margin-bottom: 35px;
                    }

                    #syarat-administrasi .syarat-list {
                        list-style: none;
                        padding-left: 0;
                        margin-bottom: 0;
                    }

                    #syarat-administrasi .syarat-list li {
                        display: flex;
                        align-items: flex-start;
                        background: #f8fffb;
                        border: 1px solid #e5f4ec;
                        border-radius: 14px;
                        padding: 16px 18px;
                        margin-bottom: 15px;
                        color: #555;
                        font-size: 14px;
                        line-height: 1.6;
                    }

                    #syarat-administrasi .syarat-number {
                        width: 32px;
                        height: 32px;
                        min-width: 32px;
                        border-radius: 50%;
                        background: #009846;
                        color: #ffffff;
                        display: inline-flex;
                        align-items: center;
                        justify-content: center;
                        font-weight: 700;
                        font-size: 13px;
                        margin-right: 14px;
                    }

                    #syarat-administrasi .syarat-note {
                        margin-top: 25px;
                        background: #eefaf3;
                        border-left: 5px solid #009846;
                        border-radius: 10px;
                        padding: 16px 20px;
                        color: #555;
                        font-size: 14px;
                    }

                    @media (max-width: 768px) {
                        #syarat-administrasi .syarat-box {
                            padding: 28px 20px;
                        }
                    }
                </style>

                <div class="container">
                    <div class="syarat-box">

                        <div class="text-center">
                            <h3 class="syarat-title">
                                Syarat Administrasi
                            </h3>

                            <p class="syarat-subtitle">
                                Calon peserta didik wajib menyiapkan dokumen berikut sebagai persyaratan pendaftaran
                                PPDB.
                            </p>
                        </div>

                        <div class="row">

                            <div class="col-lg-6 col-md-12">
                                <ul class="syarat-list">
                                    <li>
                                        <span class="syarat-number">1</span>
                                        <span>Mengisi formulir pendaftaran melalui sistem SIPPDB.</span>
                                    </li>

                                    <li>
                                        <span class="syarat-number">2</span>
                                        <span>Fotokopi KTP orang tua sebanyak 1 lembar.</span>
                                    </li>

                                    <li>
                                        <span class="syarat-number">3</span>
                                        <span>Fotokopi Kartu Keluarga sebanyak 1 lembar.</span>
                                    </li>

                                    <li>
                                        <span class="syarat-number">4</span>
                                        <span>Fotokopi Akta Kelahiran sebanyak 1 lembar.</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <ul class="syarat-list">
                                    <li>
                                        <span class="syarat-number">5</span>
                                        <span>Fotokopi ijazah atau Surat Keterangan Lulus.</span>
                                    </li>

                                    <li>
                                        <span class="syarat-number">6</span>
                                        <span>Fotokopi KKS, KIP, dan dokumen pendukung lainnya jika ada.</span>
                                    </li>

                                    <li>
                                        <span class="syarat-number">7</span>
                                        <span>Pas foto ukuran 3x4 latar merah sebanyak 3 lembar.</span>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

            <!-- Rincian Biaya PPDB -->
            <section class="py-5 bg-white" id="rincian-biaya">
                <style>
                    #rincian-biaya .biaya-box {
                        background: #ffffff;
                        border-radius: 22px;
                        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.08);
                        padding: 42px;
                    }

                    #rincian-biaya .biaya-title {
                        color: #009846;
                        font-weight: 700;
                        margin-bottom: 10px;
                    }

                    #rincian-biaya .biaya-subtitle {
                        color: #6c757d;
                        font-size: 15px;
                        margin-bottom: 35px;
                    }

                    #rincian-biaya table th {
                        background: #009846;
                        color: #ffffff;
                        text-align: center;
                        vertical-align: middle;
                    }

                    #rincian-biaya table td {
                        vertical-align: middle;
                        font-size: 14px;
                    }

                    #rincian-biaya .kategori-biaya {
                        font-weight: 700;
                        color: #009846;
                    }

                    #rincian-biaya .catatan-biaya {
                        margin-top: 20px;
                        background: #eefaf3;
                        border-left: 5px solid #009846;
                        border-radius: 10px;
                        padding: 16px 20px;
                        color: #555;
                        font-size: 14px;
                    }
                </style>

                <div class="container">
                    <div class="biaya-box">

                        <div class="text-center">
                            <h3 class="biaya-title">
                                Rincian Biaya PPDB
                            </h3>

                            <p class="biaya-subtitle">
                                Berikut rincian biaya pendaftaran siswa dan santri baru SMKS Ma'arif NU Kota Batam.
                            </p>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Komponen Biaya</th>
                                        <th width="30%">Nominal</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>Formulir Pendaftaran</td>
                                        <td>Rp 150.000</td>
                                    </tr>

                                    <tr>
                                        <td class="text-center">2</td>
                                        <td>Masa Pengenalan Lingkungan Sekolah atau MPLS</td>
                                        <td>Rp 250.000</td>
                                    </tr>

                                    <tr>
                                        <td class="text-center" rowspan="2">3</td>
                                        <td>
                                            <span class="kategori-biaya">Uang Seragam</span>
                                            <br>
                                            Seragam Laki-laki
                                        </td>
                                        <td>Rp 2.200.000</td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <span class="kategori-biaya">Uang Seragam</span>
                                            <br>
                                            Seragam Perempuan
                                        </td>
                                        <td>Rp 2.300.000</td>
                                    </tr>

                                    <tr>
                                        <td class="text-center" rowspan="3">4</td>
                                        <td>
                                            <span class="kategori-biaya">Uang Pembangunan</span>
                                            <br>
                                            Gelombang 1 (Desember - Februari)
                                        </td>
                                        <td>Rp 2.000.000</td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <span class="kategori-biaya">Uang Pembangunan</span>
                                            <br>
                                            Gelombang 2 (Maret - Mei)
                                        </td>
                                        <td>Rp 2.500.000</td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <span class="kategori-biaya">Uang Pembangunan</span>
                                            <br>
                                            Gelombang 3 (Juni - Juli)
                                        </td>
                                        <td>Rp 3.000.000</td>
                                    </tr>

                                    <tr>
                                        <td class="text-center">5</td>
                                        <td>
                                            SPP Sekolah per Bulan
                                            <br>
                                            <small class="text-muted">SPP Juli dibayar di awal</small>
                                        </td>
                                        <td>Rp 400.000</td>
                                    </tr>

                                    <tr>
                                        <td class="text-center">6</td>
                                        <td>
                                            SPP Pondok Pesantren per Bulan
                                            <br>
                                            <small class="text-muted">SPP Juli dibayar di awal</small>
                                        </td>
                                        <td>Rp 300.000</td>
                                    </tr>

                                    <tr>
                                        <td class="text-center">7</td>
                                        <td>Iuran Praktikum per Tahun</td>
                                        <td>Rp 50.000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="catatan-biaya">
                            <strong>Catatan:</strong>
                            Rincian biaya mengikuti informasi resmi PPDB SMKS Ma'arif NU Kota Batam Tahun Ajaran
                            2026/2027.
                            Calon peserta didik diharapkan memastikan kembali informasi biaya kepada panitia PPDB.
                        </div>

                    </div>
                </div>
            </section>

            <!-- Pembagian Jalur Masuk -->
            <section class="py-5 bg-light" id="testimonials">
                <div class="container">

                    <div class="text-center mb-5">
                        <h2 class="font-weight-bold text-success">
                            Pembagian Jalur Masuk
                        </h2>
                        <p class="text-muted">
                            SIPPDB SMKS Ma'arif NU Kota Batam menyediakan 3 jalur penerimaan peserta didik baru.
                        </p>
                    </div>

                    <div class="row">

                        <!-- Prestasi -->
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card border-0 shadow h-100 text-center">
                                <div class="card-body">

                                    <img src="https://cdn-icons-png.freepik.com/512/9512/9512451.png" width="90"
                                        class="mb-3" alt="Jalur Prestasi">

                                    <h4 class="font-weight-bold text-primary">
                                        Jalur Prestasi
                                    </h4>

                                    <p class="text-muted">
                                        Diperuntukkan bagi calon peserta didik yang memiliki prestasi akademik maupun
                                        non-akademik
                                        yang dibuktikan dengan dokumen pendukung.
                                    </p>

                                </div>
                            </div>
                        </div>

                        <!-- Domisili -->
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card border-0 shadow h-100 text-center">
                                <div class="card-body">

                                    <img src="https://storage-api.cimahikota.go.id/lapakami/assets/icon/22df49ef96ded10bb9a3a90295d8bdb0.png"
                                        width="90" class="mb-3" alt="Jalur Domisili">

                                    <h4 class="font-weight-bold text-warning">
                                        Jalur Domisili
                                    </h4>

                                    <p class="text-muted">
                                        Diperuntukkan bagi calon peserta didik yang berdomisili sesuai ketentuan wilayah
                                        yang telah ditetapkan.
                                    </p>

                                </div>
                            </div>
                        </div>

                        <!-- Afirmasi -->
                        <div class="col-lg-4 col-md-12 mb-4">
                            <div class="card border-0 shadow h-100 text-center">
                                <div class="card-body">

                                    <img src="https://cdn-icons-png.freepik.com/256/18516/18516996.png?semt=ais_white_label"
                                        width="90" class="mb-3" alt="Jalur Afirmasi">

                                    <h4 class="font-weight-bold text-success">
                                        Jalur Afirmasi
                                    </h4>

                                    <p class="text-muted">
                                        Diperuntukkan bagi calon peserta didik dari keluarga kurang mampu atau kategori
                                        khusus
                                        sesuai ketentuan yang berlaku.
                                    </p>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
           
            <!-- Superiority -->
            <!-- PROFIL SEKOLAH -->
            <section id="features" class="py-5 bg-light">
                <div class="container">

                    <!-- Judul -->
                    <div class="text-center mb-5">
                        <h2 class="font-weight-bold text-success">
                            Profil SMKS Ma'arif NU Kota Batam
                        </h2>
                        <p class="text-muted">
                            Mengenal Lebih Dekat SMK Ma'arif NU Kota Batam
                        </p>
                    </div>

                    <!-- Video Company Profile -->
                    <div class="card border-0 shadow mb-5">
                        <div class="card-body">

                            <h4 class="font-weight-bold text-success mb-3">
                                Company Profile SMK Ma'arif NU Kota Batam
                            </h4>

                            <iframe width="100%" height="500" src="https://www.youtube.com/embed/ahNK-Z45efU"
                                frameborder="0" allowfullscreen>
                            </iframe>

                        </div>
                    </div>
                    <!-- Video Sejarah -->
                    <div class="card border-0 shadow mt-5">
                        <div class="card-body">

                            <h4 class="font-weight-bold text-success mb-3">
                                Sejarah Berdirinya SMK Ma'arif NU Kota Batam
                            </h4>

                            <iframe width="100%" height="500" src="https://www.youtube.com/embed/wZdrD0dGp6w"
                                frameborder="0" allowfullscreen>
                            </iframe>

                        </div>
                    </div>

                    <!-- Foto + Visi Misi -->
                    <div class="row align-items-center mt-5">

                        <!-- Foto Sekolah -->
                        <div class="col-lg-5 mb-4">

                            <img src="whatsapp-banner.jpeg" alt="SMK Ma'arif NU Batam" class="img-fluid rounded shadow">

                        </div>


                        <!-- Visi Misi -->
                        <div class="col-lg-7">
                            <div class="card border-0 shadow h-100">
                                <div class="card-body">

                                    <h4 class="font-weight-bold text-success mb-3">Visi & Misi
                                    </h4>

                                    <p class="text-muted">
                                        Menjadi sekolah unggulan yang berjiwa nasional,
                                        berwawasan
                                        global yang
                                        menyiapkan generasi muslim terampil dan berahlak mulia.
                                    </p>

                                    <h5 class="font-weight-bold text-success mt-4 mb-3">Misi
                                    </h5>

                                    <ul class="list-unstyled">
                                        <li class="mb-4 d-flex">
                                            <i class="fas fa-seedling text-success mt-1 mr-3"></i>
                                            <span>Membentuk tamatan yang beriman, berkemampuan
                                                unggul, dan mampu
                                                mengembangkan diri.</span>
                                        </li>

                                        <li class="mb-4 d-flex">
                                            <i class="fas fa-seedling text-success mt-1 mr-3"></i>
                                            <span>Menyiapkan tenaga kerja menengah yang terampil
                                                dan
                                                profesional
                                                di
                                                bidang keahlian yang dipilihnya.</span>
                                        </li>

                                        <li class="mb-4 d-flex">
                                            <i class="fas fa-seedling text-success mt-1 mr-3"></i>
                                            <span>Menjadikan SMK sebagai sumber informasi di
                                                bidang
                                                pekerjaan
                                                jasa yang
                                                sesuai dengan program keahlian yang
                                                dipilihnya.</span>
                                        </li>

                                        <li class="d-flex">
                                            <i class="fas fa-seedling text-success mt-1 mr-3"></i>
                                            <span>Menjadikan SMK yang mampu menciptakan SDM yang
                                                mampu bersaing
                                                di dunia
                                                usaha dan industri.</span>
                                        </li>
                                    </ul>

                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- Motto -->
                    <div class="card border-0 shadow text-center mt-4">
                        <div class="card-body">

                            <h4 class="font-weight-bold text-warning">
                                Motto Sekolah
                            </h4>

                            <h2 class="font-weight-bold mt-3">
                                "SMK Bisa! SMK Hebat!"
                            </h2>

                        </div>
                    </div>
                </div>

                
            <!-- To Top -->
            <div class="scroll-top-to">
                <i class="ti-angle-up"></i>
            </div>

            <!-- JAVASCRIPTS -->
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
                integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
                crossorigin="anonymous">
                </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
                integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
                crossorigin="anonymous">
                </script>
            <script src="https://ppdb.smkwikrama.sch.id/assets/template/plugins/jquery/jquery.min.js"></script>
            <script src="https://ppdb.smkwikrama.sch.id/assets/template/plugins/bootstrap/bootstrap.min.js"></script>
            <script src="https://ppdb.smkwikrama.sch.id/assets/template/plugins/slick/slick.min.js"></script>
            <script
                src="https://ppdb.smkwikrama.sch.id/assets/template/plugins/fancybox/jquery.fancybox.min.js"></script>
            <script
                src="https://ppdb.smkwikrama.sch.id/assets/template/plugins/syotimer/jquery.syotimer.min.js"></script>
            <script src="https://ppdb.smkwikrama.sch.id/assets/template/plugins/aos/aos.js"></script>
            <script src="https://ppdb.smkwikrama.sch.id/assets/landing page/js/scrollreveal.min.js"></script>
            <!-- google map -->
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgeuuDfRlweIs7D6uo4wdIHVvJ0LonQ6g"></script>
            <script src="https://ppdb.smkwikrama.sch.id/assets/template/plugins/google-map/gmap.js"></script>

            <!-- Global Init -->
            <script src="https://ppdb.smkwikrama.sch.id/assets/landing page/js/custom.js"></script>

            <script src="https://ppdb.smkwikrama.sch.id/assets/template/js/script.js"></script>

            <script>
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#contact').submit(function (e) {
                    e.preventDefault();

                    var urlForm = "https://ppdb.smkwikrama.sch.id/submitMessage";

                    var data = {
                        name: $('#name').val(),
                        no_wa: $('#no_wa').val(),
                        email: $('#email').val(),
                        message: $('#message').val(),
                    }

                    $.ajax({
                        type: 'POST',
                        url: urlForm,
                        data: data,
                        cache: false,
                        success: (data) => {
                            $("#success-msg").modal('show');
                            $('#contact')[0].reset();
                            setTimeout(function () {
                                $("#success-msg").modal('hide');
                            }, 3000);
                        },
                    });
                });
            </script>

            <script>
                $('.slick-cultivar').slick({
                    dots: true,
                    infinite: false,
                    speed: 300,
                    slidesToShow: 2.08,
                    slidesToScroll: 1,
                    responsive: [{
                        breakpoint: 1400,
                        settings: {
                            slidesToShow: 1.5,
                            slidesToScroll: 1,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 1.2,
                            slidesToScroll: 1,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 0.9,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 0.8,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 500,
                        settings: {
                            slidesToShow: 0.6,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 400,
                        settings: {
                            slidesToShow: 0.4,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 350,
                        settings: {
                            slidesToShow: 0.4,
                            slidesToScroll: 1
                        }
                    }
                        // You can unslick at a given breakpoint now by adding:
                        // settings: "unslick"
                        // instead of a settings object
                    ]
                });
            </script>

            <script>
                $.js = function (el) {
                    return $('[data-js=' + el + ']')
                };

                function carousel() {
                    $.js('timeline-carousel').slick({
                        infinite: false,
                        arrows: false,
                        dots: true,
                        autoplay: false,
                        speed: 1100,
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        responsive: [{
                            breakpoint: 800,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }]
                    });
                }

                carousel();
            </script>


        </body>


        </html>