<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Siswa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /*
    |--------------------------------------------------------------------------
    | CASTING (ini penting biar data konsisten)
    |--------------------------------------------------------------------------
    */
    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_pendaftaran' => 'date',
        'is_save' => 'boolean',
        'tinggi_badan' => 'integer',
        'jumlah_saudara' => 'integer',
        'berat_badan' => 'integer',
        'nilai_ijazah' => 'integer',
        'nilai_rata' => 'integer',
        'nilai_quran' => 'integer',
        'nilai_wawancara' => 'integer',
        'total_nilai' => 'decimal:2',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class);
    }

    public function pendaftaran(): BelongsTo
    {
        return $this->belongsTo(Pendaftaran::class);
    }

    public function dokumen_siswa(): HasOne
    {
        return $this->hasOne(DokumenSiswa::class);
    }

    public function dokumen_siswa_pindahan(): HasOne
    {
        return $this->hasOne(DokumenSiswaPindahan::class);
    }

    public function penilaian(): HasMany
    {
        return $this->hasMany(Penilaian::class);
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSOR (biar alamat lebih enak dipakai)
    |--------------------------------------------------------------------------
    */

    public function getAlamatLengkapAttribute(): string
    {
        return trim(
            "{$this->alamat_asal}, {$this->kelurahan}, {$this->kecamatan}, {$this->kota}, {$this->provinsi}"
        );
    }

    /*
    |--------------------------------------------------------------------------
    | BUSINESS LOGIC HELPERS
    |--------------------------------------------------------------------------
    */

    public function isComplete(): bool
    {
        return $this->is_save === true;
    }

    public function isDiterima(): bool
    {
        return $this->status === 'Diterima';
    }

    public function isMenunggu(): bool
    {
        return $this->status === 'Menunggu Konfirmasi';
    }
    public function isTidakDiterima(): bool
    {
        return $this->status === 'Tidak Diterima';
    }

    public function progressStep(): string
    {
        return match (true) {
            empty($this->nisn) => 'biodata',
            empty($this->nilai_rata) => 'wali',
            default => 'selesai',
        };
    }
}