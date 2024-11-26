<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eskul extends Model
{
    //
    protected $fillable = [
        'krs_id',
        'tahun',
        'nilai',
        'kegiatan',
        'ket',
    ];

    public function krs()
    {
        return $this->belongsTo('App\krs','krs_id');
    }
}
