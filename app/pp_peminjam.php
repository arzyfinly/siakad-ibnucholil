<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pp_peminjam extends Model
{
    //
    protected $fillable = [
        'user_id',
        'pp_buku_id',
        'tgl_pinjam',
        'tgl_kembali',
        'status',
    ];

    public function buku(){
        return $this->belongsTo('App\pp_buku','pp_buku_id');
    }
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function pp_denda(){
        return $this->hasOne('App\pp_denda');
    }
}
