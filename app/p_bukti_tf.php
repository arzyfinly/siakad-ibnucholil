<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class p_bukti_tf extends Model
{
    //
    protected $fillable = [
        'user_id', 
        'detail_id', 
        'jumlah_tf', 
        'pic',
        'v_status',
    ];
    public function detail()
    {
        return $this->belongsTo('App\detail','detail_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
