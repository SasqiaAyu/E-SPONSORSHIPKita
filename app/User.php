<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;
    protected $fillable = [
        'nama',
        'alamat',
        'telp',
        'foto_sumber',
        'foto_nama',
        'foto_tipe',
        'jenis_user',
        'approve',
        'email', 
        'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function student()
    {
        return $this->hasOne('App\Student');
    }
    public function company()
    {
        return $this->hasOne('App\Company');
    }
}
