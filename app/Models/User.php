<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guarded = ['id'];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function getUnreadNotifications()
    {
        return $this->unreadNotifications;
    }
    public function daftar_ulang()
    {
        return $this->hasOne(DaftarUlang::class, 'user_id', 'id');
    }
   public function interview()
{
    return $this->hasOne(InterviewsTest::class, 'user_id', 'id');
}
}
