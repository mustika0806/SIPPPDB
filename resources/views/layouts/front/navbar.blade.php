<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SIPPDB SMKS Ma'arif NU Kota Batam">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SIPPDB SMK Ma'arif NU Kota Batam</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://ppdb.smkwikrama.sch.id/img/ikon.png" rel="shortcut icon">

    {{-- CSS --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://ppdb.smkwikrama.sch.id/assets/template/plugins/bootstrap/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://ppdb.smkwikrama.sch.id/assets/template/plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://ppdb.smkwikrama.sch.id/assets/template/plugins/slick/slick.css">
    <link rel="stylesheet" href="https://ppdb.smkwikrama.sch.id/assets/template/plugins/slick/slick-theme.css">
    <link rel="stylesheet"
        href="https://ppdb.smkwikrama.sch.id/assets/template/plugins/fancybox/jquery.fancybox.min.css">
    <link rel="stylesheet" href="https://ppdb.smkwikrama.sch.id/assets/template/plugins/aos/aos.css">

    <link href="https://ppdb.smkwikrama.sch.id/assets/template/css/style.css" rel="stylesheet">
    <link href="https://ppdb.smkwikrama.sch.id/assets/template/css/preloader.css" rel="stylesheet">
    <link href="https://ppdb.smkwikrama.sch.id/assets/template/css/header.css" rel="stylesheet">
    <link href="https://ppdb.smkwikrama.sch.id/assets/template/css/superiority.css" rel="stylesheet">
    <link href="https://ppdb.smkwikrama.sch.id/assets/template/css/slider-slick.css" rel="stylesheet">
    <link href="https://ppdb.smkwikrama.sch.id/assets/template/css/contact.css" rel="stylesheet">
    <link href="https://ppdb.smkwikrama.sch.id/assets/template/css/slider.css" rel="stylesheet">
    <link href="https://ppdb.smkwikrama.sch.id/assets/template/css/additional.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Raleway', sans-serif;
        }

        .gradient-banner {
            min-height: 520px;
            display: flex;
            align-items: center;
        }

        .btn-gelombang {
            border-radius: 30px;
            padding: 6px 18px;
        }

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

        .jadwal-box {
            border-radius: 22px;
            background: #ffffff;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.08);
        }

        .jadwal-title {
            color: #009846;
            font-weight: 700;
        }

        #info-ppdb .section-title,
        #jalur-masuk .section-title,
        #profil-sekolah .section-title {
            font-size: 34px;
            font-weight: 700;
            color: #009846;
            letter-spacing: 1px;
        }

        #info-ppdb .info-wrapper,
        #syarat-administrasi .syarat-box,
        #rincian-biaya .biaya-box {
            border-radius: 22px;
            background: #ffffff;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        #info-ppdb .info-left {
            padding: 38px;
        }

        #info-ppdb .info-left h4,
        #info-ppdb .program-title {
            color: #009846;
            font-weight: 700;
        }

        #info-ppdb .info-left p {
            color: #555;
            line-height: 1.9;
            font-size: 15px;
            text-align: justify;
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
        }

        #info-ppdb .program-card p {
            color: #6c757d;
            font-size: 14px;
            line-height: 1.7;
        }

        #syarat-administrasi .syarat-box,
        #rincian-biaya .biaya-box {
            padding: 42px;
        }

        #syarat-administrasi .syarat-title,
        #rincian-biaya .biaya-title {
            color: #009846;
            font-weight: 700;
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

        #rincian-biaya .catatan-biaya,
        #syarat-administrasi .syarat-note {
            margin-top: 20px;
            background: #eefaf3;
            border-left: 5px solid #009846;
            border-radius: 10px;
            padding: 16px 20px;
            color: #555;
            font-size: 14px;
        }

        .custom-card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 10px 28px rgba(0, 0, 0, 0.08);
            height: 100%;
        }

        .custom-card img {
            object-fit: contain;
        }

        .header-area .main-nav {
            display: flex !important;
            align-items: center !important;
            justify-content: flex-start !important;
        }

        .header-area .main-nav .logo {
            float: none !important;
            margin-right: 15px !important;
            display: flex !important;
            align-items: center !important;
        }

        .header-area .main-nav .nav {
            float: none !important;
            margin-left: 0 !important;
            padding-left: 0 !important;
            display: flex !important;
            align-items: center !important;
            gap: 18px;
        }

        .header-area .main-nav .nav li {
            margin-left: 0 !important;
        }

        .header-area .main-nav .nav li a {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }

        @media (max-width: 768px) {

            #syarat-administrasi .syarat-box,
            #rincian-biaya .biaya-box {
                padding: 28px 20px;
            }

            .gradient-banner {
                min-height: 460px;
            }

            iframe {
                height: 300px !important;
            }
        }

        /* ================================================================
           PERAPIAN SECTION INFORMASI HINGGA FOOTER
        ================================================================= */
        #info-ppdb,
        #syarat-administrasi,
        #rincian-biaya,
        #jalur-masuk,
        #profil-sekolah,
        #contact-us {
            position: relative;
            padding-top: 82px !important;
            padding-bottom: 82px !important;
        }

        #info-ppdb,
        #rincian-biaya,
        #contact-us {
            background: #ffffff !important;
        }

        #syarat-administrasi,
        #jalur-masuk,
        #profil-sekolah {
            background: #f5faf7 !important;
        }

        #info-ppdb .container,
        #syarat-administrasi .container,
        #rincian-biaya .container,
        #jalur-masuk .container,
        #profil-sekolah .container,
        #contact-us .container {
            max-width: 1140px;
        }

        #info-ppdb .section-title,
        #jalur-masuk .section-title,
        #profil-sekolah .section-title,
        #contact-us h2 {
            margin-bottom: 12px;
            color: #183d31 !important;
            font-size: 36px;
            font-weight: 800;
            letter-spacing: -.4px;
            line-height: 1.25;
        }

        #info-ppdb .section-title::after,
        #jalur-masuk .section-title::after,
        #profil-sekolah .section-title::after,
        #contact-us h2::after {
            display: block;
            width: 58px;
            height: 4px;
            margin: 15px auto 0;
            content: "";
            background: linear-gradient(90deg, #087a55, #f4b83e);
            border-radius: 10px;
        }

        #info-ppdb .text-center.mb-5,
        #jalur-masuk .text-center.mb-5,
        #profil-sekolah .text-center.mb-5,
        #contact-us .text-center.mb-5 {
            max-width: 760px;
            margin-right: auto;
            margin-left: auto;
        }

        #info-ppdb .info-wrapper {
            overflow: hidden;
            border: 1px solid #dfebe5;
            border-radius: 20px;
            background: linear-gradient(135deg, #ffffff, #f4fbf7);
            box-shadow: 0 14px 36px rgba(24, 79, 60, .08);
        }

        #info-ppdb .info-left {
            position: relative;
            padding: 44px 48px 44px 64px;
        }

        #info-ppdb .info-left::before {
            position: absolute;
            top: 42px;
            bottom: 42px;
            left: 32px;
            width: 5px;
            content: "";
            background: linear-gradient(#087a55, #40c993);
            border-radius: 10px;
        }

        #info-ppdb .info-left h4 {
            margin-bottom: 16px;
            color: #087a55;
            font-size: 24px;
        }

        #info-ppdb .info-left p {
            margin-bottom: 0;
            color: #5e6f68;
            font-size: 15px;
            line-height: 1.9;
        }

        #info-ppdb .program-title {
            margin-top: 64px !important;
            color: #183d31;
            font-size: 28px;
            font-weight: 800;
        }

        #info-ppdb .program-card {
            height: 100%;
            overflow: hidden;
            border: 1px solid #dfebe5;
            border-radius: 18px;
            box-shadow: 0 9px 25px rgba(24, 79, 60, .07);
            transition: .25s ease;
        }

        #info-ppdb .program-card:hover {
            border-color: rgba(8, 122, 85, .28);
            box-shadow: 0 17px 36px rgba(24, 79, 60, .12);
            transform: translateY(-6px);
        }

        #info-ppdb .program-card .card-body {
            display: flex;
            min-height: 250px;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        #info-ppdb .program-icon {
            width: 62px;
            height: 62px;
            color: #087a55;
            background: #e5f7ef;
            border-radius: 17px;
        }

        #syarat-administrasi .syarat-box,
        #rincian-biaya .biaya-box {
            padding: 45px;
            border: 1px solid #dfebe5;
            border-radius: 20px;
            background: #fff;
            box-shadow: 0 14px 36px rgba(24, 79, 60, .08);
        }

        #syarat-administrasi .syarat-title,
        #rincian-biaya .biaya-title {
            color: #183d31;
            font-size: 30px;
            font-weight: 800;
        }

        #syarat-administrasi .syarat-list li {
            min-height: 66px;
            margin-bottom: 13px;
            align-items: center;
            background: #f8fcfa;
            border: 1px solid #e1ece7;
            border-radius: 13px;
            box-shadow: 0 4px 12px rgba(24, 79, 60, .04);
        }

        #syarat-administrasi .syarat-number {
            width: 36px;
            height: 36px;
            min-width: 36px;
            background: linear-gradient(135deg, #087a55, #22ad7b);
        }

        #syarat-administrasi .syarat-note,
        #rincian-biaya .catatan-biaya {
            margin-top: 25px;
            padding: 17px 20px;
            color: #48645a;
            background: #edf9f3;
            border-left: 5px solid #087a55;
            border-radius: 10px;
        }

        #rincian-biaya .table-responsive {
            overflow: hidden;
            border: 1px solid #dce8e2;
            border-radius: 14px;
        }

        #rincian-biaya table th {
            padding: 14px 15px;
            background: linear-gradient(135deg, #075f44, #0c8b61);
            border-color: rgba(255, 255, 255, .14);
        }

        #rincian-biaya table td {
            padding: 13px 15px;
            border-color: #e2ece7;
        }

        #rincian-biaya table tbody tr:hover {
            background: #f3faf6;
        }

        #jalur-masuk .row {
            justify-content: center;
        }

        #jalur-masuk .custom-card {
            height: 100%;
            overflow: hidden;
            border: 1px solid #dfebe5;
            border-radius: 19px;
            background: #fff;
            box-shadow: 0 10px 26px rgba(24, 79, 60, .07);
            transition: .25s ease;
        }

        #jalur-masuk .custom-card:hover {
            box-shadow: 0 17px 36px rgba(24, 79, 60, .12);
            transform: translateY(-6px);
        }

        #jalur-masuk .custom-card .card-body {
            display: flex;
            min-height: 330px;
            padding: 35px 28px;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        #jalur-masuk .custom-card img {
            width: 82px;
            height: 82px;
            padding: 10px;
            object-fit: contain;
            background: #eff9f4;
            border-radius: 20px;
        }

        #jalur-masuk .custom-card h4 {
            color: #183d31 !important;
            font-size: 22px;
        }

        #profil-sekolah .card {
            overflow: hidden;
            border: 1px solid #dfebe5 !important;
            border-radius: 20px;
            box-shadow: 0 14px 34px rgba(24, 79, 60, .08) !important;
        }

        /* Profil sekolah dibuat lebih dekat dan video dibuat dua kolom */
        #jalur-masuk {
            padding-bottom: 25px !important;
        }

        #profil-sekolah {
            padding-top: 28px !important;
        }

        #profil-sekolah .text-center.mb-5 {
            margin-bottom: 25px !important;
        }

        .profile-video-row {
            margin-right: -10px;
            margin-bottom: 0;
            margin-left: -10px;
        }

        .profile-video-row > [class*="col-"] {
            padding-right: 10px;
            padding-left: 10px;
        }

        #profil-sekolah .profile-video-card {
            height: 100%;
            margin: 0 !important;
            background: #fff;
        }

        #profil-sekolah .profile-video-card .card-body {
            padding: 20px;
        }

        .profile-video-label {
            display: inline-flex;
            margin-bottom: 8px;
            align-items: center;
            color: #087a55;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .7px;
            text-transform: uppercase;
        }

        .profile-video-title {
            margin-bottom: 14px;
            color: #183d31;
            font-size: 18px;
            font-weight: 800;
            line-height: 1.4;
        }

        .profile-video-frame {
            position: relative;
            width: 100%;
            padding-top: 56.25%;
            overflow: hidden;
            background: #102d24;
            border-radius: 12px;
        }

        .profile-video-frame iframe {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100% !important;
            border: 0;
            border-radius: 12px;
        }

        #profil-sekolah .row.align-items-center.mt-5 {
            margin-top: 25px !important;
        }

        /* Panel foto serta Visi & Misi menjadi satu komposisi */
        .profile-story-card {
            /* Jarak yang jelas dari dua kartu video di atas */
            margin-top: 55px !important;
            overflow: hidden;
            background: #fff;
            border: 1px solid #dce9e3;
            border-radius: 20px;
            box-shadow: 0 14px 34px rgba(24, 79, 60, .09);
        }

        .profile-photo-column,
        .profile-photo-wrap {
            min-height: 100%;
        }

        .profile-photo-wrap {
            position: relative;
            height: 100%;
            min-height: 480px;
            overflow: hidden;
        }

        .profile-photo-wrap::after {
            position: absolute;
            inset: 0;
            content: "";
            background: linear-gradient(180deg, transparent 35%, rgba(3, 55, 39, .9));
        }

        .profile-photo-wrap img {
            width: 100%;
            height: 100%;
            min-height: 480px;
            object-fit: cover;
            object-position: center;
            transition: transform .4s ease;
        }

        .profile-story-card:hover .profile-photo-wrap img {
            transform: scale(1.025);
        }

        .profile-photo-overlay {
            position: absolute;
            right: 30px;
            bottom: 28px;
            left: 30px;
            z-index: 2;
            color: #fff;
        }

        .profile-photo-label {
            display: inline-block;
            padding: 6px 10px;
            margin-bottom: 10px;
            color: #ffdf8e;
            background: rgba(244, 184, 62, .13);
            border: 1px solid rgba(244, 184, 62, .32);
            border-radius: 20px;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .8px;
            text-transform: uppercase;
        }

        .profile-photo-overlay h4 {
            max-width: 340px;
            margin: 0;
            color: #fff;
            font-size: 24px;
            font-weight: 800;
            line-height: 1.35;
        }

        .profile-mission-content {
            padding: 38px 38px 34px;
        }

        .profile-mission-title {
            margin-bottom: 13px;
            color: #183d31;
            font-size: 28px;
            font-weight: 800;
        }

        .profile-vision-text {
            padding-bottom: 19px;
            margin-bottom: 21px;
            color: #65766f;
            border-bottom: 1px solid #e2ece7;
            font-size: 14px;
            line-height: 1.75;
        }

        .mission-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
        }

        .mission-item {
            display: flex;
            min-height: 105px;
            padding: 15px;
            align-items: flex-start;
            background: #f5faf7;
            border: 1px solid #deebe4;
            border-radius: 12px;
        }

        .mission-number {
            display: inline-flex;
            width: 31px;
            height: 31px;
            min-width: 31px;
            margin-right: 11px;
            align-items: center;
            justify-content: center;
            color: #fff;
            background: #087a55;
            border-radius: 9px;
            font-size: 10px;
            font-weight: 800;
        }

        .mission-item p {
            margin: 0;
            color: #60716a;
            font-size: 12px;
            line-height: 1.55;
        }

        #profil-sekolah .card-body {
            padding: 30px;
        }

        #profil-sekolah iframe {
            display: block;
            border-radius: 14px;
        }

        #profil-sekolah .row.align-items-center img {
            width: 100%;
            min-height: 430px;
            object-fit: cover;
            border-radius: 20px !important;
            box-shadow: 0 14px 34px rgba(24, 79, 60, .12) !important;
        }

        #profil-sekolah .list-unstyled li {
            padding: 12px 14px;
            margin-bottom: 10px !important;
            background: #f6fbf8;
            border: 1px solid #e2ece7;
            border-radius: 10px;
        }

        #profil-sekolah .card.text-center {
            color: #fff;
            background: linear-gradient(135deg, #075f44, #0b8d62);
            border: 0 !important;
        }

        #profil-sekolah .card.text-center h4,
        #profil-sekolah .card.text-center h2 {
            color: #fff !important;
        }

        #contact-us .card {
            max-width: 820px;
            margin: 0 auto;
            border: 1px solid #dfebe5 !important;
            border-radius: 20px;
            background: linear-gradient(135deg, #ffffff, #f2faf6);
            box-shadow: 0 14px 34px rgba(24, 79, 60, .08) !important;
        }

        #contact-us .card-body {
            padding: 42px 30px;
        }

        #contact-us .program-icon {
            display: flex;
            width: 62px;
            height: 62px;
            align-items: center;
            justify-content: center;
            color: #fff;
            background: linear-gradient(135deg, #087a55, #21ad7b);
            border-radius: 18px;
            box-shadow: 0 10px 22px rgba(8, 122, 85, .2);
            font-size: 24px;
        }

        .site-footer {
            padding: 34px 0;
            color: rgba(255, 255, 255, .76);
            background: #064c38;
        }

        .site-footer strong {
            color: #fff;
        }

        @media (max-width: 767.98px) {
            #info-ppdb,
            #syarat-administrasi,
            #rincian-biaya,
            #jalur-masuk,
            #profil-sekolah,
            #contact-us {
                padding-top: 60px !important;
                padding-bottom: 60px !important;
            }

            #info-ppdb .section-title,
            #jalur-masuk .section-title,
            #profil-sekolah .section-title,
            #contact-us h2 {
                font-size: 28px;
            }

            #info-ppdb .info-left {
                padding: 34px 25px 34px 42px;
            }

            #info-ppdb .info-left::before {
                left: 22px;
            }

            #syarat-administrasi .syarat-box,
            #rincian-biaya .biaya-box {
                padding: 28px 20px;
            }

            #profil-sekolah .row.align-items-center img {
                min-height: 260px;
            }

            #jalur-masuk {
                padding-bottom: 18px !important;
            }

            #profil-sekolah {
                padding-top: 25px !important;
            }

            #profil-sekolah .text-center.mb-5 {
                margin-bottom: 20px !important;
            }

            .profile-video-row > [class*="col-"] {
                margin-bottom: 18px;
            }

            .profile-story-card {
                margin-top: 32px !important;
            }

            .profile-photo-wrap,
            .profile-photo-wrap img {
                min-height: 310px;
            }

            .profile-mission-content {
                padding: 28px 20px;
            }

            .mission-grid {
                grid-template-columns: 1fr;
            }

            .mission-item {
                min-height: auto;
            }
        }
    </style>
