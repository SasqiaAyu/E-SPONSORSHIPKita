<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $guarded = [];

    public function college()
    {
        return $this->belongsTo(College::class, 'id_college', 'id');
    }
}
