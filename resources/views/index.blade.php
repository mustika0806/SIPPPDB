@extends('layouts.front.app')

@section('content')
    <section id="habout" class="bg-light">
        <style>
            #habout {
                padding-top: 20px !important;
                padding-bottom: 60px !important;
            }

            #habout .section-title {
                font-weight: 700;
                color: #009846;
                margin-bottom: 8px;
            }

            #habout .profile-card {
                border: none;
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
                background: #fff;
                height: 100%;
            }

            /* FIX UTAMA MAP */
            #habout .map-frame {
                width: 100%;
                height: 280px;
                border: 0;
                display: block;
            }

            #habout .profile-card-body {
                padding: 22px;
                text-align: center;
            }

            #habout .card-title-custom {
                font-weight: 700;
                color: #009846;
                margin-bottom: 10px;
            }

            #habout .btn-outline-success {
                width: 100%;
                display: block;
                border-color: #009846;
                color: #009846;
            }

            #habout .btn-outline-success:hover {
                background: #009846;
                color: #fff;
            }

            @media (max-width: 768px) {
                #habout .map-frame {
                    height: 220px;
                }
            }
        </style>

        <div class="container">

            <div class="text-center mb-4">
                <h2 class="section-title">
                    Lokasi SMKS Ma'arif NU Kota Batam
                </h2>
            </div>

            <div class="row justify-content-center">

                <!-- CARD MAP -->
                <div class="col-lg-6 col-md-8 col-sm-12">

                    <div class="card profile-card">

                        <!-- MAP -->
                        <iframe class="map-frame"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.1342293093307!2d103.92946307406616!3d1.0610215989287781!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d98df349c97fb1%3A0xc97a0b76ae450bf4!2sSMK%20MA%27ARIF%20NU%20KOTA%20BATAM!5e0!3m2!1sid!2sid!4v1780669080622!5m2!1sid!2sid"
                            allowfullscreen loading="lazy">
                        </iframe>


                        <!-- CONTENT -->
                        <div class="profile-card-body">

                            <h5 class="card-title-custom">
                                📍 Lokasi Sekolah
                            </h5>

                            <p>
                                Jl. Marina, depan Perum Kotamas Marina, Kel. Tanjung Riau,
                                Kec. Sekupang, Kota Batam.
                            </p>

                            <a href="https://www.google.com/maps?q=SMK+Ma'arif+NU+Kota+Batam" target="_blank"
                                class="btn btn-outline-success">
                                Buka di Google Maps
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>
@endsection