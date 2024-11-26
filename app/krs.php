<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class krs extends Model
{
    //
    protected $fillable = [
        'kelas_id', 
        'siswa_id',
        'semester',
        'tahun',
    ];
    public function kelas()
    {
        return $this->belongsTo('App\kelas','kelas_id');
    }
    public function siswa()
    {
        return $this->belongsTo('App\siswa','siswa_id');
    }
    public function prakerin()//menampilkan user dengan data tes yang diikuti
    {
        return $this->hasMany('App\prakerin');
    }
    public function eskul()//menampilkan user dengan data tes yang diikuti
    {
        return $this->hasMany('App\eskul');
    }
    public function prestasi()//menampilkan user dengan data tes yang diikuti
    {
        return $this->hasMany('App\prestasi');
    }
    public function absen()//menampilkan user dengan data tes yang diikuti
    {
        return $this->hasMany('App\absen');
    }
    public function catatan()//menampilkan user dengan data tes yang diikuti
    {
        return $this->hasMany('App\catatan');
    }
    public function nilai_keterampilan()
    {
        return $this->hasMany('App\nilai_keterampilan')->with('mapel','kelas');
    }
    public function nilai_pengetahuan()
    {
        return $this->hasMany('App\nilai_pengetahuan')->with('mapel','kelas');
    }
    public function nilai_sikap()
    {
        return $this->hasMany('App\nilai_sikap')->with('mapel','kelas');
    }
}
