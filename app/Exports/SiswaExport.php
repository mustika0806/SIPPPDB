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
            'Nama Lengkap',
            'Nama Panggilan',
            'Tinggi Badan',
            'Berat Badan',
            'NIK',
            'Tanggal Pendaftaran',
            'Jenis Kelamin',
            'Agama',
            'Tempat/Tanggal Lahir',
            'Jumlah Saudara',
            'No Akta Lahir',
            'Kewarganegaraan',
            'Kebutuhan Khusus',
            'Anak Ke-',
            'Alamat',
            'RT',
            'RW',
            'Dusun',
            'Kode Pos',
            'Kelurahan',
            'Kecamatan',
            'Kota',
            'Provinsi',
            'Lintang',
            'Bujur',
            'Nama Ayah',
            'Nama Ibu',
            'Pekerjaan Ayah',
            'Pekerjaan Ibu',
            'No Hp Orang Tua',
            'No Hp Siswa',
            'Alamat Email',
            'Kegiatan Olahraga',
            'Kegiatan Kesenian',
            'Prestasi',
            'Tempat Tinggal',
            'Transportasi',
            'No KKS',
            'Penerima KPS/PKH',
            'Nilai Ujian Sekolah',
            'Sekolah Asal',
            'Nilai Ijazah',
            'NISN',
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
            $row->user->name,
            $row->nama_panggilan,
            $row->tinggi_badan,
            $row->berat_badan,
            $row->nik,
            $row->tanggal_pendaftaran,
            $row->jenis_kelamin,
            $row->agama,
            $row->tempat_lahir . '/' . $row->tanggal_lahir,
            $row->jumlah_saudara,
            $row->no_akta_lahir,
            $row->kewarganegaraan,
            $row->kebutuhan_khusus,
            $row->anak_ke,
            $row->alamat_asal,
            $row->rt,
            $row->rw,
            $row->dusun,
            $row->kode_pos,
            $row->kelurahan,
            $row->kecamatan,
            $row->kota,
            $row->provinsi,
            $row->lintang,
            $row->bujur,
            $row->nama_ayah,
            $row->nama_ibu,
            $row->pekerjaan_ayah,
            $row->pekerjaan_ibu,
            $row->no_telp,
            $row->no_hp,
            $row->alamat_email,
            $row->kegiatan_olahraga,
            $row->kegiatan_kesenian,
            $row->prestasi,
            $row->status_tempat,
            $row->transportasi,
            $row->no_kks,
            $row->kps_pkp,
            $row->nilai_rata,
            $row->sekolah_asal,
            $row->nilai_ijazah,
            $row->nisn,
            $row->kelas->nama_jurusan,
        ];
    }
}