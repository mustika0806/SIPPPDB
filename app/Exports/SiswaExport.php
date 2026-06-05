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
            'Nama Panggilan',
            'Tinggi Badan',
            'Berat Badan',
            'Tanggal Pendaftaran',
            'Jenis Kelamin',
            'Agama',
            'Tempat/Tanggal Lahir',
            'Jumlah Saudara',
            'RT/RW',
            'Kode Pos',
            'Alamat Asal',
            'Kelurahan',
            'Kecamatan',
            'Kota',
            'Provinsi',
            'No Telp Ortu',
            'No Hp Siswa',
            'Alamat Email',
            'Kegiatan Olahraga',
            'Kegiatan Kesenian',
            'Prestasi',
            'Status Tempat',
            'Nilai Ujian Sekolah',
            'Sekolah Asal',
            'Nilai Ijazah',
            'Jurusan yang dipilih'
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
            $row->nama_panggilan,
            $row->tinggi_badan,
            $row->berat_badan,
            $row->tanggal_pendaftaran,
            $row->jenis_kelamin,
            $row->agama,
            $row->tempat_lahir . '/' . $row->tanggal_lahir,
            $row->jumlah_saudara,
            $row->rt_rw,
            $row->kode_pos,
            $row->alamat_asal,
            $row->kelurahan,
            $row->kecamatan,
            $row->kota,
            $row->provinsi,
            $row->no_telp,
            $row->no_hp,
            $row->alamat_email,
            $row->kegiatan_olahraga,
            $row->kegiatan_kesenian,
            $row->prestasi,
            $row->status_tempat,
            $row->nilai_rata,
            $row->sekolah_asal,
            $row->nilai_ijazah,
            $row->kelas->nama_jurusan,
        ];
    }
}
