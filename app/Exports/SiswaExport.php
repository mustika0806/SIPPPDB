<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SiswaExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    protected $siswa;
    public function __construct($siswa)
    {
        $this->siswa = $siswa;
    }
    public function headings(): array
    {
        return [
            'NISN',
            'Nama Lengkap',
            'Tanggal Pendaftaran',
            'Jenis Kelamin',
            'Tempat/Tanggal Lahir',
            'Alamat Asal',
            'Asal Sekolah',
            'Nilai Rata',
            'Sekolah Asal',
            'Ijazah Terakhir',
            'Jurusan yang dipilih',
        ];
    }
    public function collection()
    {
        return $this->siswa;
    }
    public function map($row): array
    {
        // dd($row);
        return [
            $row->nisn,
            $row->user->name,
            $row->tanggal_pendaftaran,
            $row->jenis_kelamin,
            $row->tempat_lahir . '/' . $row->tanggal_lahir,
            $row->alamat_asal,
            $row->asal_sekolah,
            $row->nilai_rata,
            $row->sekolah_asal,
            $row->ijazah_terakhir,
            $row->kelas->nama_jurusan,
        ];
    }
}
