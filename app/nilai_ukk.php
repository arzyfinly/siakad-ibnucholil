<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nilai_ukk extends Model
{
    //
    protected $fillable = [
        'siswa_id',
        'kelas_id',
        'mapel_id',
        'nilai',
    ];
    public function siswa()
    {
        return $this->belongsTo('App\siswa','siswa_id');
    }
    public function kelas()
    {
        return $this->belongsTo('App\kelas','kelas_id');
    }
    public function mapel()
    {
        return $this->belongsTo('App\mapel','mapel_id');
    }
}
