<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pp_buku extends Model
{
    protected $fillable = [
        'tanggal_terima',
        'no_klasifikasi',
        'pengarang',
        'judul',
        'perolehan',
        'penerbit',
        'tahun_terbit',
        'harga',
        'deskripsi',
        'jumlah_halaman',
        'jumlah_buku',
        'pic',
    ];
}
