<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prakerin extends Model
{
    //
    protected $fillable = [
        'krs_id',
        'tahun',
        'nilai',
        'mitra',
        'lokasi',
        'lama',
        'ket',
    ];

    public function krs()
    {
        return $this->belongsTo('App\krs','krs_id');
    }
}
