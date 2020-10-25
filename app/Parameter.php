<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    protected $fillable = [
        'student_id',
        'nama_event',
        'tgl_mulai',
        'file',
        'approve',
        'company_id',
        'tgl_approve'
    ];
}
