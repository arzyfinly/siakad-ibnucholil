<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class log_ujian extends Model
{
    //
    protected $fillable = [
        'siswa_id',
        'ujian_id',
        'status',
    ];
    public function siswa()
    {
        return $this->belongsTo('App\siswa','siswa_id');
    }
    public function ujian()
    {
        return $this->belongsTo('App\ujian','ujian_id');
    }
}
