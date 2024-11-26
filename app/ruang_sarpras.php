<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ruang_sarpras extends Model
{
    //
    protected $fillable = [
        'nama_ruang',
        'kode_ruang',
        'panjang',
        'lebar',
        'nominal',
        'foto_gedung',
        'keterangan',
        'perolehan',
        'tahun',
        'milik',
    ];

    public function barang()//menampilkan user dengan data tes yang diikuti
    {
        return $this->hasMany('App\sarpras');
    }

}
