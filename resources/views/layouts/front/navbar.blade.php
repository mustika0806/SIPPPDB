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
                                    <li><a href="#jurusan">Alur Pendaftaran</a></li>
                                    <li><a href="#features">Profil Sekolah</a></li>
                                    <li><a href="#testimonials">Pembagian Jalur Masuk</a></li>
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
                                <b>PENDAFTARAN SIPPDB</b> dibawah ini! <br><strong>""Sekolah Unggul, Religius, dan Siap Kerja."</strong>
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
                            <div class="col-lg-4 col-md-12 text-center">

                                <h6 class="font-weight-bold text-uppercase">
                                    PENDAFTARAN
                                </h6>

                                <button type="button" class="btn btn-outline-success btn-sm btn-gelombang"
                                    data-toggle="modal" data-target="#modalGelombang">
                                    <i class="fas fa-calendar-alt mr-1"></i>
                                    Jadwal Gelombang
                                </button>

                            </div>

                            <!-- MODAL -->
                            <div class="modal fade" id="modalGelombang" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
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

                                            <!-- Gelombang 1 -->
                                            <div class="gelombang-item">

                                                <div class="d-flex justify-content-between align-items-center">
                                                    <strong id="gel1" contenteditable="true">
                                                        Gelombang 1
                                                    </strong>

                                                    <span id="status1" contenteditable="true"
                                                        class="badge badge-success"
                                                        style="font-size:14px;padding:8px 12px;">
                                                        Sedang Berlangsung
                                                    </span>
                                                </div>

                                                <small id="tgl1" contenteditable="true" class="text-muted">
                                                    01 - 05 Mei 2026
                                                </small>

                                            </div>

                                            <!-- Gelombang 2 -->
                                            <div class="gelombang-item">

                                                <div class="d-flex justify-content-between align-items-center">
                                                    <strong id="gel2" contenteditable="true">
                                                        Gelombang 2
                                                    </strong>

                                                    <span id="status2" contenteditable="true"
                                                        class="badge badge-secondary"
                                                        style="font-size:14px;padding:8px 12px;">
                                                        Belum Dibuka
                                                    </span>
                                                </div>

                                                <small id="tgl2" contenteditable="true" class="text-muted">
                                                    10 - 15 Juni 2026
                                                </small>

                                            </div>

                                            <!-- Gelombang 3 -->
                                            <div class="gelombang-item">

                                                <div class="d-flex justify-content-between align-items-center">
                                                    <strong id="gel3" contenteditable="true">
                                                        Gelombang 3
                                                    </strong>

                                                    <span id="status3" contenteditable="true"
                                                        class="badge badge-secondary"
                                                        style="font-size:14px;padding:8px 12px;">
                                                        Belum Dibuka
                                                    </span>
                                                </div>

                                                <small id="tgl3" contenteditable="true" class="text-muted">
                                                    01 - 05 Juli 2026
                                                </small>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <script>
                                document.addEventListener("DOMContentLoaded", function () {

                                    const fields = [
                                        'teks-daftar',
                                        'gel1', 'tgl1', 'status1',
                                        'gel2', 'tgl2', 'status2',
                                        'gel3', 'tgl3', 'status3'
                                    ];

                                    fields.forEach(id => {

                                        const el = document.getElementById(id);

                                        if (!el) return;

                                        const saved = localStorage.getItem(id);

                                        if (saved) {
                                            el.innerHTML = saved;
                                        }

                                        el.addEventListener('blur', function () {
                                            localStorage.setItem(id, this.innerHTML);
                                        });

                                    });

                                });
                            </script>

                            <script>
                                const elemenTeks = document.getElementById('teks-daftar');

                                // 1. Ambil teks yang tersimpan saat halaman dibuka
                                if (localStorage.getItem('teksPendaftaran')) {
                                    elemenTeks.innerText = localStorage.getItem('teksPendaftaran');
                                }

                                // 2. Simpan teks otomatis setiap kali pengguna selesai mengetik
                                elemenTeks.addEventListener('input', function () {
                                    localStorage.setItem('teksPendaftaran', elemenTeks.innerText);
                                });
                            </script>
                            <div class="col-lg-4 col-md-12 mt-5 mt-md-0 text-center">
                                <h6 class="font-weight-bold text-capitalize">VERIFIKASI & VALIDASI</h6>
                                <!-- Tambahkan contenteditable="true" dan id pada tag <p> -->
                                <p class="regular text-muted" contenteditable="true" id="editable-text">Verifikasi &
                                    Validasi 16-25 Juni 2026</p>
                            </div>

                            <script>
                                const editableText = document.getElementById('editable-text');

                                // Cek apakah ada teks yang tersimpan sebelumnya saat halaman dibuka
                                if (localStorage.getItem('savedText')) {
                                    editableText.innerText = localStorage.getItem('savedText');
                                }

                                // Simpan teks secara otomatis saat pengguna selesai mengetik (kehilangan fokus)
                                editableText.addEventListener('blur', function () {
                                    localStorage.setItem('savedText', this.innerText);
                                });
                            </script>
                            <div class="col-lg-4 col-md-12 mt-5 mt-lg-0 text-center">
                                <h6 class="font-weight-bold text-capitalize">PENGUMUMAN & DAFTAR ULANG</h6>
                                <p class="regular text-muted" contenteditable="true" id="teks-pengumuman">
                                    Pengumuman 28 Juni & Daftar Ulang 30 Juni-2 Juli 2026
                                </p>
                            </div>
                            <script>
                                // Ambil elemen paragraf berdasarkan ID
                                const teksPengumuman = document.getElementById('teks-pengumuman');

                                // 1. Cek apakah ada teks yang tersimpan di LocalStorage saat halaman dimuat
                                const teksTersimpan = localStorage.getItem('kontenPengumuman');
                                if (teksTersimpan) {
                                    teksPengumuman.innerText = teksTersimpan;
                                }

                                // 2. Simpan teks ke LocalStorage setiap kali pengguna selesai mengubahnya
                                teksPengumuman.addEventListener('blur', function () {
                                    localStorage.setItem('kontenPengumuman', this.innerText);
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </section>


            <section class="py-5 bg-light" id="jurusan">
                <div class="container">

                    <div class="text-center mb-5">
                        <h2 class="font-weight-bold text-success">
                            Alur Pendaftaran
                        </h2>
                        <p class="text-muted">
                            Ikuti langkah-langkah berikut untuk menyelesaikan proses pendaftaran.
                        </p>
                    </div>

                    <div class="row">

                        <div class="row">

                            <!-- Step 1 -->
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card border-0 shadow h-100 text-center">
                                    <div class="card-body">

                                        <div class="badge badge-success mb-3 p-2">
                                            Langkah 1
                                        </div>

                                        <img src="https://wismaagungkedoya.com/wp-content/uploads/2021/06/icon-pendaftaran-png.png"
                                            width="90" class="mb-3">

                                        <h4 class="font-weight-bold">
                                            Registrasi & Login
                                        </h4>

                                        <p class="text-muted">
                                            Calon siswa membuat akun terlebih dahulu kemudian login ke sistem SIPPDB.
                                        </p>

                                    </div>
                                </div>
                            </div>

                            <!-- Step 2 -->
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card border-0 shadow h-100 text-center">
                                    <div class="card-body">

                                        <div class="badge badge-primary mb-3 p-2">
                                            Langkah 2
                                        </div>

                                        <img src="https://cdn-icons-png.freepik.com/512/10551/10551890.png" width="90"
                                            class="mb-3">

                                        <h4 class="font-weight-bold">
                                            Upload Bukti Pembayaran
                                        </h4>

                                        <p class="text-muted">
                                            Peserta yang telah melakukan pembayaran biaya pendaftaran sebesar Rp150.000
                                            diwajibkan mengunggah bukti pembayaran melalui sistem untuk diverifikasi
                                            oleh panitia PPDB.
                                        </p>

                                    </div>
                                </div>
                            </div>

                            <!-- Step 3 -->
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card border-0 shadow h-100 text-center">
                                    <div class="card-body">

                                        <div class="badge badge-warning mb-3 p-2">
                                            Langkah 3
                                        </div>

                                        <img src="https://smkn1yogya.sch.id/wp-content/uploads/2018/07/formulir-icon-300x282.png"
                                            width="90" class="mb-3">

                                        <h4 class="font-weight-bold">
                                            Isi Formulir
                                        </h4>

                                        <p class="text-muted">
                                            Lengkapi seluruh data diri, data orang tua, dan data sekolah asal pada
                                            formulir pendaftaran.
                                        </p>

                                    </div>
                                </div>
                            </div>

                            <!-- Step 4 -->
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card border-0 shadow h-100 text-center">
                                    <div class="card-body">

                                        <div class="badge badge-danger mb-3 p-2">
                                            Langkah 4
                                        </div>

                                        <img src="https://cdn-icons-png.freepik.com/512/564/564793.png" width="90"
                                            class="mb-3">

                                        <h4 class="font-weight-bold">
                                            Upload Berkas
                                        </h4>

                                        <p class="text-muted">
                                            Upload dokumen yang dipersyaratkan seperti KK, Akta Kelahiran, dan berkas
                                            pendukung lainnya.
                                        </p>

                                    </div>
                                </div>
                            </div>

                            <!-- Step 5 -->
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card border-0 shadow h-100 text-center">
                                    <div class="card-body">

                                        <div class="badge badge-secondary mb-3 p-2">
                                            Langkah 5
                                        </div>

                                        <img src="https://cdn-icons-png.flaticon.com/512/3145/3145765.png" width="90"
                                            class="mb-3">

                                        <h4 class="font-weight-bold">
                                            Tes Al-Qur'an
                                        </h4>

                                        <p class="text-muted">
                                            Peserta mengikuti tes membaca Al-Qur'an sesuai jadwal yang telah ditentukan
                                            oleh panitia PPDB.
                                        </p>

                                    </div>
                                </div>
                            </div>

                            <!-- Step 6 -->
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card border-0 shadow h-100 text-center">
                                    <div class="card-body">

                                        <div class="badge badge-dark mb-3 p-2">
                                            Langkah 6
                                        </div>

                                        <img src="https://cdn-icons-png.flaticon.com/512/1995/1995574.png" width="90"
                                            class="mb-3">

                                        <h4 class="font-weight-bold">
                                            Wawancara
                                        </h4>

                                        <p class="text-muted">
                                            Peserta mengikuti wawancara sebagai bagian dari proses seleksi penerimaan
                                            peserta didik baru.
                                        </p>

                                    </div>
                                </div>
                            </div>

                            <!-- Step 7 -->
                            <div class="col-lg-12 col-md-12 mb-4">
                                <div class="card border-0 shadow h-100 text-center">
                                    <div class="card-body">

                                        <div class="badge badge-info mb-3 p-2">
                                            Langkah 7
                                        </div>

                                        <img src="https://elzawa.uin-malang.ac.id/wp-content/uploads/2020/02/pengumuman.png"
                                            width="90" class="mb-3">

                                        <h4 class="font-weight-bold">
                                            Pengumuman
                                        </h4>

                                        <p class="text-muted">
                                            Hasil seleksi akan diumumkan melalui sistem SIPPDB setelah seluruh tahapan
                                            seleksi selesai dilaksanakan.
                                        </p>

                                    </div>
                                </div>
                            </div>

                        </div>
            </section>


            <section class="py-5 bg-white" id="jalur-masuk">
                <div class="container">

                    <div class="text-center mb-5">
                        <h2 class="font-weight-bold text-success">
                            Informasi Jalur Masuk
                        </h2>
                        <p class="text-muted">
                            SIPPDB SMK Ma'arif NU Kota Batam menyediakan 3 jalur penerimaan peserta didik baru.
                        </p>
                    </div>

                    <div class="row">

                        <!-- Prestasi -->
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card border-0 shadow h-100 text-center">
                                <div class="card-body">

                                    <img src="https://cdn-icons-png.freepik.com/512/9512/9512451.png" width="90"
                                        class="mb-3">

                                    <h4 class="font-weight-bold text-primary">
                                        Jalur Prestasi
                                    </h4>

                                    <p class="text-muted">
                                        Diperuntukkan bagi calon peserta didik yang memiliki prestasi
                                        akademik maupun non-akademik yang dibuktikan dengan dokumen pendukung.
                                    </p>

                                </div>
                            </div>
                        </div>

                        <!-- Domisili -->
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card border-0 shadow h-100 text-center">
                                <div class="card-body">

                                    <img src="https://storage-api.cimahikota.go.id/lapakami/assets/icon/22df49ef96ded10bb9a3a90295d8bdb0.png"
                                        width="90" class="mb-3">

                                    <h4 class="font-weight-bold text-warning">
                                        Jalur Domisili
                                    </h4>

                                    <p class="text-muted">
                                        Diperuntukkan bagi calon peserta didik yang berdomisili sesuai
                                        ketentuan wilayah yang telah ditetapkan.
                                    </p>

                                </div>
                            </div>
                        </div>

                        <!-- Afirmasi -->
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card border-0 shadow h-100 text-center">
                                <div class="card-body">

                                    <img src="https://cdn-icons-png.freepik.com/256/18516/18516996.png?semt=ais_white_label"
                                        width="90" class="mb-3">

                                    <h4 class="font-weight-bold text-success">
                                        Jalur Afirmasi
                                    </h4>

                                    <p class="text-muted">
                                        Diperuntukkan bagi calon peserta didik dari keluarga kurang mampu
                                        atau kategori khusus sesuai ketentuan yang berlaku.
                                    </p>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </section>


            <!-- Superiority -->
            <!-- PROFIL SEKOLAH -->
            <section id="features" class="py-5 bg-light">
                <div class="container">

                    <!-- Judul -->
                    <div class="text-center mb-5">
                        <h2 class="font-weight-bold text-success">
                            Profil Sekolah
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

                    <!-- Foto + Visi Misi -->
                    <div class="row align-items-center">

                        <!-- Foto Sekolah -->
                        <div class="col-lg-5 mb-4">

                            <img src="whatsapp-banner.jpeg" alt="SMK Ma'arif NU Batam" class="img-fluid rounded shadow">

                        </div>

                        <!-- Visi Misi -->
                        <div class="col-lg-7">
                            <div class="card border-0 shadow h-100">
                                <div class="card-body">

                                    <h4 class="font-weight-bold text-success mb-3">Visi & Misi</h4>

                                    <p class="text-muted">
                                        Menjadi sekolah unggulan yang berjiwa nasional, berwawasan global yang
                                        menyiapkan generasi muslim terampil dan berahlak mulia.
                                    </p>

                                    <h5 class="font-weight-bold text-success mt-4 mb-3">Misi</h5>

                                    <ul class="list-unstyled">
                                        <li class="mb-4 d-flex">
                                            <i class="fas fa-seedling text-success mt-1 mr-3"></i>
                                            <span>Membentuk tamatan yang beriman, berkemampuan unggul, dan mampu
                                                mengembangkan diri.</span>
                                        </li>

                                        <li class="mb-4 d-flex">
                                            <i class="fas fa-seedling text-success mt-1 mr-3"></i>
                                            <span>Menyiapkan tenaga kerja menengah yang terampil dan profesional di
                                                bidang keahlian yang dipilihnya.</span>
                                        </li>

                                        <li class="mb-4 d-flex">
                                            <i class="fas fa-seedling text-success mt-1 mr-3"></i>
                                            <span>Menjadikan SMK sebagai sumber informasi di bidang pekerjaan jasa yang
                                                sesuai dengan program keahlian yang dipilihnya.</span>
                                        </li>

                                        <li class="d-flex">
                                            <i class="fas fa-seedling text-success mt-1 mr-3"></i>
                                            <span>Menjadikan SMK yang mampu menciptakan SDM yang mampu bersaing di dunia
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

                </div>
            </section>


            <section class="py-5 bg-light" id="testimonials">
                <div class="container">

                    <div class="text-center mb-5">
                        <h2 class="font-weight-bold text-success">
                            Pembagian Jalur Masuk
                        </h2>
                        <p class="text-muted">
                            Pilih jalur pendaftaran sesuai dengan kriteria calon peserta didik.
                        </p>
                    </div>

                    <div class="row">

                        <!-- Prestasi -->
                        <div class="col-lg-4 mb-4">
                            <div class="card border-0 shadow h-100 text-center">
                                <div class="card-body">

                                    <img src="https://cdn-icons-png.freepik.com/512/9512/9512451.png" width="90"
                                        class="mb-3">

                                    <h4 class="font-weight-bold text-primary">
                                        Prestasi
                                    </h4>

                                    <hr>

                                    <p class="text-muted text-justify">
                                        Jalur prestasi diperuntukkan bagi calon siswa yang memiliki
                                        nilai rapor dan prestasi akademik maupun non akademik yang
                                        dibuktikan dengan sertifikat atau piagam yang sah.
                                    </p>

                                </div>
                            </div>
                        </div>

                        <!-- Afirmasi -->
                        <div class="col-lg-4 mb-4">
                            <div class="card border-0 shadow h-100 text-center">
                                <div class="card-body">

                                    <img src="https://cdn-icons-png.freepik.com/256/18516/18516996.png?semt=ais_white_label"
                                        width="90" class="mb-3">

                                    <h4 class="font-weight-bold text-success">
                                        Afirmasi
                                    </h4>

                                    <hr>

                                    <p class="text-muted text-justify">
                                        Jalur afirmasi diperuntukkan bagi calon siswa dari keluarga
                                        kurang mampu atau penyandang disabilitas dengan melampirkan
                                        dokumen pendukung seperti KIP, PKH, KKS, atau bantuan sosial lainnya.
                                    </p>

                                </div>
                            </div>
                        </div>

                        <!-- Domisili -->
                        <div class="col-lg-4 mb-4">
                            <div class="card border-0 shadow h-100 text-center">
                                <div class="card-body">

                                    <img src="https://storage-api.cimahikota.go.id/lapakami/assets/icon/22df49ef96ded10bb9a3a90295d8bdb0.png"
                                        width="90" class="mb-3">

                                    <h4 class="font-weight-bold text-warning">
                                        Domisili
                                    </h4>

                                    <hr>

                                    <p class="text-muted text-justify">
                                        Jalur domisili diperuntukkan bagi calon siswa yang berdomisili
                                        di wilayah tertentu sesuai dengan ketentuan yang berlaku dan
                                        dibuktikan dengan Kartu Keluarga.
                                    </p>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </section>

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