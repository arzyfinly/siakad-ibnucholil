<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class waktu_ujian extends Model
{
    //
    protected $fillable = [
        'siswa_id',
        'ujian_id',
        'waktu_mulai',
        'waktu_akhir',
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
