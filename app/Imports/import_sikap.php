<?php

namespace App\Imports;

use App\nilai_sikap;
use Maatwebsite\Excel\Concerns\ToModel;

class import_sikap implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if ($row['0']!=null) { 
                if( $row['0']!="ID"){
                    $krs=$row['0'];
                    $kelas=$row['1'];
                    $mapel=$row['2'];
                    $siswa = $row['3'];
                $cek=nilai_sikap::where('siswa_id','=',$siswa)
                ->where('kelas_id','=',$kelas)
                ->where('mapel_id','=',$mapel)
                ->count();
                // dd($cek);
                if ($cek==0) {
                    nilai_sikap::create([
                        'krs_id' => $krs,
                        'kelas_id' => $kelas,
                        'mapel_id' => $mapel,
                        'siswa_id' => $siswa,
                        'mapel_id' => $mapel,
                        'sikap' => $row['5'],
                        'deskripsi' => $row['6'],
                        'alpha' => $row['7'],
                        'izin' => $row['8'],
                        'sakit' => $row['9'],
                    ]);
                }else{
                    $sikap=nilai_sikap::where('siswa_id','=',$siswa)
                    ->where('kelas_id','=',$kelas)
                    ->where('mapel_id','=',$mapel)
                    ->first();
                    $sikap_id=$sikap->id;
                    $data=nilai_sikap::find($sikap->id);
                        // $data->krs_id=$krs;
                        // $data->kelas_id=$kelas;
                        // $data->siswa_id=$siswa;
                        // $data->mapel_id=$mapel;
                        $data->sikap = $row['5'];
                        $data->deskripsi = $row['6'];
                        $data->alpha = $row['7'];
                        $data->izin = $row['8'];
                        $data->sakit = $row['9'];
                    $data->save();
                }
            }
        }
  } 
}
