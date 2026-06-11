<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuranTes extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'test_date',
        'video_path', // bisa mp4, mp3, wav, dll
        'score',
        'notes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}