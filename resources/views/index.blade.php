@extends('layouts.front.app')
@section('content')
    <!-- START WELCOME SECTION -->
    <section id="habout" class="py-5 bg-light">
        <div class="container">

            <!-- Judul -->
            <div class="text-center mb-5">
                <h2 class="font-weight-bold text-success">
                    Profil SMKS Ma'arif NU Kota Batam
                </h2>
                <p class="text-muted">
                    Mengenal lebih dekat lingkungan belajar dan program pendidikan SMKS Ma'arif NU Kota Batam
                </p>
            </div>

            <div class="row">

                <!-- KOLOM KIRI -->
                <div class="col-lg-6 mb-4 d-flex flex-column">

                    <!-- FOTO SEKOLAH -->
                    <div class="card border-0 shadow-sm mb-3">
                        <img src="https://gardapublik.id/wp-content/uploads/2025/07/WhatsApp-Image-2025-07-23-at-09.42.02.jpeg"
                            class="card-img-top" style="height: 300px; object-fit: cover;" alt="SMK Ma'arif NU Batam">

                        <div class="card-body text-center">

                            <h5 class="font-weight-bold text-success mb-3">
                                Video Profil Sekolah
                            </h5>

                            <a href="https://www.youtube.com/embed/9kKCT9f80Dg?si=ldCDEr8EpAHFpdo5" target="_blank"
                                class="btn btn-success">
                                ▶ Tonton Video Profil
                            </a>

                        </div>
                    </div>

                    <!-- GOOGLE MAPS -->
                    <div class="card border-0 shadow-sm flex-grow-1">
                        <div class="card-body">

                            <h5 class="text-success font-weight-bold text-center mb-3">
                                📍 Lokasi SMKS Ma'arif NU Kota Batam
                            </h5>

                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.1342293093307!2d103.92946307406616!3d1.0610215989287781!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d98df349c97fb1%3A0xc97a0b76ae450bf4!2sSMK%20MA%27ARIF%20NU%20KOTA%20BATAM!5e0!3m2!1sid!2sid!4v1780669080622!5m2!1sid!2sid"
                                width="100%" height="320" style="border:0; border-radius:10px;" allowfullscreen=""
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </iframe>

                            <div class="text-center mt-3">
                                <a href="https://maps.google.com/?q=SMK+Ma'arif+NU+Kota+Batam" target="_blank"
                                    class="btn btn-outline-success">
                                    Buka di Google Maps
                                </a>
                            </div>

                        </div>
                    </div>

                </div>

                <!-- KOLOM KANAN -->
                <div class="col-lg-6 mb-4">

                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">

                            <h4 class="font-weight-bold text-success mb-4">
                                Informasi Sekolah
                            </h4>

                            <p class="text-dark">
                                <strong>SMKS Ma'arif NU Kota Batam</strong> merupakan sekolah menengah kejuruan
                                swasta yang berlokasi di Kecamatan Sekupang, Kota Batam, Kepulauan Riau.
                                Sekolah ini didirikan pada <strong>7 Agustus 2015</strong> berdasarkan
                                Surat Keputusan Pendirian Nomor
                                <strong>1178/422.10/DIKMEN/VIII/2015</strong>
                                dan berada di bawah naungan
                                <strong>Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi</strong>.

                                Saat ini sekolah dipimpin oleh <strong>Nopvia Kristiningrum</strong> sebagai Kepala
                                Sekolah, dengan dukungan tenaga pendidik yang profesional dalam menciptakan
                                lingkungan belajar yang unggul, religius, dan berorientasi pada kebutuhan
                                dunia kerja.
                            </p>

                            <hr>

                            <h5 class="font-weight-bold text-success">
                                Program Keahlian
                            </h5>

                            <ul class="mb-4">
                                <li>🎨 Desain Komunikasi Visual (DKV)</li>
                                <li>🚚 Teknik Logistik</li>
                            </ul>

                            <h5 class="font-weight-bold text-success">
                                Ekstrakurikuler
                            </h5>

                            <ul class="mb-4">
                                <li>🏕️ Pramuka</li>
                                <li>🥋 Pagar Nusa</li>
                                <li>🎶 Hadroh</li>
                                <li>📖 Tahfidz Al-Qur'an</li>
                            </ul>

                            <h5 class="font-weight-bold text-success">
                                Fasilitas Sekolah
                            </h5>

                            <ul class="mb-4">
                                <li>🏫 Ruang Praktek</li>
                                <li>📚 Perpustakaan</li>
                                <li>⚽ Lapangan Olahraga</li>
                                <li>🚜 Area Pelatihan Forklift</li>
                                <li>🏠 Asrama Putra dan Putri</li>
                                <li>🕌 Tempat Ibadah</li>
                                <li>🎓 Beasiswa Pendidikan untuk Anak Pulau</li>
                            </ul>

                            <div class="alert alert-success mb-0">

                                <h5 class="font-weight-bold mb-3">
                                    🌟 Mengapa Memilih SMKS Ma'arif NU Batam?
                                </h5>

                                <ul class="mb-0">
                                    <li>Pendidikan berbasis karakter dan nilai keislaman.</li>
                                    <li>Program keahlian sesuai kebutuhan dunia kerja.</li>
                                    <li>Fasilitas belajar yang modern dan mendukung.</li>
                                    <li>Tersedia asrama putra dan putri.</li>
                                    <li>Lingkungan sekolah yang aman, nyaman, dan religius.</li>
                                    <li>Ekstrakurikuler yang aktif dan berprestasi.</li>
                                </ul>

                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>
    <!-- END WELCOME SECTION -->
    <!--- END CONTAINER -->
    </section>
    <!-- END PORTFOLIO SECTION -->
@endsection