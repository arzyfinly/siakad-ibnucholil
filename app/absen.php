<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class absen extends Model
{
    protected $fillable = [
        'krs_id',
        'tahun',
        'sakit',
        'izin',
        'alpha',
    ];

    public function krs()
    {
        return $this->belongsTo('App\krs','krs_id');
    }
    
}
