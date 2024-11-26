<?php

namespace App\Imports;

use App\kd_mapel;
use Maatwebsite\Excel\Concerns\ToModel;

class import_kd_mapel implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    protected $kriteria;
    protected $mapel_id;

    function __construct($kriteria, $mapel_id) {
            $this->kriteria = $kriteria;
            $this->mapel_id = $mapel_id;
    }

    public function model(array $row)
    {
        if ($row['0']!=null) {
            if( $row['0']!="NO KD"){
                $no_kd=$row['0'];
                $kd=$row['1'];
                $cek=kd_mapel::where('mapel_id','=',$this->mapel_id)
                ->where('kriteria','=',$this->kriteria)
                ->where('no_kd','=',$no_kd)
                ->count();
                // dd($cek);
                if ($cek==0) {
                    kd_mapel::create([
                        'mapel_id' => $this->mapel_id,
                        'no_kd' => $no_kd,
                        'kd' => $kd,
                        'kriteria' => $this->kriteria,
                    ]);
                }
            }
        }
    }
}
