<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nilai_usp_ukk extends Model
{
    //
    protected $fillable = [
        'siswa_id',
        'ujian_id',
        'nilai',
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
