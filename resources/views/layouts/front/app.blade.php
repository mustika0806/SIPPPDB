<!DOCTYPE html>
<html lang="zxx">

<head>
    <!--Meta Tags-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <!--Favicons-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('sekolah3-bg.png') }}" />

    <!--Page Title-->
    <title>SIPPDB</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ url('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Google Font  -->
    <link
        href="https://fonts.googleapis.com/css?family=Dosis:300,400,500,600,700,800|Roboto:300,400,400i,500,500i,700,700i,900,900i"
        rel="stylesheet">
    <!-- Icofont CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/icofont.min.css') }}">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/meanmenu.min.css') }}">
    <!--- owl carousel Css-->
    <link rel="stylesheet" href="{{ url('assets/owlcarousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/owlcarousel/css/owl.theme.default.min.css') }}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/animate.css') }}">
    <!-- venobox -->
    <link rel="stylesheet" href="{{ url('assets/venobox/css/venobox.min.css') }}" />
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <!-- Responsive  CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/responsive.css') }}">
</head>

<body id="main">

    @include('layouts.front.navbar')

    @yield('content')

<!-- ***** Contact Us Start ***** -->
<section class="py-5" id="contact-us" style="background: #7BC8A4;">

    <style>
        #contact-us {
            padding-top: 80px !important;
            padding-bottom: 80px !important;
        }

        #contact-us .contact-title {
            font-size: 34px;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 12px;
        }

        #contact-us .contact-subtitle {
            color: #ffffff;
            font-size: 15px;
            margin-bottom: 0;
        }

        #contact-us .contact-card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 10px 28px rgba(0, 0, 0, 0.12);
            height: 100%;
            background: #ffffff;
        }

        #contact-us .contact-card .card-body {
            padding: 30px;
        }

        #contact-us .contact-card h5 {
            font-weight: 700;
            color: #198754;
            margin-bottom: 22px;
        }

        #contact-us .contact-item {
            margin-bottom: 18px;
            font-size: 14px;
            color: #333;
        }

        #contact-us .contact-item strong {
            color: #222;
        }

        #contact-us .contact-item a {
            color: #198754;
            font-weight: 700;
            text-decoration: underline;
        }

        #contact-us label {
            font-size: 14px;
            font-weight: 600;
            color: #333;
            margin-bottom: 6px;
        }

        #contact-us .form-control {
            border-radius: 12px;
            border: 1px solid #dddddd;
            padding: 12px 15px;
            font-size: 14px;
            box-shadow: none;
        }

        #contact-us .form-control:focus {
            border-color: #198754;
            box-shadow: none;
        }

        #contact-us textarea.form-control {
            resize: vertical;
        }

        #contact-us .btn-kirim {
            border-radius: 25px;
            padding: 10px 28px;
            font-weight: 600;
            background: #198754;
            border: none;
            color: #ffffff;
        }

        #contact-us .btn-kirim:hover {
            background: #146c43;
            color: #ffffff;
        }

        #contact-us .alamat-card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 10px 28px rgba(0, 0, 0, 0.12);
            background: #ffffff;
        }

        #contact-us .alamat-card h5 {
            font-weight: 700;
            color: #198754;
        }

        #contact-us .alamat-card p {
            color: #666;
            margin-bottom: 0;
        }
    </style>

    <div class="container">

        <!-- Judul Section -->
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2 class="contact-title">
                    Hubungi Kami
                </h2>

                <p class="contact-subtitle">
                    Silakan hubungi panitia PPDB SMKS Ma'arif NU Kota Batam untuk informasi lebih lanjut.
                </p>
            </div>
        </div>

        <div class="row justify-content-center">

            <!-- Kontak Panitia -->
            <div class="col-lg-5 col-md-12 mb-4">
                <div class="card contact-card">
                    <div class="card-body">

                        <h5>
                            Kontak Panitia PPDB
                        </h5>

                        <div class="contact-item">
                            <strong>CS 1 - SMK Ma'arif Batam Official</strong><br>
                            <a href="https://wa.me/6285150000552" target="_blank">
                                0851-500-0552
                            </a>
                        </div>

                        <div class="contact-item">
                            <strong>CS 2 - Ibu Nopvia Kristiningrum</strong><br>
                            <a href="https://wa.me/6281216354574" target="_blank">
                                0812-1635-4574
                            </a>
                        </div>

                        <div class="contact-item">
                            <strong>CS 3 - Ibu Eppi</strong><br>
                            <a href="https://wa.me/6285345153707" target="_blank">
                                0853-4515-3707
                            </a>
                        </div>

                        <div class="contact-item">
                            <strong>CS 4 - Ibu Destita</strong><br>
                            <a href="https://wa.me/6282388652410" target="_blank">
                                0823-8865-2410
                            </a>
                        </div>

                        <hr>

                        <div class="contact-item mb-0">
                            <strong>Website Sekolah</strong><br>
                            <a href="https://smkmaarifnubatam.sch.id" target="_blank">
                                smkmaarifnubatam.sch.id
                            </a>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Form Pesan -->
            <div class="col-lg-7 col-md-12 mb-4">
                <div class="card contact-card">
                    <div class="card-body">

                        <h5>
                            Kirim Pesan ke Panitia
                        </h5>

                        <form id="contactForm" onsubmit="kirimWhatsapp(event)">

                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input name="name"
                                       type="text"
                                       class="form-control"
                                       id="name"
                                       placeholder="Masukkan nama lengkap"
                                       required>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_wa">Nomor WhatsApp</label>
                                        <input name="no_wa"
                                               type="text"
                                               class="form-control"
                                               id="no_wa"
                                               placeholder="Contoh: 081234567890"
                                               required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Alamat Email</label>
                                        <input name="email"
                                               type="email"
                                               class="form-control"
                                               id="email"
                                               placeholder="Masukkan alamat email"
                                               required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="message">Pesan</label>
                                <textarea name="message"
                                          rows="5"
                                          class="form-control"
                                          id="message"
                                          placeholder="Tulis pesan atau pertanyaan Anda"
                                          required></textarea>
                            </div>

                            <button type="submit" class="btn btn-kirim">
                                Kirim Pesan
                            </button>

                        </form>

                    </div>
                </div>
            </div>

        </div>

        <!-- Alamat Sekolah -->
        <div class="row justify-content-center mt-2">
            <div class="col-lg-12">
                <div class="card alamat-card">
                    <div class="card-body text-center p-4">

                        <h5 class="mb-3">
                            Alamat Sekolah
                        </h5>

                        <p>
                            Jl. Marina, depan Perum Kotamas Marina,
                            Kel. Tanjung Riau, Kec. Sekupang,
                            Kota Batam, Kepulauan Riau.
                        </p>

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- ***** Contact Us End ***** -->

