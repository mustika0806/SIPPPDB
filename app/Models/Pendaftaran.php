<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftarans';

    protected $fillable = [
        'user_id',
        'nama',
        'email',
        'no_hp',
        'alamat',
        'mulai',
        'berakhir',
        'tahun_akademik',
        'tes_quran',
        'catatan_tes_quran',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}