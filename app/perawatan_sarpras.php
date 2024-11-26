<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class perawatan_sarpras extends Model
{
    //
    protected $fillable = [
            'sarpras_id',
            'tanggal',
            'ket',
            'nominal',
            'ttd1',
            'ttd2',
    ];
}