<script>
    function kirimWhatsapp(event) {
        event.preventDefault();

        var name = document.getElementById('name').value.trim();
        var noWa = document.getElementById('no_wa').value.trim();
        var email = document.getElementById('email').value.trim();
        var message = document.getElementById('message').value.trim();

        if (name === '' || noWa === '' || email === '' || message === '') {
            alert('Mohon lengkapi semua data terlebih dahulu.');
            return false;
        }

        var nomorPanitia = '6285150000552';

        var isiPesan =
            "Assalamu'alaikum Buk.\n\n" +
            "Perkenalkan, saya " + name + ". Saya ingin bertanya terkait informasi PPDB SMKS Ma'arif NU Kota Batam.\n\n" +
            "Nama: " + name + "\n" +
            "No. WhatsApp: " + noWa + "\n" +
            "Email: " + email + "\n\n" +
            "Pertanyaan/Pesan:\n" + message + "\n\n" +
            "Mohon informasinya, Buk. Terima kasih.\n\n" +
            "Wassalamu'alaikum.";

        var url = "https://wa.me/" + nomorPanitia + "?text=" + encodeURIComponent(isiPesan);

        window.open(url, "_blank");

        return false;
    }
</script>

    <!--============================
    =            Footer            =
    =============================-->
    <footer>
        <div class="footer-main bg-light px-0 pb-3 pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1 col-md-12"></div>
                    <div class="col-lg-5 col-md-5 m-md-auto align-self-center">
                        <div class="block m-auto">
                            <a href="#"><img
                                    src="https://png.pngtree.com/png-clipart/20230330/original/pngtree-follow-us-on-instagram-social-media-label-button-with-promotion-icon-png-image_9012907.png"
                                    alt="footer-logo" width="125" class="ml-2"></a>
                            <!-- Social Site Icons -->
                            <ul class="social-icon list-inline pl-4">
                                <li class="list-inline-item">
                                    <img src="https://www.edigitalagency.com.au/wp-content/uploads/Instagram-logo-webp-medium-size.webp"
                                        width="35px">
                                </li>
                                <li class="list-inline-item">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Facebook_f_logo_%282019%29.svg/1280px-Facebook_f_logo_%282019%29.svg.png"
                                        width="35px">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-5 col-12 mt-sm-5 mt-3 mt-lg-0 pl-4 pl-md-0">
                        <div class="block-2">
                            <!-- heading -->
                            <!-- links -->
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-7 mt-sm-5 mt-3 mt-lg-0 pl-4 pl-md-0">
                        <div class="block-2">
                            <!-- heading -->
                            <h6 class="text-dark">Kontak Sekolah</h6>
                            <!-- links -->
                            <ul>
                                <li class="font-weight-bold">+62851-5000-0552</li>
                                <li>Alamat<br />
                                    Jl. Marina (Depan Perumahan Kota Mas) <br />
                                    Tanjung. Riau, Sekupang<br />
                                    Kota Batam, Kepulauan Riau</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- START FOOTER -->
    <footer class="footer-section">
        <div id="bottom-footer" class="bg-gray">
            <div class="auto-container">
                <div class="row mb-lg-0 mb-md-4 mb-4">
                    <div class="col-lg-6 col-md-12 col-12">
                        <p class="copyright-text">Copyright © {{ date('Y') }} <a href="{{ route('home') }}">SMK
                                Ma'arif NU Batam</a> | All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- END FOOTER -->

    <!-- Latest jQuery -->
    <script src="{{ url('assets/js/jquery-2.2.4.min.js') }}"></script>
    <!-- popper js -->
    <script src="{{ url('assets/bootstrap/js/popper.min.js') }}"></script>
    <!-- Latest compiled and minified Bootstrap -->
    <script src="{{ url('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Meanmenu Js -->
    <script src="{{ url('assets/js/jquery.meanmenu.js') }}"></script>
    <!-- Sticky JS -->
    <script src="{{ url('assets/js/jquery.sticky.js') }}"></script>
    <!-- owl-carousel min js  -->
    <script src="{{ url('assets/owlcarousel/js/owl.carousel.min.js') }}"></script>
    <!-- isotope js -->
    <script src="{{ url('assets/js/isotope.3.0.6.min.js') }}"></script>
    <!-- venobox js -->
    <script src="{{ url('assets/venobox/js/venobox.min.js') }}"></script>
    <!-- jquery appear js  -->
    <script src="{{ url('assets/js/jquery.appear.js') }}"></script>
    <!-- countTo js -->
    <script src="{{ url('assets/js/jquery.inview.min.js') }}"></script>
    <!-- scrolltopcontrol js -->
    <script src="{{ url('assets/js/scrolltopcontrol.js') }}"></script>
    <!-- WOW - Reveal Animations When You Scroll -->
    <script src="{{ url('assets/js/wow.min.js') }}"></script>
    <!-- scripts js -->
    <script src="{{ url('assets/js/scripts.js') }}"></script>
</body>

</html>
