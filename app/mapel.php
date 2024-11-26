<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class mapel extends Model
{
    //
    protected $fillable = [
        'urut', 
        'nama_mapel', 
        'ket', 
        'kategori', 
        'semester', 
        'tahun', 
        'jurusan_id', 
        'kelas_id', 
        'guru_id',
    ];
    public function jurusan()
    {
        return $this->belongsTo('App\jurusan','jurusan_id');
    }
    public function kelas()
    {
        return $this->belongsTo('App\kelas','kelas_id');
    }
    public function guru()
    {
        return $this->belongsTo('App\guru','guru_id');
    }
    public function kd_mapel()//menampilkan user dengan data tes yang diikuti
    {
        return $this->hasMany('App\kd_mapel');
    }
    public function nilai_pengetahuan()//menampilkan user dengan data tes yang diikuti
    {
        return $this->hasMany('App\nilai_pengetahuan');
    }
    public function nilai_keterampilan()//menampilkan user dengan data tes yang diikuti
    {
        return $this->hasMany('App\nilai_keterampilan');
    }
    public function ujian()//menampilkan user dengan data tes yang diikuti
    {
        return $this->hasMany('App\ujian');
    }
    public function nilai_sikap()//menampilkan user dengan data tes yang diikuti
    {
        return $this->hasMany('App\nilai_sikap');
    }
    public function get_mapel($kelas_id){
        $mapel = DB::select(DB::raw("SELECT
                                        m1.id,
                                        m1.nama_mapel,
                                        m1.kategori,
                                        m1.ket,
                                        m1.urut
                                    FROM
                                        mapels m1
                                    WHERE
                                        m1.kelas_id = $kelas_id 
                                    GROUP BY
                                        m1.nama_mapel
                                    ORDER BY
                                        m1.urut"));
        return $mapel;
    }
}
