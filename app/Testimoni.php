<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $table = 'testimonies';
    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'pesan',
        'create_at',
        'updated_at'
    ];
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
