<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ujian extends Model
{
    protected $fillable = [
        'mapel_id', 
        'waktu',
        'durasi',
        'jenis',
        'status',
    ];
    public function mapel()
    {
        return $this->belongsTo('App\mapel','mapel_id');
    }
    public function nilai()
    {
        return $this->hasMany('App\nilai');
    }
    public function nilai_usp_ukk()
    {
        return $this->hasMany('App\nilai_usp_ukk');
    }
}