<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class soal extends Model
{
    protected $fillable = [
        'mapel_id',
        'ujian_id',
        'soal_text',
        'soal_gambar',
        'text_a',
        'gambar_a',
        'text_b',
        'gambar_b',
        'text_c',
        'gambar_c',
        'text_d',
        'gambar_d',
        'text_e',
        'gambar_e',
        'kunci',
        'tipe',
        'skor',
    ];
    public function mapel()
    {
        return $this->belongsTo('App\mapel','mapel_id');
    }
    public function ujian()
    {
        return $this->belongsTo('App\ujian','ujian_id');
    }
}
            
