<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;

        }

        .container {
            width: 95%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 10px;
            box-sizing: border-box;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            max-width: 80px;
        }

        .header h1 {
            margin: 0;
            font-size: 18px;
        }

        .header p {
            margin: 0;
            font-size: 14px;
        }

        .content {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            table-layout: auto;
            /* Membiarkan tabel menyesuaikan konten */
        }

        .content,
        .content th,
        .content td {
            border: 1px solid black;
        }

        .content th,
        .content td {
            padding: 6px;
            text-align: center;
            font-size: 12px;
        }

        .content th {
            background-color: #f2f2f2;
        }

        .footer {
            text-align: right;
            margin-top: 20px;
            font-size: 14px;

            /* Media Query untuk cetak/PDF */
            @media print {
                body {
                    -webkit-print-color-adjust: exact;
                }

                .container {
                    width: 100%;
                    max-width: none;
                    box-shadow: none;
                }
            }
        }
    </style>
</head>

<body onload="window.print()">
    <div class="container">
        <div class="header">
            <h2>Biodata Siswa</h2>
        </div>
        <table class="content">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Tanggal Pendaftaran</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat Asal</th>
                    <th>Asal Sekolah</th>
                    <th>Nilai Rata</th>
                    <th>Sekolah Asal</th>
                    <th>Ijazah Terakhir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->kelas->nama_jurusan }}</td>
                        <td>{{ $item->tanggal_pendaftaran }}</td>
                        <td>{{ $item->jenis_kelamin }}</td>
                        <td>{{ $item->tempat_lahir }}</td>
                        <td>{{ $item->tanggal_lahir }}</td>
                        <td>{{ $item->alamat_asal }}</td>
                        <td>{{ $item->asal_sekolah }}</td>
                        <td>{{ $item->nilai_rata }}</td>
                        <td>{{ $item->sekolah_asal }}</td>
                        <td>{{ $item->ijazah_terakhir }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="footer">
            <p>Waktu Cetak: <?php echo date('d F Y'); ?></p>
        </div>
    </div>
</body>

</html>