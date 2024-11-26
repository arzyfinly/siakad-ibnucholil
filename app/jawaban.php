<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jawaban extends Model
{
    protected $fillable = [
        'siswa_id',
        'ujian_id',
        'soal_id',
        'jawaban',
        'status',
        'skor',
    ];
    public function siswa()
    {
        return $this->belongsTo('App\siswa','siswa_id');
    }
    
    public function ujian()
    {
        return $this->belongsTo('App\ujian','ujian_id');
    }
    public function soal()
    {
        return $this->belongsTo('App\soal','soal_id');
    }
}
