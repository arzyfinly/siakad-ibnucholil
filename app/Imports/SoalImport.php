<?php

namespace App\Imports;

use App\soal;
use Maatwebsite\Excel\Concerns\ToModel;

class SoalImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    protected $ujian_id;
    protected $mapel_id;

    function __construct($ujian_id, $mapel_id) {
            $this->ujian_id = $ujian_id;
            $this->mapel_id = $mapel_id;
    }
    public function model(array $row)
    {
        if ($row['0']!=null) {
            if( $row['0']!="NO"){
                $cek=soal::where('soal_text','=',$row['1'])
                        ->where('ujian_id','=',$this->ujian_id)
                        ->where('mapel_id','=',$this->mapel_id)
                        ->count();
                if ($cek==0) {
                    return new soal([
                        'nama_lengkap'=> $row['1'],
                        'mapel_id'=> $this->mapel_id,
                        'ujian_id'=> $this->ujian_id,
                        'soal_text'=> $row['1'],
                        'text_a'=> $row['2'],
                        'text_b'=> $row['3'],
                        'text_c'=> $row['4'],
                        'text_d'=> $row['5'],
                        'text_e'=> $row['6'],
                        'kunci'=> $row['7'],
                        'tipe'=> $row['8'],
                        'skor'=> $row['9'],
                    ]);
                }
            }
        }
    }
}
