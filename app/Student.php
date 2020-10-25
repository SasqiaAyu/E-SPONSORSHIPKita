<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;
    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'major_id',
        'faculty_id',
        'foto_nim_sumber',
        'foto_nim_nama',
        'foto_nim_tipe'
    ];

    public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }
    public function faculty()
    {
        return $this->belongsTo ('App\Faculty');
    }
    public function major()
    {
        return $this->belongsTo ('App\major');
    }
}
