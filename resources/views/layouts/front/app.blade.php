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
    <section class="px-0 py-5" style="background: #7BC8A4" id="contact-us">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title font-weight-bold text-white">Hubungi Kami</h2>
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->
            <div class="row mt-3">
                <!-- ***** Contact Text Start ***** -->
                <div class="col-lg-4 col-md-6 col-sm-12 mb-5">
                    <h5 class="text-white font-weight-bold">Kontak Pendaftaran</h5>
                    <div class="contact-text">
                        <p class="text-white">3W6J+CR3, Tj. Riau, Kec. Sekupang, Kota Batam, Kepulauan Riau
                            <br>https://smkmaarifbatam.sch.id
                        </p>
                        <p class="text-white">CS 1 : <a
                                style="text-decoration: underline !important; font-weight: bold !important"
                                href="https://wa.me/6281220001409">hubungi kami (klik disini)</a>
                            <br>CS 2 : <a style="text-decoration: underline !important; font-weight: bold !important"
                                href="https://wa.me/+6281216354574">hubungi kami (klik disini)</a>
                            <br>CS 3 : <a style="text-decoration: underline !important; font-weight: bold !important"
                                href="https://wa.me/+6282388920551">hubungi kami (klik disini)</a>
                        </p>
                    </div>
                </div>

                <!-- ***** Contact Text End ***** -->

                <!-- ***** Contact Form Start ***** -->
                <div class="col-lg-8 col-md-6 col-sm-12">
                    <div class="contact-form">
                        <form id="contact" method="POST">

                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset>
                                        <input name="name" type="text" class="form-control" id="name"
                                            placeholder="Nama Lengkap" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="no_wa" type="text" class="form-control" id="no_wa"
                                            required="" value="+62">
                                    </fieldset>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="email" type="email" class="form-control" id="email"
                                            placeholder="Alamat Email" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <textarea name="message" rows="6" class="form-control" id="message" placeholder="Pesan" required=""></textarea>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="main-button">Kirim
                                            Pesan</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- ***** Contact Form End ***** -->
            </div>
        </div>
    </section>
    <!-- ***** Contact Us End ***** -->

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
                                <li class="font-weight-bold">0778471856</li>
                                <li>Alamat<br />
                                    Tanjung Riau<br />
                                    Kecamatan Sekupang <br />
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
