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

            <title>SIPPDB SMK MA'arif NU Batam</title>

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

            <!-- ***** Preloader Start ***** -->
            <div id="preloader">
                <div class="jumper">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
            <!-- ***** Preloader End ***** -->


            <div class="modal" id="success-msg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content p-0 m-0">

                        <div class="modal-body">
                            <div class="alert alert-success mb-0 text-center" role="alert"
                                style="height: fit-content;">
                                Pesan telah berhasil dikirim!
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ***** Header Area Start ***** -->
            <header class="header-area header-sticky">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <nav class="main-nav">
                                <!-- ***** Logo Start ***** -->
                                <a href="/" class="logo">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRBqz_N0J0bUGFQnLZihDE8REdidm_DDnaJXQ&s"
                                        alt="" height="30px" />
                                </a>
                                <!-- ***** Logo End ***** -->
                                <!-- ***** Menu Start ***** -->
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
                                <!-- ***** Menu End ***** -->
                            </nav>
                        </div>
                    </div>
                </div>
            </header>
            <!-- ***** Header Area End ***** -->

            <!--====================================
    =            Hero Section            =
    =====================================-->
            <section class="gradient-banner"
                style="background-image: linear-gradient(
        rgba(0,0,0,0.6),
        rgba(0,0,0,0.6)
        ),
        url('https://cdn-sekolah.annibuku.com/69944259/2.jpg'); background-repeat:no-repeat; background-size:cover">

                <div class="container mt-4" id="beranda">
                    <div class="row align-items-center">
                        <div class="col-12 order-2 order-md-1 text-center text-md-left mt-5">
                            <h2 class="text-white font-weight-bold mb-3">SIPPDB TA 2025-2026<br>SMK Ma'arif NU Batam
                            </h2>
                            <p class="text-white mb-5">Ayo! segera daftarkan dirimu ke SMK Ma'arif NU Batam <br>dengan
                                cara
                                klik
                                <b>PENDAFTARAN SIPPDB</b> dibawah ini! <br><strong>"Menjadi Generasi Muslim yang Cerdas,
                                    Terampil, dan Berakhlakul Karimah"</strong>
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
                            <div class="col-lg-4 col-md-6 mt-0 text-center">
                                <h3 class="font-weight-bold text-capitalize h5 ">PENDAFTARAN</h3>
                                <p class="regular text-muted">Pendaftaran 11-15 Juni 2026</p>
                            </div>
                            <div class="col-lg-4 col-md-6 mt-5 mt-md-0 text-center">
                                <h3 class="font-weight-bold text-capitalize h5 ">VERIVIKASI & VALIDASI</h3>
                                <p class="regular text-muted">verivikasi & Validasi 16-25 Juni 2026</p>
                            </div>
                            <div class="col-lg-4 col-md-12 mt-5 mt-lg-0 text-center">
                                <h3 class="font-weight-bold text-capitalize h5 ">PENGUMUMAN & Daftar Ulang</h3>
                                <p class="regular text-muted">Pengumuman 28 Juni & Daftar Ulang 30 Juni-2 Juli 2026</p>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="mt-0 padding-bottom-0 pl-0 pr-0 pb-0 pt-3 pt-sm-0" id="jurusan">
                <div class="related mt-sm-5 mt-3 mb-sm-5 mb-3 px-5">
                    <h2 class="pl-3 font-weight-bold">Alur Pendaftaran</h2>
                    <div class="slick-cultivar mt-4 text-align-center">
                        <a href="" class="cardd align-items-center text-decoration-none">

                            <div class="catagory">
                                <img src="https://wismaagungkedoya.com/wp-content/uploads/2021/06/icon-pendaftaran-png.png"
                                    width="90px" class="font-weight-bold " style="color: #02225B;"></>
                            </div>
                            <div class="name">
                                <h4 style="color: #0E0E0E; font-weight: 600;">Registrasi & Login Akun</h4>
                            </div>
                            <div class="desc pe-4 " style="color: #0c0c0c;">
                                <strong>Keterangan</strong><br> Pengguna wajib melakukan registrasi akun untuk bisa
                                login
                                ke sistem SIPPDB melakukan pendaftaran.
                            </div>


                        </a>
                        <a href="" class="cardd  align-items-center text-decoration-none">

                            <div class="catagory">
                                <img src="https://smkn1yogya.sch.id/wp-content/uploads/2018/07/formulir-icon-300x282.png"
                                    width="90px" class="font-weight-bold" style="color: #02225B;"></>
                            </div>
                            <div class="name">
                                <h4 style="color: #0E0E0E; font-weight: 600;">Mengisi Formulir</h4>
                            </div>
                            <div class="desc pe-4" style="color: #0c0c0c;">
                                <strong>Keterangan</strong> <br>Setelah melakukan registrasi akun dan login tahap
                                selanjutnya adalah pengguna menginput atau mengisi pada halaman pendaftaran di menu
                                pendaftaran.
                            </div>


                        </a>
                        <a href="" class="cardd  align-items-center text-decoration-none">

                            <div class="catagory">
                                <img src="https://cdn-icons-png.freepik.com/512/564/564793.png" width="90px"
                                    class="font-weight-bold" style="color: #02225B;"></>
                            </div>
                            <div class="name">
                                <h4 style="color: #0E0E0E; font-weight: 600;">Upload Berkas</h4>
                            </div>
                            <div class="desc pe-4" style="color: #060606;">
                                <strong>Keterangan</strong> <br> Setelah Melakukan Pengisian pada halaman pendaftaran
                                pengguna bisa
                                melakukan
                                upload
                                berkas yang telah ditentukan oleh pihak sekolah.
                            </div>


                        </a>
                        <a href="" class="cardd  align-items-center text-decoration-none">

                            <div class="catagory">
                                <img src="https://cdn-icons-png.freepik.com/512/10551/10551890.png" width="90px"
                                    class="font-weight-bold" style="color: #02225B;"></>
                            </div>
                            <div class="name">
                                <h4 style="color: #0E0E0E; font-weight: 600;">Pembayaran Online</h4>
                            </div>
                            <div class="desc pe-4" style="color: #070707;">
                                <strong>Keterangan</strong> <br> Setelah melakukan pengisian di halaman pendaftaran dan
                                upload berkas
                                selanjutnya pengguna akan diarahkan untuk melakukan pembayaran online atau payment
                                gateway
                                Sebesar 200.000 dengan menggunakan sistem Scan QRBARCODE yang sudah terintegrasi dengan
                                kode transaksi dan data pembayaran.
                            </div>


                        </a>
                        <a href="" class="cardd  align-items-center text-decoration-none">

                            <div class="catagory">
                                <img src="https://elzawa.uin-malang.ac.id/wp-content/uploads/2020/02/pengumuman.png"
                                    width="90px" class="font-weight-bold" style="color: #02225B;"></>
                            </div>
                            <div class="name">
                                <h4 style="color: #0E0E0E; font-weight: 600;">Pengumuman</h4>
                            </div>
                            <div class="desc pe-4" style="color: #080808;">
                                <strong>Keterangan</strong> <br> Tahap akhir dari alur pendaftaran adalah pengumuman
                            </div>

                        </a>
                    </div>
                </div>
            </section>


            <section class="mt-0 padding-bottom-0 pl-0 pr-0 pb-0 pt-3 pt-sm-0" id="jurusan">
                <div class="related mt-sm-5 mt-3 mb-sm-5 mb-3 px-5">
                    <h2 class="pl-3 font-weight-bold">Informasi Jalur Masuk</h2>
                    <div class="slick-cultivar mt-4 text-align-center">
                        <a href="" class="cardd align-items-center text-decoration-none">

                            <div class="catagory">
                                <img src="https://cdn-icons-png.freepik.com/256/6801/6801845.png?semt=ais_white_label"
                                    width="90px" class="font-weight-bold " style="color: #02225B;"></>
                            </div>
                            <div class="name">
                                <h4 style="color: #0E0E0E; font-weight: 600;">Informasi</h4>
                            </div>
                            <div class="desc pe-4 " style="color: #050505;">
                                <strong>Keterangan</strong><br> Jalur Masuk SIPPDB dibagi menjadi 3 Jalur yaitu
                                Prestasi,
                                Domisili dan Jalur Afirmasi.
                            </div>
                        </a>
                    </div>
                </div>
            </section>


            <!-- Superiority -->
            <section class="mt-0 pl-0 pr-0 pb-0 pt-3 pt-sm-0" id="features">
                <div class="wrapperInfo mt-sm-5 mt-3 mb-sm-5 mb-3">
                    <h2 class="pl-3 font-weight-bold">Profil Sekolah</h2>
                    <div class="row">
                        <div class="col-12 col-lg-6 content-col">
                            <div class="imagesWrapper">
                                <img src="https://cdn-sekolah.annibuku.com/69944259/2.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="row content">
                                <div class="col-6">
                                    <iframe width="560" height="315"
                                        src="https://www.youtube.com/embed/ahNK-Z45efU?si=Xvrpltklp1Sl07EI"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                </div>
                                <div class="col-6 wrapperText">
                                    <div class="text">
                                        <h5 class="font-weight-bold" style="color: #fdd818;">Visi & Misi
                                        </h5>
                                        <p class="text-white">bertujuan membentuk generasi berakhlak mulia, cerdas,
                                            berdaya
                                            saing global, dan mandiri berlandaskan paham Islam Ahlussunnah Waljama'ah
                                            melalui
                                            kompetensi keahlian Multimedia dan Tata Kelola Logistik</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row content">
                                <div class="col-6 wrapperText">
                                    <div class="text">
                                        <h5 class="font-weight-bold" style="color: #fdd818">Motto atau Semboyan SMK
                                            Ma'arif NU
                                            Batam</h5>
                                        <p class="text-white">Motto atau semboyan yang digunakan oleh SMK Ma'arif NU
                                            Batam
                                            adalah "SMK Bisa !!! SMK Hebat !!!"</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <iframe width="560" height="315"
                                        src="https://www.youtube.com/embed/wZdrD0dGp6w?si=xUFJ44KHnVj9UDV7"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



            <section class="mt-0 pb-0 pt-2" id="testimonials">
                <div class="timeline-carousel">
                    <h2 class="font-weight-bold">Pembagian Jalur Masuk</h2>
                    <div class="timeline-carousel__item-wrapper" data-js="timeline-carousel">
                        <!--Timeline item-->
                        <div class="timeline-carousel__item">
                            <div class="timeline-carousel__item-inner">
                                <img src="https://cdn-icons-png.freepik.com/512/9512/9512451.png" width="90px">
                                <span class="name">Prestasi</span>
                                <p>Diperuntukan bagi calon murid jenjang SMK yang sistem penilainnya mempertimbangkan :
                                    Nilai rapor murid dari sekolah asal yang merupakan gabungan rerata nilai rapor
                                    semester
                                    1
                                    sampai dengan semester 5
                                    Prestasi di bidang akademik dan non akademik yang diakui dan diperhitungkan adalah
                                    prestasi
                                    dari kejuaraan/lomba yang diperoleh dengan predikat yang paling tinggi, diterbitkan
                                    paling
                                    singkat 6 (enam) bulan dan paling lama 3 (tiga) tahun sebelum tanggal pendaftaran
                                    SPMB,
                                    yang
                                    diselenggarakan oleh Instansi dari Pemerintah di tingkat
                                    Kabupaten/Kota/Provinsi/Pusat
                                    atau
                                    oleh Lembaga Negara lainnya atau oleh Asosiasi di Bidang Sains/Olahraga/Seni resmi
                                    yang
                                    diakui Negara atau oleh KONI atau oleh Lembaga Berbadan Hukum yang bekerjasama
                                    dengan
                                    Pemerintah Kabupaten/Kota/Provinsi/Pusat untuk Prestasi di tingkat Kabupaten/Kota,
                                    tingkat
                                    Provinsi.</p>
                            </div>
                        </div>
                        <!--/Timeline item-->

                        <!--Timeline item-->
                        <div class="timeline-carousel__item">
                            <div class="timeline-carousel__item-inner">
                                <img src="https://cdn-icons-png.freepik.com/256/18516/18516996.png?semt=ais_white_label"
                                    width="90px">
                                <span class="name">Afirmasi</span>
                                <p>Diperuntukkan bagi calon murid baru jenjang SMK yang berasal dari keluarga tidak
                                    mampu
                                    dan
                                    penyandang disabilitas dengan dibuktikan dengan Kartu Indonesia Pintar (KIP), Kartu
                                    Keluarga
                                    Sejahtera (KKS), Program Keluarga Harapan (PKH), Kartu Bantuan Pangan Non Tunai
                                    (KBPNT),
                                    Program bantuan Pemerintah Daerah lainnya sebagai bukti keikutsertaan program
                                    penanganan
                                    keluarga tidak mampu dari Pemerintah pusat atau Pemerintah daerah serta wajib
                                    menyertakan
                                    surat pernyataan dari orang tua/wali murid yang menyatakan bersedia diproses secara
                                    hukum
                                    jika terbukti memalsukan bukti keikutsertaan dalam program penanganan keluarga tidak
                                    mampu.
                                </p>
                            </div>
                        </div>
                        <!--/Timeline item-->

                        <!--Timeline item-->
                        <div class="timeline-carousel__item">
                            <div class="timeline-carousel__item-inner">
                                <img src="https://storage-api.cimahikota.go.id/lapakami/assets/icon/22df49ef96ded10bb9a3a90295d8bdb0.png"
                                    width="90px">
                                <span class="name">Domisili</span>
                                <p>Diperuntukkan bagi calon murid baru jenjang SMK yang berdomisili di wilayah Kelurahan
                                    yang
                                    sama dengan Kelurahan SMK tersebut berdasarkan alamat pada Kartu Keluarga yang
                                    diterbitkan
                                    paling singkat 1 (satu) tahun sebelum tanggal pendaftaran SIPPDB 2026.</p>
                            </div>
                        </div>
                        <!--/Timeline item-->
                    </div>
                </div>
                <!--Timeline carousel-->
            </section>

            <!-- To Top -->
            <div class="scroll-top-to">
                <i class="ti-angle-up"></i>
            </div>

            <!-- JAVASCRIPTS -->
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
                integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
                integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
            </script>
            <script src="https://ppdb.smkwikrama.sch.id/assets/template/plugins/jquery/jquery.min.js"></script>
            <script src="https://ppdb.smkwikrama.sch.id/assets/template/plugins/bootstrap/bootstrap.min.js"></script>
            <script src="https://ppdb.smkwikrama.sch.id/assets/template/plugins/slick/slick.min.js"></script>
            <script src="https://ppdb.smkwikrama.sch.id/assets/template/plugins/fancybox/jquery.fancybox.min.js"></script>
            <script src="https://ppdb.smkwikrama.sch.id/assets/template/plugins/syotimer/jquery.syotimer.min.js"></script>
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

                $('#contact').submit(function(e) {
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
                            setTimeout(function() {
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
                $.js = function(el) {
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
