<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [
    // field lainnya
    'tes_quran',
    'catatan_tes_quran',
];
}
