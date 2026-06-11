<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InterviewTest extends Model
{
    protected $table = 'interview_tests';

    protected $fillable = [
        'user_id',
        'interview_date',
        'meeting_link',
        'score',
        'notes',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}