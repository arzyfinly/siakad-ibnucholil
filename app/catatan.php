<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class catatan extends Model
{
    //
    protected $fillable = [
        'krs_id',
        'tahun',
        'catatan',
        'ket',
    ];

    public function krs()
    {
        return $this->belongsTo('App\krs','krs_id');
    }
}
