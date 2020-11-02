<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $guarded = [];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'id_faculty', 'id');
    }
}