</head>

<body>

    {{-- PRELOADER --}}
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    {{-- MODAL SUCCESS --}}
    <div class="modal" id="success-msg" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content p-0 m-0">
                <div class="modal-body">
                    <div class="alert alert-success mb-0 text-center" role="alert">
                        Pesan telah berhasil dikirim!
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- HEADER --}}
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">

                        <a href="{{ route('home') }}" class="logo">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRBqz_N0J0bUGFQnLZihDE8REdidm_DDnaJXQ&s"
                                alt="Logo Sekolah" height="30">
                        </a>

                        <ul class="nav">
                            <li><a href="#beranda" class="active">Jadwal Pendaftaran</a></li>
                            <li><a href="#info-ppdb">Info PPDB</a></li>
                            <li><a href="#jalur-masuk">Pembagian Jalur Masuk</a></li>
                            <li><a href="#profil-sekolah">Profil Sekolah</a></li>
                            <li><a href="#contact-us">Hubungi Kami</a></li>
                            <li><a href="{{ route('login') }}">Login</a></li>
                        </ul>

                        <a class="menu-trigger">
                            <span>Menu</span>
                        </a>

                    </nav>
                </div>
            </div>
        </div>
    </header>

    {{-- HERO --}}
    <section class="gradient-banner"
        style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('whatsapp-banner.jpeg') }}'); background-repeat:no-repeat; background-size:cover; background-position:center;">

        <div class="container mt-4" id="beranda">
            <div class="row align-items-center">
                <div class="col-12 text-center text-md-left mt-5">
                    <h2 class="text-white font-weight-bold mb-3">
                        SIPPDB TA 2026-2027
                        <br>
                        SMKS Ma'arif NU Kota Batam
                    </h2>

                    <p class="text-white mb-5">
                        Ayo! segera daftarkan dirimu ke SMKS Ma'arif NU Kota Batam
                        <br>
                        dengan cara klik <b>PENDAFTARAN SIPPDB</b> di bawah ini!
                        <br>
                        <strong>"Sekolah Unggul, Religius, dan Siap Kerja."</strong>
                    </p>

                    <a href="{{ route('register') }}" class="btn btn-main-md shadow-md bordered font-weight-bold">
                        REGISTER
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- JADWAL PENDAFTARAN --}}
    @php
        /*
        |--------------------------------------------------------------------------
        | PILIH JADWAL YANG DITAMPILKAN
        |--------------------------------------------------------------------------
        | 1. Jika ada gelombang yang sedang aktif hari ini, pakai itu.
        | 2. Jika tidak ada yang aktif, pakai gelombang terdekat berikutnya.
        | 3. Jika tidak ada sama sekali, tampilkan pesan belum tersedia.
        */

        $today = \Carbon\Carbon::today();

        /*
        | Ambil semua jadwal langsung dari database agar tidak ada gelombang
        | yang terpotong oleh query controller atau route.
        */
        $gelombangCollection = \App\Models\Pendaftaran::query()
            ->where(function ($query) {
                $query
                    ->whereNotNull('tanggal_buka_pendaftaran')
                    ->orWhereNotNull('mulai');
            })
            ->get()
            ->sortBy(function ($gelombang) {
                return $gelombang->tanggal_buka_pendaftaran
                    ?? $gelombang->mulai;
            })
            ->values();

    @endphp

    <section class="pt-0 position-relative pull-top mb-5" id="jumbotron-card">
        <div class="container">
            <div class="rounded shadow p-4 bg-white jadwal-box">
                <div class="text-center">
                    <h4 class="jadwal-title mb-2">
                        Jadwal Pendaftaran PPDB
                    </h4>

                    <p class="text-muted mb-3">
                        Lihat jadwal lengkap setiap gelombang pendaftaran.
                    </p>

                    <button
                        type="button"
                        class="btn btn-success btn-gelombang"
                        data-toggle="modal"
                        data-target="#modalGelombang"
                    >
                        <i class="fa fa-calendar mr-1"></i>
                        Lihat Jadwal Gelombang
                    </button>
                </div>
            </div>
        </div>

        {{-- MODAL JADWAL GELOMBANG --}}
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

                        @forelse ($gelombangCollection as $gelombang)
                            @php
                                $today = \Carbon\Carbon::today();

                                $mulaiPendaftaran = \Carbon\Carbon::parse($gelombang->tanggal_buka_pendaftaran ?? $gelombang->mulai);
                                $akhirPendaftaran = \Carbon\Carbon::parse($gelombang->tanggal_akhir_pendaftaran ?? $gelombang->berakhir);
                                $mulaiSeleksi = \Carbon\Carbon::parse($gelombang->tanggal_buka_seleksi ?? $gelombang->mulai_seleksi);
                                $akhirSeleksi = \Carbon\Carbon::parse($gelombang->tanggal_akhir_seleksi ?? $gelombang->berakhir_seleksi);
                                $mulaiPengumuman = \Carbon\Carbon::parse($gelombang->tanggal_buka_pengumuman ?? $gelombang->mulai_pengumuman);
                                $akhirPengumuman = \Carbon\Carbon::parse($gelombang->tanggal_akhir_pengumuman ?? $gelombang->berakhir_pengumuman);

                                if (($gelombang->status ?? 'Aktif') === 'Tidak Aktif') {
                                    $statusText = 'Tidak Aktif';
                                    $badgeClass = 'badge-danger';
                                } elseif ($today->between($mulaiPendaftaran, $akhirPendaftaran)) {
                                    $statusText = 'Pendaftaran Berlangsung';
                                    $badgeClass = 'badge-success';
                                } elseif ($today->between($mulaiSeleksi, $akhirSeleksi)) {
                                    $statusText = 'Tahap Seleksi';
                                    $badgeClass = 'badge-info';
                                } elseif ($today->between($mulaiPengumuman, $akhirPengumuman)) {
                                    $statusText = 'Tahap Pengumuman';
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
                                                {{ $gelombang->gelombang ?? $gelombang->tahap ?? 'Gelombang ' . $loop->iteration }}
                                            </h6>

                                            @if (!empty($gelombang->tahun_akademik))
                                                <small class="text-muted">
                                                    Tahun Akademik {{ $gelombang->tahun_akademik }}
                                                </small>
                                            @endif
                                        </div>

                                        <span class="badge {{ $badgeClass }}" style="font-size: 13px; padding: 8px 12px;">
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
                                                        <strong>Seleksi</strong>
                                                    </td>
                                                    <td>
                                                        {{ $mulaiSeleksi->translatedFormat('d F Y') }}
                                                        -
                                                        {{ $akhirSeleksi->translatedFormat('d F Y') }}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>Pengumuman</strong>
                                                    </td>
                                                    <td>
                                                        {{ $mulaiPengumuman->translatedFormat('d F Y') }}
                                                        -
                                                        {{ $akhirPengumuman->translatedFormat('d F Y') }}
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
    </section>

    {{-- INFO PPDB --}}
    <section class="py-5 bg-white" id="info-ppdb">
        <div class="container">

            <div class="text-center mb-5">
                <h2 class="section-title">
                    Informasi Pendaftaran Peserta Didik Baru
                </h2>
            </div>

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

            <div class="text-center">
                <h3 class="program-title mt-5">
                    Program Unggulan
                </h3>

                <p class="text-muted mb-5">
                    Program unggulan yang mendukung pengembangan karakter, keterampilan, dan keagamaan peserta didik.
                </p>
            </div>

            <div class="row">

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card program-card text-center">
                        <div class="card-body p-4">
                            <div class="program-icon">
                                <i class="fa fa-book"></i>
                            </div>

                            <h5>Tahfidz Al-Qur'an</h5>

                            <p>
                                Program pembinaan hafalan Al-Qur'an untuk membentuk karakter religius peserta didik.
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

                            <h5>Public Speaking</h5>

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

                            <h5>Olahraga</h5>

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

                            <h5>Qiroatul Kutub</h5>

                            <p>
                                Pembinaan kemampuan membaca dan memahami kitab kuning sebagai penguatan keilmuan Islam.
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    {{-- SYARAT ADMINISTRASI --}}
    <section class="py-5 bg-white" id="syarat-administrasi">
        <div class="container">
            <div class="syarat-box">

                <div class="text-center">
                    <h3 class="syarat-title">
                        Syarat Administrasi
                    </h3>

                    <p class="text-muted mb-5">
                        Calon peserta didik wajib menyiapkan dokumen berikut sebagai persyaratan pendaftaran PPDB.
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

                <div class="syarat-note">
                    <strong>Catatan:</strong>
                    Dokumen administrasi dapat diunggah melalui sistem setelah calon siswa melakukan pendaftaran.
                </div>

            </div>
        </div>
    </section>

    {{-- RINCIAN BIAYA --}}
    <section class="py-5 bg-white" id="rincian-biaya">
        <div class="container">
            <div class="biaya-box">

                <div class="text-center">
                    <h3 class="biaya-title">
                        Rincian Biaya PPDB
                    </h3>

                    <p class="text-muted mb-5">
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
                                    Gelombang 1 Desember - Februari
                                </td>
                                <td>Rp 2.000.000</td>
                            </tr>

                            <tr>
                                <td>
                                    <span class="kategori-biaya">Uang Pembangunan</span>
                                    <br>
                                    Gelombang 2 Maret - Mei
                                </td>
                                <td>Rp 2.500.000</td>
                            </tr>

                            <tr>
                                <td>
                                    <span class="kategori-biaya">Uang Pembangunan</span>
                                    <br>
                                    Gelombang 3 Juni - Juli
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
                    Rincian biaya mengikuti informasi resmi PPDB SMKS Ma'arif NU Kota Batam Tahun Ajaran 2026/2027.
                    Calon peserta didik diharapkan memastikan kembali informasi biaya kepada panitia PPDB.
                </div>

            </div>
        </div>
    </section>

    {{-- JALUR MASUK --}}
    <section class="py-5 bg-light" id="jalur-masuk">
        <div class="container">

            <div class="text-center mb-5">
                <h2 class="section-title">
                    Pembagian Jalur Masuk
                </h2>

                <p class="text-muted">
                    SIPPDB SMKS Ma'arif NU Kota Batam menyediakan 3 jalur penerimaan peserta didik baru.
                </p>
            </div>

            <div class="row">

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card custom-card text-center">
                        <div class="card-body">
                            <img src="https://cdn-icons-png.freepik.com/512/9512/9512451.png" width="90" class="mb-3"
                                alt="Jalur Prestasi">

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

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card custom-card text-center">
                        <div class="card-body">
                            <img src="https://storage-api.cimahikota.go.id/lapakami/assets/icon/22df49ef96ded10bb9a3a90295d8bdb0.png"
                                width="90" class="mb-3" alt="Jalur Domisili">

                            <h4 class="font-weight-bold text-warning">
                                Jalur Domisili
                            </h4>

                            <p class="text-muted">
                                Diperuntukkan bagi calon peserta didik yang berdomisili sesuai ketentuan wilayah yang
                                telah ditetapkan.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card custom-card text-center">
                        <div class="card-body">
                            <img src="https://cdn-icons-png.freepik.com/256/18516/18516996.png?semt=ais_white_label"
                                width="90" class="mb-3" alt="Jalur Afirmasi">

                            <h4 class="font-weight-bold text-success">
                                Jalur Afirmasi
                            </h4>

                            <p class="text-muted">
                                Diperuntukkan bagi calon peserta didik dari keluarga kurang mampu atau kategori khusus
                                sesuai ketentuan yang berlaku.
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    {{-- PROFIL SEKOLAH --}}
    <section id="profil-sekolah" class="py-5 bg-light">
        <div class="container">

            <div class="text-center mb-5">
                <h2 class="section-title">
                    Profil SMKS Ma'arif NU Kota Batam
                </h2>

                <p class="text-muted">
                    Mengenal lebih dekat SMK Ma'arif NU Kota Batam.
                </p>
            </div>

            <div class="row profile-video-row">
                <div class="col-lg-6 col-md-6">
                    <div class="card profile-video-card">
                        <div class="card-body">
                            <span class="profile-video-label">
                                <i class="fa fa-play-circle mr-2"></i>
                                Video Profil
                            </span>

                            <h4 class="profile-video-title">
                                Company Profile SMKS Ma'arif NU Kota Batam
                            </h4>

                            <div class="profile-video-frame">
                                <iframe src="https://www.youtube.com/embed/ahNK-Z45efU"
                                    frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="card profile-video-card">
                        <div class="card-body">
                            <span class="profile-video-label">
                                <i class="fa fa-history mr-2"></i>
                                Sejarah Sekolah
                            </span>

                            <h4 class="profile-video-title">
                                Sejarah Berdirinya SMKS Ma'arif NU Kota Batam
                            </h4>

                            <div class="profile-video-frame">
                                <iframe src="https://www.youtube.com/embed/wZdrD0dGp6w"
                                    frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="profile-story-card">
                <div class="row no-gutters align-items-stretch">
                    <div class="col-lg-5 profile-photo-column">
                        <div class="profile-photo-wrap">
                            <img src="{{ asset('whatsapp-banner.jpeg') }}"
                                alt="SMKS Ma'arif NU Kota Batam">

                            <div class="profile-photo-overlay">
                                <span class="profile-photo-label">Visi Sekolah</span>
                                <h4>Unggul, religius, dan berwawasan global.</h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 profile-mission-column">
                        <div class="profile-mission-content">
                            <span class="profile-video-label">
                                <i class="fa fa-graduation-cap mr-2"></i>
                                Arah Pendidikan
                            </span>

                            <h3 class="profile-mission-title">Visi & Misi</h3>

                            <p class="profile-vision-text">
                                Menjadi sekolah unggulan yang berjiwa nasional, berwawasan global yang menyiapkan
                                generasi muslim terampil dan berakhlak mulia.
                            </p>

                            <div class="mission-grid">
                                <div class="mission-item">
                                    <span class="mission-number">01</span>
                                    <p>Membentuk tamatan yang beriman, berkemampuan unggul, dan mampu mengembangkan diri.</p>
                                </div>

                                <div class="mission-item">
                                    <span class="mission-number">02</span>
                                    <p>Menyiapkan tenaga kerja menengah yang terampil dan profesional.</p>
                                </div>

                                <div class="mission-item">
                                    <span class="mission-number">03</span>
                                    <p>Menjadikan SMK sebagai sumber informasi di bidang pekerjaan jasa.</p>
                                </div>

                                <div class="mission-item">
                                    <span class="mission-number">04</span>
                                    <p>Menciptakan SDM yang mampu bersaing di dunia usaha dan industri.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
    </section>

    {{-- CONTACT --}}
    <section class="py-5 bg-white" id="contact-us">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="font-weight-bold text-success">
                    Hubungi Kami
                </h2>

                <p class="text-muted">
                    Silakan hubungi panitia PPDB untuk informasi lebih lanjut.
                </p>
            </div>

            <div class="card border-0 shadow">
                <div class="card-body text-center">
                    <div class="program-icon mx-auto mb-3">
                        <i class="fa fa-phone"></i>
                    </div>

                    <h5 class="font-weight-bold">
                        SMKS Ma'arif NU Kota Batam
                    </h5>

                    <p class="text-muted mb-1">
                        Kecamatan Sekupang, Kota Batam, Kepulauan Riau
                    </p>

                    <p class="text-muted mb-0">
                        Informasi PPDB dapat diperoleh melalui panitia sekolah.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- FOOTER --}}
    <footer class="site-footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7 text-center text-md-left mb-2 mb-md-0">
                    <strong>SMKS Ma'arif NU Kota Batam</strong>
                    <div class="small mt-1">
                        Sistem Informasi Penerimaan Peserta Didik Baru
                    </div>
                </div>

                <div class="col-md-5 text-center text-md-right small">
                    &copy; {{ date('Y') }} SIPPDB. Seluruh hak dilindungi.
                </div>
            </div>
        </div>
    </footer>

    {{-- TO TOP --}}
    <div class="scroll-top-to">
        <i class="ti-angle-up"></i>
    </div>

    {{-- JAVASCRIPT --}}
    <script src="https://ppdb.smkwikrama.sch.id/assets/template/plugins/jquery/jquery.min.js"></script>
    <script src="https://ppdb.smkwikrama.sch.id/assets/template/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="https://ppdb.smkwikrama.sch.id/assets/template/plugins/slick/slick.min.js"></script>
    <script src="https://ppdb.smkwikrama.sch.id/assets/template/plugins/fancybox/jquery.fancybox.min.js"></script>
    <script src="https://ppdb.smkwikrama.sch.id/assets/template/plugins/syotimer/jquery.syotimer.min.js"></script>
    <script src="https://ppdb.smkwikrama.sch.id/assets/template/plugins/aos/aos.js"></script>
    <script src="https://ppdb.smkwikrama.sch.id/assets/landing page/js/scrollreveal.min.js"></script>
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
            };

            $.ajax({
                type: 'POST',
                url: urlForm,
                data: data,
                cache: false,
                success: function () {
                    $("#success-msg").modal('show');
                    $('#contact')[0].reset();

                    setTimeout(function () {
                        $("#success-msg").modal('hide');
                    }, 3000);
                }
            });
        });
    </script>

</body>

</html>