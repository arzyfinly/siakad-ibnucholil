<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nilai_sikap extends Model
{
    //
    protected $fillable = [
        'krs_id', 
        'kelas_id', 
        'mapel_id', 
        'siswa_id', 
        'sikap',
        'deskripsi',
        'alpha',
        'izin',
        'sakit',
    ];
    public function kelas(){
        return $this->belongsTo('App\kelas','kelas_id');

    }
    public function mapel(){
        return $this->belongsTo('App\mapel','mapel_id');
    }
    public function siswa(){
        return $this->belongsTo('App\siswa','siswa_id');
    }
    public function krs(){
        return $this->belongsTo('App\krs','krs_id');
    }
}
