<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuranTes extends Model
{
    use HasFactory;

    protected $table = 'quran_tes';

    protected $fillable = [
        'user_id',
        'test_date',

        // Detail bacaan siswa
        'juz',
        'surat',
        'ayat',
        'keterangan_bacaan',

        // File video
        'video_path',

        // Penilaian admin
        'score',
        'notes',
        'status',
    ];

    protected $casts = [
        'test_date' => 'date',
        'score' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}