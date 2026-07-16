<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InterviewTest extends Model
{
    protected $table = 'interview_tests';

    protected $fillable = [
        'user_id',
        'interview_type',
        'interview_date',
        'interview_time',
        'interview_place',
        'meeting_link',
        'score',
        'status',
        'notes',
    ];

    protected $casts = [
        'interview_date' => 'date',
        'score' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}