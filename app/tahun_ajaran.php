<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tahun_ajaran extends Model
{
    //
    protected $fillable = [
        'tahun', 
        'jurusan_id',
    ];
    public function jurusan()
    {
        return $this->belongsTo('App\jurusan','jurusan_id');
    }
}
