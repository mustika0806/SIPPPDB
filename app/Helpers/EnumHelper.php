<?php

namespace App\Helpers;

class EnumHelper
{
    const Kriteria = [
        'Aspek Keluarga', // kondisi ayah dan ibu, jumlah saudara kandung
        'Aspek Sosial Ekonomi', // asal sekolah, penghasilan orang tua
        'Aspek Akademik' // nilai rata rata rapor
    ];
    const SubKriteria = [
        'Status Anak' =>
        [
            'Yatim Piatu',
            'Yatim',
            'Piatu',
            'Orang Tua Lengkap'
        ],
        'Jumlah Saudara Kandung' =>
        [
            'Tanpa Saudara Kandung',
            '1 Saudara Kandung',
            '2 Saudara Kandung',
            'Lebih dari 2 Saudara Kandung'
        ],
        'Asal Sekolah' =>
        [
            'SMP NEGERI 10 BATAM (Komplek Perumahan Sei Panas)',
            'SMP NEGERI 12 BATAM (Legenda Malaka)',
            'SMP NEGERI 28 BATAM (Komp . Perum . Taman Raya Tahap44)',
            'SMP NEGERI 31 BATAM (Perum . Anggrek Sari)',
            'SMP NEGERI 42 BATAM (Bida Asri 2 Batam Centre)',
            'SMP NEGERI 43 BATAM (Legenda Malaka)',
            'SMP NEGERI 52 BATAM (Perum Cluster Daissy BatamCenter)',
            'SMP NEGERI 6 BATAM  (Jalan . Laksamana Bintan KelurahanSei Panas Kepulauan Riau)',
            'SMP NEGERI 11 BATAM (Perum Bumi Sarana Indah Batu Aji)',
            'SMP NEGERI 26 BATAM (Rindang Garden)',
            'SMP NEGERI 38 BATAM (Jalan Brigjend Katamso)',
            'SMP NEGERI 53 BATAM (Taman Lestari RT 03 RW13)',
            'SMP NEGERI 65 BATAM (Komp Perumahan Putra Jaya)',
            'SMP NEGERI 29 BATAM (Perum Sengkuang Raya)',
            'SMP NEGERI 45 BATAM (Air Raja)',
            'SMP NEGERI 1 BATAM  (Jl . Sulawesi)',
            'SMP NEGERI 2 BATAM (Jl . Hang Lekiu No . 21)',
            'SMP NEGERI 33 SATU ATAP BATAM (Jl . Panglima Rahim Komplek SekolahGeranting)',
            'SMP NEGERI 48 SATU ATAP BATAM (Pecong RT 02 / RW01)',
            'SMP NEGERI 55 BATAM (Jl . Darat No . 10 Pulau Terong)',
            'SMP NEGERI 7 BATAM (JALAN KASU BARAT)',
            'SMP NEGERI 30 BATAM (Bengkong Sadai)',
            'SMP NEGERI 4 BATAM (Jl . Ranai No . 1 Bengkong PLTD24 )',
            'SMP NEGERI 62 BATAM (JL . GOLDEN PRAWN)',
            'SMP NEGERI 14 BATAM (Pulau Panjang)',
            'SMP NEGERI 19 BATAM (Pulau Jaloh, Kel.Pantai GelamKec.BulangKota Batam)',
            'SMP NEGERI 46 BATAM (Bulang Kebam)',
            'SMP NEGERI 5 BATAM (Pulau Buluh)',
            'SMP NEGERI 64 BATAM (Selat Nenek)',
            'SMP NEGERI 13 BATAM (Kp, Padang)',
            'SMP NEGERI 15 BATAM (Pl . Air Raja)',
            'SMP NEGERI 18 BATAM (Jl . pelajar No 01 Sembulang RT . 01 / RW . I)',
            'SMP NEGERI 22 BATAM (Tanjung Kertang)',
            'SMP NEGERI 24 BATAM (Pulau Abang)',
            'SMP NEGERI 32 BATAM (Air Lingka)',
            'SMP NEGERI 39 BATAM (Monggak)',
            'SMP NEGERI 49 BATAM (JL.PENDIDIKAN NO.3,PULAUSEMBUR38)',
            'SMP NEGERI 41 BATAM (Jl.Bunga Raya)',
            'SMP NEGERI 17 BATAM (Punggur)',
            'SMP NEGERI 23 BATAM (Jl.Bunga Tanjung Pulau NgenangRt .03 Rw .01)',
            'SMP NEGERI 34 BATAM (Jl.Hang Kasturi Rt.03 Rw.04)',
            'SMP NEGERI 51 BATAM (Kav . Senjulung)',
            'SMP NEGERI 63 BATAM (JL.BUMI PERKEMAHAN RAJAALI KELANA44 SMP NEGERI 8 BATAM SMP NEGERI Jl . Hang Lekiu)',
            'SMP NEGERI 21 BATAM (Jl.Kavling Baru Nato)',
            'SMP NEGERI 27 BATAM (Kav.Bukit Seroja)',
            'SMP NEGERI 35 BATAM (Jln.Putri Hijau Griya Batu Aji Asri)',
            'SMP NEGERI 36 BATAM (Jalan Raya Sungai Binti)',
            'SMP NEGERI 37 BATAM (Perum.Taman Cipta Asri)',
            'SMP NEGERI 44 BATAM (Dapur12 Kampung tua)',
            'SMP NEGERI 50 BATAM (Perum Tunas Regency)',
            'SMP NEGERI 59 BATAM (Buana Bukit Permata)',
            'SMP NEGERI 60 BATAM (SAGULUNG BERSATU RT 01 RW09)',
            'SMP NEGERI 61 BATAM (JL . PELAJAR BATU AJI INDAH1KAVLINGLAMA)',
            'SMP NEGERI 9 BATAM (Jl . Brigjen Katamso)',
            'SMP NEGERI 16 BATAM (Jl . Letjen S parman Bida Ayu)',
            'SMP NEGERI 40 BATAM (Jl . Letjen S . Parman Kav . Pancur Baru58 SMP NEGERI 54 BATAM SMP NEGERI Kavling Mangsang Indah)',
            'SMP NEGERI 58 BATAM (Jl . Raya Kampung Bagan Sei Daun60 SMP NEGERI 20 BATAM SMP NEGERI Tiban Koperasi)',
            'SMP NEGERI 25 BATAM (Tiban Indah)',
            'SMP NEGERI 3 BATAM (Jl . Kartini II)',
            'SMP NEGERI 47 BATAM (Marina City No .1 Kelurahan TanjungRiau64)',
            'SMP NEGERI 56 BATAM (Tiban Kampung RT001 / RW012 TibanLama65)',
            'SMP NEGERI 57 BATAM (JL . Ir . SUTAMI PATAMLESTARI SEKUPANG)',
            'SMP ADVEN (Jl . Teratai Blok V Lubuk Baja Batam67)',
            'SMP AL BARKAH SAGULUNG (JALAN RAYA DAPUR 12 KAVLINGSEROJA68 )',
            'SMP AL - KAHFI ISLAMIC SCHOOL (Ruko The Capitol ImperiumNo . A42B - 47 SuperBlok Batam)',
            'SMP ANANDA (Batam)',
            'SMP AUSTRALIAN INTERCULTURAL SCHOOL (KOMPLEK TANAH MAS BLOKANO1)',
            'SMP AVAVA (Nagoya Point No 1)',
            'SMP AZ - ZAINIYAH NAHDATUL WATHAN (Jl . Kh . Ahmad Dahlan, Bukit Berkah73)',
            'SMP BAITUL HIKMAH (Jl . KH Ahmad Dahlan)',
            'SMP BAPTIS (Kampung Marlegot)',
            'SMP BHINEKA NUSANTARA (Tanjung Piayu)',
            'SMP BODHI DHARMA (Jln Komplek Limindo Trade Centre77)',
            'SMP BP TAHFIDZ AT TAUBAH (Perum Bambu Kuning Blok BBukit)',
            'SMP CAHAYA BANGSA (Bengkong Baru Blok C 001)',
            'SMP DAARUT TAUHID BOARDING SCHOOL BATAM Jl . Trans Barelang Km .3)',
            'SMP Eben Haezer (Patimura Kabil)',
            'SMP EBEN HAEZER (Bengkong Palapa 2 Blok . CNo .5182)',
            'SMP ELSADAI AGAPE (KOMPLEK TAMAN DUTA MASBLOKJNo . 10 - 12)',
            'SMP EPPATA 1 (Jl . Sumatera Atas Bengkong)',
            'SMP EPPATA II SMP SWASTA (Perumahan Muka Kuning ParadiseBlokF85)',
            'SMP GRANADA INTERNATIONAL ISLAMIC BOARDING SCHOOL(GIIBS) (Jalan Hang Kesturi Gang Selar,BlokDNo . 09, Rt 001 Rw 004)',
            'SMP GURINDAM BOARDING SCHOOL (Jl Pesantren Blok A Nomor 7)',
            'SMP HANG KASTURI (Tanjung Uma)',
            'SMP HARAPAN UTAMA (Jl . Rosedale - Simpang Frengky BatamCentre)',
            'SMP HOSANNAH (Bengkong Abadi II)',
            'SMP IBNU SINA BATAM Yayasan Pendidikan Ibnu Sina',
            'SMP ISLAM AL BARKAH (Komplek BTN Baloi Persero)',
            'SMP ISLAM HANG NADIM MALAY SCHOOL (Jln . Mentarau Tiban V Sekupang - Batam93)',
            'SMP ISLAM HANG TUAH SMP SWASTA (Jl . Ranai No 11)',
            'SMP ISLAM INTEGRAL LUQMAN AL HAKIM (Jl.R.Suprapto RT.02 RW.XI Kel.KibingKec . Batu Aji Batam)',
            'SMP ISLAM NABILAH (KOMPLEK MASJID AMANATUL UMMAHDUTAMAS)',
            'SMP ISLAM PLUS AN - NAHDHAH (KOMPLEK TIBAN KOPERASI BLOKKRT05 RW 06)',
            'SMP IT AL HAQQI (TANJUNG GUNDAP RT 01 RW 01)',
            'SMP IT AR RISALAH (KAVLING TIBAN MENTARAUBLOKJNO100)',
            
        ],
        'Penghasilan Orang Tua' =>
        [
            'Dibawah Garis Kemiskinan (Rp. 5.00.000/bulan)',
            'Menengah ke bawah (Rp. 500.000 - Rp. 2.000.000/bulan)',
            'Menengah (Rp. 2.000.000 - Rp. 5.000.000/bulan)',
            'Menengah ke atas (Rp. 5.000.000 - Rp. 20.000.000/bulan)'
        ],
    ];
}
