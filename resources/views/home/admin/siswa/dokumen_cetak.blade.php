<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <title>
        Dokumen {{ optional($siswa->user)->name ?? 'Siswa' }}
    </title>

    <style>
        @page {
            size: A4 portrait;
            margin: 25px 30px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            color: #222;
            font-family: DejaVu Sans, Arial, sans-serif;
            font-size: 10px;
            line-height: 1.5;
        }

        .header {
            padding-bottom: 12px;
            margin-bottom: 16px;
            text-align: center;
            border-bottom: 3px solid #1f4e78;
        }

        .header h1 {
            margin: 0 0 4px;
            color: #1f4e78;
            font-size: 19px;
            text-transform: uppercase;
        }

        .header p {
            margin: 0;
            color: #666;
            font-size: 10px;
        }

        .section-title {
            padding: 7px 9px;
            margin-top: 15px;
            color: #fff;
            background-color: #1f4e78;
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .identity-table td {
            padding: 6px 8px;
            vertical-align: top;
            border: 1px solid #b7b7b7;
        }

        .identity-table .label {
            width: 23%;
            background-color: #f2f5f8;
            font-weight: bold;
        }

        .identity-table .value {
            width: 27%;
        }

        .document-table {
            page-break-inside: avoid;
        }

        .document-table th,
        .document-table td {
            padding: 7px 8px;
            vertical-align: middle;
            border: 1px solid #b7b7b7;
        }

        .document-table th {
            color: #fff;
            background-color: #4472c4;
            font-weight: bold;
            text-align: center;
        }

        .document-table .number {
            width: 8%;
            text-align: center;
        }

        .document-table .document-name {
            width: 62%;
        }

        .document-table .availability {
            width: 30%;
            text-align: center;
        }

        .available {
            color: #198754;
            font-weight: bold;
        }

        .unavailable {
            color: #dc3545;
            font-weight: bold;
        }

        .status-box {
            padding: 8px 10px;
            margin-top: 12px;
            background-color: #eaf4ff;
            border: 1px solid #94b9df;
            border-radius: 4px;
        }

        .status-box strong {
            color: #1f4e78;
        }

        .signature-table {
            margin-top: 30px;
            page-break-inside: avoid;
        }

        .signature-table td {
            width: 50%;
            text-align: center;
            vertical-align: top;
        }

        .signature-space {
            height: 55px;
        }

        .signature-name {
            display: inline-block;
            min-width: 150px;
            padding-top: 3px;
            border-top: 1px solid #333;
        }

        .footer {
            margin-top: 22px;
            color: #666;
            font-size: 9px;
            text-align: right;
        }

        /*
         * SETIAP DOKUMEN DITAMPILKAN
         * PADA SATU HALAMAN PENUH
         */
        .document-page {
            width: 100%;
            page-break-before: always;
            text-align: center;
        }

        .document-page-title {
            padding-bottom: 8px;
            margin-bottom: 12px;
            color: #1f4e78;
            font-size: 15px;
            font-weight: bold;
            border-bottom: 2px solid #1f4e78;
            text-transform: uppercase;
        }

        .document-full-image {
            display: block;
            max-width: 100%;
            max-height: 680px;
            margin: 0 auto;
        }

        .document-owner {
            margin-top: 10px;
            color: #444;
            font-size: 9px;
            font-weight: bold;
        }

        .document-file-info {
            margin-top: 3px;
            color: #777;
            font-size: 7px;
            overflow-wrap: anywhere;
        }
    </style>
</head>

<body>
    @php
        $dokumen = $siswa->dokumen_siswa;
        $dokumenPindahan = $siswa->dokumen_siswa_pindahan;

        /*
         * DAFTAR DOKUMEN UTAMA
         */
        $dokumenUtama = [
            'Kartu Keluarga' => optional($dokumen)->file_kk,
            'KTP Orang Tua/Wali' => optional($dokumen)->file_ktp,
            'Akta Kelahiran' => optional($dokumen)->file_akta,
            'Rapor' => optional($dokumen)->file_raport,
            'Ijazah' => optional($dokumen)->file_ijazah,
            'Kartu Indonesia Pintar' => optional($dokumen)->file_kip,
            'Surat Keputusan' => optional($dokumen)->file_keputusan,
            'Pasfoto Siswa' => optional($dokumen)->file_foto,
        ];

        /*
         * DAFTAR DOKUMEN SISWA PINDAHAN
         */
        $dokumenKhususPindahan = [
            'Surat Pindah' => optional($dokumenPindahan)->surat_pindah,
            'Rapor Terakhir' => optional($dokumenPindahan)->raport_terakhir,
            'Surat Keterangan Perilaku Baik' => optional($dokumenPindahan)->keterangan_prilaku_baik,
            'Surat Rekomendasi' => optional($dokumenPindahan)->rekomendasi,
            'Surat Perwalian' => optional($dokumenPindahan)->surat_perwalian,
            'Sertifikat Akreditasi Sekolah' => optional($dokumenPindahan)->sertifikat_akreditasi_sekolah,
            'KTP Ayah' => optional($dokumenPindahan)->ktp_ayah,
            'KTP Ibu' => optional($dokumenPindahan)->ktp_ibu,
            'KTP Wali' => optional($dokumenPindahan)->ktp_wali,
        ];

        /*
         * MENCARI LOKASI FISIK FILE
         */
        $resolveDocumentPath = function ($file) {
            if (!$file) {
                return null;
            }

            $fileBersih = ltrim($file, '/');
            $namaFile = basename($fileBersih);

            $daftarLokasi = [
                storage_path('app/public/' . $fileBersih),

                storage_path(
                    'app/public/dokumen_siswa/' . $namaFile
                ),

                storage_path(
                    'app/public/dokumen/' . $namaFile
                ),

                public_path(
                    'storage/' . $fileBersih
                ),

                public_path(
                    'storage/dokumen_siswa/' . $namaFile
                ),

                public_path(
                    'storage/dokumen/' . $namaFile
                ),

                public_path($fileBersih),
            ];

            foreach ($daftarLokasi as $lokasi) {
                if (file_exists($lokasi) && is_file($lokasi)) {
                    return $lokasi;
                }
            }

            return null;
        };

        /*
         * MEMERIKSA APAKAH FILE BERUPA GAMBAR
         */
        $isImage = function ($file) {
            if (!$file) {
                return false;
            }

            $extension = strtolower(
                pathinfo($file, PATHINFO_EXTENSION)
            );

            return in_array($extension, [
                'jpg',
                'jpeg',
                'png',
                'webp',
                'gif',
                'bmp',
            ]);
        };
    @endphp

    {{-- HALAMAN PERTAMA --}}
    <div class="header">
        <h1>Rekap Dokumen Siswa</h1>
        <p>Dokumen Pendaftaran Siswa Baru</p>
    </div>

    {{-- IDENTITAS SISWA --}}
    <div class="section-title">
        A. Identitas Siswa
    </div>

    <table class="identity-table">
        <tr>
            <td class="label">
                Nama lengkap
            </td>

            <td class="value">
                {{ optional($siswa->user)->name ?? '-' }}
            </td>

            <td class="label">
                Jurusan
            </td>

            <td class="value">
                {{ optional($siswa->kelas)->nama_jurusan ?? '-' }}
            </td>
        </tr>

        <tr>
            <td class="label">
                NIK
            </td>

            <td class="value">
                {{ $siswa->nik ?: '-' }}
            </td>

            <td class="label">
                NISN
            </td>

            <td class="value">
                {{ $siswa->nisn ?: '-' }}
            </td>
        </tr>

        <tr>
            <td class="label">
                Jenis pendaftar
            </td>

            <td class="value">
                {{ $siswa->pindahan == 'Ya'
                    ? 'Siswa pindahan'
                    : 'Siswa baru' }}
            </td>

            <td class="label">
                Tanggal pendaftaran
            </td>

            <td class="value">
                {{ $siswa->tanggal_pendaftaran
                    ? \Carbon\Carbon::parse(
                        $siswa->tanggal_pendaftaran
                    )->format('d-m-Y')
                    : '-' }}
            </td>
        </tr>
    </table>

    <div class="status-box">
        <strong>Status dokumen:</strong>
        {{ optional($dokumen)->status ?? 'Belum diketahui' }}
    </div>

    {{-- DAFTAR DOKUMEN UTAMA --}}
    <div class="section-title">
        B. Kelengkapan Dokumen Utama
    </div>

    <table class="document-table">
        <thead>
            <tr>
                <th class="number">
                    No.
                </th>

                <th class="document-name">
                    Nama Dokumen
                </th>

                <th class="availability">
                    Ketersediaan
                </th>
            </tr>
        </thead>

        <tbody>
            @foreach ($dokumenUtama as $namaDokumen => $file)
                @php
                    $lokasiFile = $resolveDocumentPath($file);
                @endphp

                <tr>
                    <td class="number">
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        {{ $namaDokumen }}
                    </td>

                    <td class="availability">
                        @if ($file && $lokasiFile)
                            <span class="available">
                                Tersedia
                            </span>
                        @elseif ($file)
                            <span class="unavailable">
                                File tidak ditemukan
                            </span>
                        @else
                            <span class="unavailable">
                                Belum ada
                            </span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- DAFTAR DOKUMEN PINDAHAN --}}
    @if ($siswa->pindahan == 'Ya')
        <div class="section-title">
            C. Kelengkapan Dokumen Siswa Pindahan
        </div>

        @if ($dokumenPindahan)
            <table class="document-table">
                <thead>
                    <tr>
                        <th class="number">
                            No.
                        </th>

                        <th class="document-name">
                            Nama Dokumen
                        </th>

                        <th class="availability">
                            Ketersediaan
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($dokumenKhususPindahan as $namaDokumen => $file)
                        @php
                            $lokasiFile = $resolveDocumentPath($file);
                        @endphp

                        <tr>
                            <td class="number">
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                {{ $namaDokumen }}
                            </td>

                            <td class="availability">
                                @if ($file && $lokasiFile)
                                    <span class="available">
                                        Tersedia
                                    </span>
                                @elseif ($file)
                                    <span class="unavailable">
                                        File tidak ditemukan
                                    </span>
                                @else
                                    <span class="unavailable">
                                        Belum ada
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="status-box">
                Data dokumen siswa pindahan belum tersedia.
            </div>
        @endif
    @endif

    {{-- TANDA TANGAN --}}
    <table class="signature-table">
        <tr>
            <td>
                Mengetahui,
                <br>
                Orang Tua/Wali

                <div class="signature-space"></div>

                <span class="signature-name">
                    ........................................
                </span>
            </td>

            <td>
                {{ config('app.city', '................') }},
                {{ \Carbon\Carbon::now()->translatedFormat(
                    'd F Y'
                ) }}

                <br>

                Panitia Penerimaan

                <div class="signature-space"></div>

                <span class="signature-name">
                    ........................................
                </span>
            </td>
        </tr>
    </table>

    <div class="footer">
        Dicetak pada
        {{ \Carbon\Carbon::now()->translatedFormat(
            'd F Y, H:i'
        ) }}
    </div>

    {{-- SETIAP DOKUMEN UTAMA SATU HALAMAN --}}
    @foreach ($dokumenUtama as $namaDokumen => $file)
        @php
            $lokasiFile = $resolveDocumentPath($file);
        @endphp

        @if ($file && $lokasiFile && $isImage($file))
            <div class="document-page">
                <div class="document-page-title">
                    {{ $namaDokumen }}
                </div>

                <img
                    src="{{ $lokasiFile }}"
                    class="document-full-image"
                    alt="{{ $namaDokumen }}"
                >

                <div class="document-owner">
                    {{ optional($siswa->user)->name ?? '-' }}
                </div>

                <div class="document-file-info">
                    {{ basename($file) }}
                </div>
            </div>
        @endif
    @endforeach

    {{-- SETIAP DOKUMEN PINDAHAN SATU HALAMAN --}}
    @if (
        $siswa->pindahan == 'Ya' &&
        $dokumenPindahan
    )
        @foreach ($dokumenKhususPindahan as $namaDokumen => $file)
            @php
                $lokasiFile = $resolveDocumentPath($file);
            @endphp

            @if ($file && $lokasiFile && $isImage($file))
                <div class="document-page">
                    <div class="document-page-title">
                        {{ $namaDokumen }}
                    </div>

                    <img
                        src="{{ $lokasiFile }}"
                        class="document-full-image"
                        alt="{{ $namaDokumen }}"
                    >

                    <div class="document-owner">
                        {{ optional($siswa->user)->name ?? '-' }}
                    </div>

                    <div class="document-file-info">
                        Dokumen siswa pindahan:
                        {{ basename($file) }}
                    </div>
                </div>
            @endif
        @endforeach
    @endif
</body>

</html>