<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pp_denda extends Model
{
    //
    protected $fillable = [
        'pp_peminjam_id',
        'denda',
    ];
    public function peminjam(){
        return $this->belongsTo('App\pp_peminjam','pp_peminjam_id');
    }
}
