<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Illuminate\Support\Collection; // Import Collection class

class DokumenSiswaExport implements FromCollection, ShouldAutoSize, WithDrawings, WithHeadings, WithMapping
{
    protected $siswa;
    protected $data; // Properti baru untuk menyimpan data teks

    public function __construct($siswa)
    {
        $this->siswa = $siswa;
        // Inisialisasi data teks di constructor
        $this->data = [
            "file_kk" => $this->siswa->dokumen_siswa->file_kk,
            "file_akta" => $this->siswa->dokumen_siswa->file_akta,
            "file_raport" => $this->siswa->dokumen_siswa->file_raport,
            "file_foto" => $this->siswa->dokumen_siswa->file_foto
        ];

        if ($this->siswa->dokumen_siswa_pindahan) {
            $this->data += [
                "Surat_pindah" => $this->siswa->dokumen_siswa_pindahan->surat_pindah,
                "Raport_Terakhir" => $this->siswa->dokumen_siswa_pindahan->raport_terakhir,
                "Keterangan_Prilaku_Baik" => $this->siswa->dokumen_siswa_pindahan->keterangan_prilaku_baik,
                "Surat_Rekomendasi" => $this->siswa->dokumen_siswa_pindahan->rekomendasi,
                "Surat_Perwalian" => $this->siswa->dokumen_siswa_pindahan->surat_perwalian,
                "Sertifikat_Akreditasi_Sekolah_Asal" => $this->siswa->dokumen_siswa_pindahan->sertifikat_akreditasi_sekolah,
                "KTP Ayah" => $this->siswa->dokumen_siswa_pindahan->ktp_ayah,
                "KTP Ibu" => $this->siswa->dokumen_siswa_pindahan->ktp_ibu,
                "KTP Wali" => $this->siswa->dokumen_siswa_pindahan->ktp_wali,
            ];
        }
    }

    // Mengimplementasikan FromCollection untuk menampilkan data teks
    public function collection()
    {
        // Mengembalikan data sebagai collection, bisa berupa array of arrays
        // Di sini kita mengemas setiap baris data menjadi satu entri
        return new Collection([$this->data]);
    }

    // Mengimplementasikan WithHeadings untuk menampilkan judul kolom
    public function headings(): array
    {
        return array_keys($this->data);
    }

    // Mengimplementasikan WithDrawings untuk menampilkan gambar
    public function drawings()
    {
        $drawings = [];
        $colIndex = 0;
        // Tentukan baris tempat gambar akan diletakkan (misalnya, setelah heading di baris 2)
        $row = 2;

        foreach ($this->data as $key => $path) {
            // Pastikan path gambar adalah path absolut dan file ada
            $absolutePath = public_path($path); // Sesuaikan jika path penyimpanan Anda berbeda (e.g., storage_path())

            if ($path && file_exists($absolutePath)) {
                $drawing = new Drawing();
                $drawing->setName($key);
                $drawing->setDescription($key . ' image');
                $drawing->setPath($absolutePath); // Gunakan path absolut
                $drawing->setHeight(100); // Sesuaikan tinggi gambar sesuai kebutuhan
                // Atur koordinat, kolom berdasarkan index, baris tetap
                $drawing->setCoordinates(chr(65 + $colIndex) . $row);

                $drawings[] = $drawing;
            }
            $colIndex++;
        }

        return $drawings;
    }

    // Opsional: Jika Anda ingin memformat data lebih lanjut sebelum ditampilkan
    public function map($row): array
    {
        // Anda bisa mengembalikan array data yang diformat di sini
        return $row;
    }
}
