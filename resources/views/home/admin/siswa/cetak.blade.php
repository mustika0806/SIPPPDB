<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Biodata {{ $item->user->name }}</title>

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
            line-height: 1.4;
        }

        .header {
            padding-bottom: 12px;
            margin-bottom: 18px;
            text-align: center;
            border-bottom: 3px solid #1f4e78;
        }

        .header h1 {
            margin: 0 0 4px;
            color: #1f4e78;
            font-size: 20px;
            text-transform: uppercase;
        }

        .header p {
            margin: 0;
            color: #555;
            font-size: 10px;
        }

        .status-wrapper {
            margin-bottom: 14px;
            text-align: center;
        }

        .status {
            display: inline-block;
            padding: 5px 12px;
            color: #fff;
            background-color: #1f4e78;
            border-radius: 3px;
            font-size: 10px;
            font-weight: bold;
        }

        .pindahan {
            background-color: #d39e00;
        }

        .section-title {
            padding: 7px 9px;
            margin-top: 14px;
            color: #fff;
            background-color: #1f4e78;
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            page-break-inside: avoid;
        }

        .data-table td {
            padding: 6px 8px;
            vertical-align: top;
            border: 1px solid #b7b7b7;
        }

        .data-table .label {
            width: 23%;
            color: #333;
            background-color: #f2f5f8;
            font-weight: bold;
        }

        .data-table .value {
            width: 27%;
        }

        .footer {
            margin-top: 22px;
            color: #666;
            font-size: 9px;
            text-align: right;
        }

        .signature-table {
            width: 100%;
            margin-top: 28px;
            border-collapse: collapse;
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
    </style>
</head>

<body>
    <div class="header">
        <h1>Biodata Siswa</h1>
        <p>Dokumen Data Pendaftaran Siswa Baru</p>
    </div>

    <div class="status-wrapper">
        <span class="status">
            Status: {{ $item->status ?? 'Belum diketahui' }}
        </span>

        @if ($item->pindahan == 'Ya')
            <span class="status pindahan">Siswa Pindahan</span>
        @endif
    </div>

    {{-- INFORMASI PENDAFTARAN --}}
    <div class="section-title">A. Informasi Pendaftaran</div>

    <table class="data-table">
        <tr>
            <td class="label">Nama lengkap</td>
            <td class="value">{{ $item->user->name ?? '-' }}</td>

            <td class="label">Nama panggilan</td>
            <td class="value">{{ $item->nama_panggilan ?? '-' }}</td>
        </tr>

        <tr>
            <td class="label">Jurusan</td>
            <td class="value">{{ $item->kelas->nama_jurusan ?? '-' }}</td>

            <td class="label">Tanggal pendaftaran</td>
            <td class="value">
                {{ $item->tanggal_pendaftaran ? \Carbon\Carbon::parse($item->tanggal_pendaftaran)->format('d-m-Y') : '-' }}
            </td>
        </tr>

        <tr>
            <td class="label">Status pendaftaran</td>
            <td class="value">{{ $item->status ?? '-' }}</td>

            <td class="label">Status siswa</td>
            <td class="value">
                {{ $item->pindahan == 'Ya' ? 'Siswa pindahan' : 'Siswa baru' }}
            </td>
        </tr>
    </table>

    {{-- IDENTITAS PRIBADI --}}
    <div class="section-title">B. Identitas Pribadi</div>

    <table class="data-table">
        <tr>
            <td class="label">NIK</td>
            <td class="value">{{ $item->nik ?? '-' }}</td>

            <td class="label">NISN</td>
            <td class="value">{{ $item->nisn ?? '-' }}</td>
        </tr>

        <tr>
            <td class="label">Nomor akta lahir</td>
            <td class="value">{{ $item->no_akta_lahir ?? '-' }}</td>

            <td class="label">Jenis kelamin</td>
            <td class="value">{{ $item->jenis_kelamin ?? '-' }}</td>
        </tr>

        <tr>
            <td class="label">Tempat lahir</td>
            <td class="value">{{ $item->tempat_lahir ?? '-' }}</td>

            <td class="label">Tanggal lahir</td>
            <td class="value">
                {{ $item->tanggal_lahir ? \Carbon\Carbon::parse($item->tanggal_lahir)->format('d-m-Y') : '-' }}
            </td>
        </tr>

        <tr>
            <td class="label">Agama</td>
            <td class="value">{{ $item->agama ?? '-' }}</td>

            <td class="label">Kewarganegaraan</td>
            <td class="value">{{ $item->kewarganegaraan ?? '-' }}</td>
        </tr>

        <tr>
            <td class="label">Jumlah saudara</td>
            <td class="value">{{ $item->jumlah_saudara ?? '-' }}</td>

            <td class="label">Kebutuhan khusus</td>
            <td class="value">{{ $item->kebutuhan_khusus ?? '-' }}</td>
        </tr>

        <tr>
            <td class="label">Tinggi badan</td>
            <td class="value">
                {{ $item->tinggi_badan ? $item->tinggi_badan . ' cm' : '-' }}
            </td>

            <td class="label">Berat badan</td>
            <td class="value">
                {{ $item->berat_badan ? $item->berat_badan . ' kg' : '-' }}
            </td>
        </tr>
    </table>

    {{-- KONTAK DAN ALAMAT --}}
    <div class="section-title">C. Kontak dan Alamat</div>

    <table class="data-table">
        <tr>
            <td class="label">Nomor HP siswa</td>
            <td class="value">{{ $item->no_hp ?? '-' }}</td>

            <td class="label">Nomor telepon orang tua</td>
            <td class="value">{{ $item->no_telp ?? '-' }}</td>
        </tr>

        <tr>
            <td class="label">Alamat email</td>
            <td class="value" colspan="3">{{ $item->alamat_email ?? '-' }}</td>
        </tr>

        <tr>
            <td class="label">Alamat</td>
            <td class="value" colspan="3">{{ $item->alamat_asal ?? '-' }}</td>
        </tr>

        <tr>
            <td class="label">RT</td>
            <td class="value">{{ $item->rt ?? '-' }}</td>

            <td class="label">RW</td>
            <td class="value">{{ $item->rw ?? '-' }}</td>
        </tr>

        <tr>
            <td class="label">Kelurahan</td>
            <td class="value">{{ $item->kelurahan ?? '-' }}</td>

            <td class="label">Kecamatan</td>
            <td class="value">{{ $item->kecamatan ?? '-' }}</td>
        </tr>

        <tr>
            <td class="label">Kota/Kabupaten</td>
            <td class="value">{{ $item->kota ?? '-' }}</td>

            <td class="label">Provinsi</td>
            <td class="value">{{ $item->provinsi ?? '-' }}</td>
        </tr>

        <tr>
            <td class="label">Kode pos</td>
            <td class="value">{{ $item->kode_pos ?? '-' }}</td>

            <td class="label">Status tempat tinggal</td>
            <td class="value">{{ $item->status_tempat ?? '-' }}</td>
        </tr>
    </table>

    {{-- DATA PENDIDIKAN --}}
    <div class="section-title">D. Data Pendidikan</div>

    <table class="data-table">
        <tr>
            <td class="label">Sekolah asal</td>
            <td class="value">{{ $item->sekolah_asal ?? $item->asal_sekolah ?? '-' }}</td>

            <td class="label">Ijazah terakhir</td>
            <td class="value">{{ $item->ijazah_terakhir ?? '-' }}</td>
        </tr>

        <tr>
            <td class="label">Nilai ijazah</td>
            <td class="value">{{ $item->nilai_ijazah ?? '-' }}</td>

            <td class="label">Nilai rata-rata</td>
            <td class="value">{{ $item->nilai_rata ?? '-' }}</td>
        </tr>
    </table>

    {{-- MINAT DAN PRESTASI --}}
    <div class="section-title">E. Minat dan Prestasi</div>

    <table class="data-table">
        <tr>
            <td class="label">Kegiatan olahraga</td>
            <td class="value">{{ $item->kegiatan_olahraga ?? '-' }}</td>

            <td class="label">Kegiatan kesenian</td>
            <td class="value">{{ $item->kegiatan_kesenian ?? '-' }}</td>
        </tr>

        <tr>
            <td class="label">Prestasi yang dicapai</td>
            <td class="value" colspan="3">{{ $item->prestasi ?? '-' }}</td>
        </tr>
    </table>

    {{-- TANDA TANGAN --}}
    <table class="signature-table">
        <tr>
            <td>
                Mengetahui,<br>
                Orang Tua/Wali

                <div class="signature-space"></div>

                <span class="signature-name">
                    ........................................
                </span>
            </td>

            <td>
                {{ config('app.city', '................') }},
                {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}<br>
                Panitia Penerimaan

                <div class="signature-space"></div>

                <span class="signature-name">
                    ........................................
                </span>
            </td>
        </tr>
    </table>

    <div class="footer">
        Dicetak pada {{ \Carbon\Carbon::now()->translatedFormat('d F Y, H:i') }}
    </div>
</body>

</html>