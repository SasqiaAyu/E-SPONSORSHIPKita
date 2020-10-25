<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proposal extends Model
{
    use SoftDeletes;
    public $timestamps = true;

    protected $fillable = [
        'student_id',
        'nama_event',
        'tgl_mulai',
        'file',
        'approve',
        'company_id',
        'tgl_approve',
        'file_sumber',
        'file_nama',
        'file_tipe'
    ];

    public function student()
    {
        return $this->hasOne('App\Student','id','student_id');
    }
    public function company()
    {
        return $this->hasOne('App\Company','id','company_id');
    }
}
