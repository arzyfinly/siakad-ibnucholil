<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kd_mapel extends Model
{
    //
    protected $fillable = [
        'mapel_id', 
        'no_kd', 
        'kd',
        'kriteria',
    ];
    public function mapel()
    {
        return $this->belongsTo('App\mapel','mapel_id');
    }
    public function nilai_tugas()//menampilkan user dengan data tes yang diikuti
    {
        return $this->hasMany('App\nilai_tugas');
    }
    public function nilai_uh()//menampilkan user dengan data tes yang diikuti
    {
        return $this->hasMany('App\nilai_uh');
    }
}
