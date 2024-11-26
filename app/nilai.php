<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nilai extends Model
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
    public function usp()
    {
        return $this->belongsTo('App\ujian','ujian_id')->with('mapel')->where('jenis', 'USP');
    }
    public function ukk()
    {
        return $this->belongsTo('App\ujian','ujian_id')->with('mapel')->where('jenis', 'UKK');
    }
}
