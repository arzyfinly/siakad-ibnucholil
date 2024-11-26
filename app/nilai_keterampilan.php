<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nilai_keterampilan extends Model
{
    //
    protected $fillable = [
        'krs_id', 
        'kelas_id', 
        'mapel_id', 
        'siswa_id', 
        'praktik1',
        'praktik2',
        'praktik3',
        'praktik4',
        'praktik5',
        'praktik6',
        'portofolio1',
        'portofolio2',
        'portofolio3',
        'portofolio4',
        'portofolio5',
        'portofolio6',
        'proyek1',
        'proyek2',
        'proyek3',
        'proyek4',
        'proyek5',
        'proyek6',
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
