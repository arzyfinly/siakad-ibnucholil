<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sarpras extends Model
{
    //
    protected $fillable = [
        'inventaris_barang',
        'nomor_barang',
        'letak',
        'nama_barang',
        'merek',
        'tahun',
        'anggaran',
        'nominal',
        'jumlah',
        'spesifikasi',
        'fungsi',
        'pic',
    ];

    protected $with = ['ruangan'];

    public function perawatan()//menampilkan user dengan data tes yang diikuti
    {
        return $this->hasMany('App\perawatan_sarpras');
    }
    public function ruangan()//menampilkan user dengan data tes yang diikuti
    {
        return $this->belongsTo('App\ruang_sarpras', 'letak');
    }
}
