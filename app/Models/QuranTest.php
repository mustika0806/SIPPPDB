<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuranTest extends Model
{
    protected $fillable = [
        'user_id',
        'test_date',
        'video_path',
        'score',
        'notes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}