<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prestasi extends Model
{
    //
    protected $fillable = [
        'krs_id',
        'tahun',
        'jenis_prestasi',
        'ket',
    ];

    public function krs()
    {
        return $this->belongsTo('App\krs','krs_id');
    }
}
