<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InterviewTest extends Model
{
    protected $table = 'interviews';

    protected $fillable = [
        'user_id',
        'interview_type',
        'interview_date',
        'interview_time',
        'interview_place',
        'meeting_link',
        'whatsapp_number',
        'score',
        'status',
        'notes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}