<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithColumnWidths; // Tambahkan ini
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Illuminate\Support\Collection;

class DokumenSiswaExport implements FromCollection, WithDrawings, WithMapping, WithEvents, WithColumnWidths
{
    protected $siswa;
    protected $data;

    public function __construct($siswa)
    {
        $this->siswa = $siswa;
        $this->data = [
            "file_kk" => $this->siswa->dokumen_siswa->file_kk,
            "file_ktp" => $this->siswa->dokumen_siswa->file_ktp,
            "file_akta" => $this->siswa->dokumen_siswa->file_akta,
            "file_raport" => $this->siswa->dokumen_siswa->file_raport,
            "file_ijazah" => $this->siswa->dokumen_siswa->file_ijazah,
            "file_kip" => $this->siswa->dokumen_siswa->file_kip,
            "file_keputusan" => $this->siswa->dokumen_siswa->file_keputusan,
            "file_foto" => $this->siswa->dokumen_siswa->file_foto
        ];
    }

    public function collection()
    {
        return new Collection([$this->data]);
    }

    public function map($row): array
    {
        return ['', '', '', '', ''];
    }

    // TAMBAHKAN FUNGSI INI
    public function columnWidths(): array
    {
        return [
            'A' => 25, // Atur lebar Kolom A (disesuaikan agar muat gambar)
            'B' => 25, // Atur lebar Kolom B
            'C' => 25, // Atur lebar Kolom C
            'D' => 25, // Atur lebar Kolom D
            'E' => 25, // Atur lebar Kolom E
            'F' => 25, // Atur lebar Kolom F
            'G' => 25, // Atur lebar Kolom G
            'H' => 25, // Atur lebar Kolom H
        ];
    }

    public function drawings()
    {
        $drawings = [];
        $columns = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
        $colIndex = 0;

        foreach ($this->data as $key => $path) {
            $absolutePath = storage_path('app/public/' . str_replace('storage/', '', $path));

            if ($path && file_exists($absolutePath)) {
                $drawing = new Drawing();
                $drawing->setName($key);
                $drawing->setDescription($key . ' image');
                $drawing->setPath($absolutePath);

                // 1. Perbesar ukuran gambar (contoh: tinggi 150px)
                $drawing->setHeight(150);

                // 2. Beri jarak (offset) agar gambar berada di tengah sel & tidak dempet
                $drawing->setOffsetX(15);
                $drawing->setOffsetY(15);

                $drawing->setCoordinates($columns[$colIndex] . '2');
                $drawings[] = $drawing;
            }
            $colIndex++;
        }

        return $drawings;
    }

    // 3. Mengatur ukuran sel secara manual agar gambar muat dan jelas
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // Atur tinggi baris ke-2 (tempat gambar berada)
                // Tinggi harus lebih besar dari setHeight() + offsetY
                $event->sheet->getDelegate()->getRowDimension(2)->setRowHeight(140);

                // Atur lebar masing-masing kolom A sampai E secara manual
                $columns = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
                foreach ($columns as $col) {
                    $event->sheet->getDelegate()->getColumnDimension($col)->setWidth(30);
                }
            },
        ];
    }
}