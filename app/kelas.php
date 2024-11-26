<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    //
    protected $fillable = [
        'kelas', 
        'ket', 
        'jurusan_id', 
        'guru_id', 
        'daya_tampung',
    ];
    protected $with = (['munal','muke','dbk','dpk','kompe','mulok']);

    public function jurusan()
    {
        return $this->belongsTo('App\jurusan','jurusan_id');
    }
    public function guru()
    {
        return $this->belongsTo('App\guru','guru_id');
    }
    public function krs()//menampilkan user dengan data tes yang diikuti
    {
        return $this->hasMany('App\krs');
    }
    public function mapel()//menampilkan user dengan data tes yang diikuti
    {
        return $this->hasMany('App\mapel');
    }
    public function munal()//menampilkan user dengan data tes yang diikuti
    {
        return $this->hasMany('App\mapel')->where('kategori', 'Muatan Nasional')->groupBy('nama_mapel')->orderBy('urut');
    }
    public function muke()//menampilkan user dengan data tes yang diikuti
    {
        return $this->hasMany('App\mapel')->where('kategori', 'Muatan Kewilayahan')->groupBy('nama_mapel')->orderBy('urut');
    }
    public function dbk()//menampilkan user dengan data tes yang diikuti
    {
        return $this->hasMany('App\mapel')->where('kategori', 'Dasar Bidang Keahlian')->groupBy('nama_mapel')->orderBy('urut');
    }
    public function dpk()//menampilkan user dengan data tes yang diikuti
    {
        return $this->hasMany('App\mapel')->where('kategori', 'Dasar Program Keahlian')->groupBy('nama_mapel')->orderBy('urut');
    }
    public function kompe()//menampilkan user dengan data tes yang diikuti
    {
        return $this->hasMany('App\mapel')->where('kategori', 'Kompetensi Keahlian')->groupBy('nama_mapel')->orderBy('urut');
    }
    public function mulok()//menampilkan user dengan data tes yang diikuti
    {
        return $this->hasMany('App\mapel')->where('kategori', 'mulok')->groupBy('nama_mapel')->orderBy('urut');
    }
}
