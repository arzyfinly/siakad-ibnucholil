<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pp_pengunjung extends Model
{
    //
    protected $fillable = [
        'user_id',
        'tgl',
    ];
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
