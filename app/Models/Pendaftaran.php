<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftarans';

    /**
     * Kolom yang boleh disimpan.
     */
    protected $fillable = [
        // Data pendaftar
        'user_id',
        'nama',
        'email',
        'no_hp',
        'alamat',

        // Jadwal PPDB terbaru
        'gelombang',
        'tanggal_buka_pendaftaran',
        'tanggal_akhir_pendaftaran',
        'tanggal_buka_seleksi',
        'tanggal_akhir_seleksi',
        'tanggal_buka_pengumuman',
        'tanggal_akhir_pengumuman',
        'tahun_akademik',
        'status',

        // Kolom jadwal lama
        'tahap',
        'mulai',
        'berakhir',
        'mulai_seleksi',
        'berakhir_seleksi',
        'mulai_pengumuman',
        'berakhir_pengumuman',

        // Tes Al-Quran
        'tes_quran',
        'catatan_tes_quran',
    ];

    /**
     * Konversi kolom tanggal menjadi Carbon.
     */
    protected $casts = [
        // Jadwal terbaru
        'tanggal_buka_pendaftaran' => 'date',
        'tanggal_akhir_pendaftaran' => 'date',
        'tanggal_buka_seleksi' => 'date',
        'tanggal_akhir_seleksi' => 'date',
        'tanggal_buka_pengumuman' => 'date',
        'tanggal_akhir_pengumuman' => 'date',

        // Jadwal lama
        'mulai' => 'date',
        'berakhir' => 'date',
        'mulai_seleksi' => 'date',
        'berakhir_seleksi' => 'date',
        'mulai_pengumuman' => 'date',
        'berakhir_pengumuman' => 'date',

        // Nilai
        'tes_quran' => 'integer',
    ];

    /**
     * Relasi jadwal atau pendaftaran dengan pengguna.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Menentukan tahap jadwal berdasarkan tanggal hari ini.
     *
     * Pemanggilan:
     * $pendaftaran->status_jadwal
     */
    public function getStatusJadwalAttribute()
    {
        $hariIni = Carbon::today();

        /*
        |--------------------------------------------------------------------------
        | Jadwal dinonaktifkan admin
        |--------------------------------------------------------------------------
        */
        if ($this->status === 'Tidak Aktif') {
            return 'Tidak Aktif';
        }

        /*
        |--------------------------------------------------------------------------
        | Jadwal belum lengkap
        |--------------------------------------------------------------------------
        */
        if (
            !$this->tanggal_buka_pendaftaran ||
            !$this->tanggal_akhir_pendaftaran ||
            !$this->tanggal_buka_seleksi ||
            !$this->tanggal_akhir_seleksi ||
            !$this->tanggal_buka_pengumuman ||
            !$this->tanggal_akhir_pengumuman
        ) {
            return 'Jadwal Belum Lengkap';
        }

        /*
        |--------------------------------------------------------------------------
        | Belum memasuki tanggal pendaftaran
        |--------------------------------------------------------------------------
        */
        if (
            $hariIni->lt(
                $this->tanggal_buka_pendaftaran
            )
        ) {
            return 'Belum Dibuka';
        }

        /*
        |--------------------------------------------------------------------------
        | Tahap pendaftaran
        |--------------------------------------------------------------------------
        */
        if (
            $hariIni->betweenIncluded(
                $this->tanggal_buka_pendaftaran,
                $this->tanggal_akhir_pendaftaran
            )
        ) {
            return 'Pendaftaran Dibuka';
        }

        /*
        |--------------------------------------------------------------------------
        | Menunggu tahap seleksi
        |--------------------------------------------------------------------------
        */
        if (
            $hariIni->gt(
                $this->tanggal_akhir_pendaftaran
            ) &&
            $hariIni->lt(
                $this->tanggal_buka_seleksi
            )
        ) {
            return 'Menunggu Seleksi';
        }

        /*
        |--------------------------------------------------------------------------
        | Tahap seleksi
        |--------------------------------------------------------------------------
        */
        if (
            $hariIni->betweenIncluded(
                $this->tanggal_buka_seleksi,
                $this->tanggal_akhir_seleksi
            )
        ) {
            return 'Tahap Seleksi';
        }

        /*
        |--------------------------------------------------------------------------
        | Menunggu tahap pengumuman
        |--------------------------------------------------------------------------
        */
        if (
            $hariIni->gt(
                $this->tanggal_akhir_seleksi
            ) &&
            $hariIni->lt(
                $this->tanggal_buka_pengumuman
            )
        ) {
            return 'Menunggu Pengumuman';
        }

        /*
        |--------------------------------------------------------------------------
        | Tahap pengumuman
        |--------------------------------------------------------------------------
        */
        if (
            $hariIni->betweenIncluded(
                $this->tanggal_buka_pengumuman,
                $this->tanggal_akhir_pengumuman
            )
        ) {
            return 'Tahap Pengumuman';
        }

        /*
        |--------------------------------------------------------------------------
        | Seluruh jadwal sudah berakhir
        |--------------------------------------------------------------------------
        */
        if (
            $hariIni->gt(
                $this->tanggal_akhir_pengumuman
            )
        ) {
            return 'Sudah Berakhir';
        }

        return 'Menunggu Tahap Berikutnya';
    }

    /**
     * Mengecek apakah pendaftaran sedang dibuka.
     */
    public function getPendaftaranDibukaAttribute()
    {
        return $this->status === 'Aktif' &&
            $this->status_jadwal === 'Pendaftaran Dibuka';
    }

    /**
     * Mengecek apakah seleksi sedang dibuka.
     */
    public function getSeleksiDibukaAttribute()
    {
        return $this->status === 'Aktif' &&
            $this->status_jadwal === 'Tahap Seleksi';
    }

    /**
     * Mengecek apakah pengumuman sedang dibuka.
     */
    public function getPengumumanDibukaAttribute()
    {
        return $this->status === 'Aktif' &&
            $this->status_jadwal === 'Tahap Pengumuman';
    }
}