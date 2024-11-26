<?php

namespace App\Imports;

use App\nilai_pengetahuan;
use Maatwebsite\Excel\Concerns\ToModel;

class import_pengetahuan implements ToModel
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
                    $siswa=$row['3'];
                $cek=nilai_pengetahuan::where('siswa_id','=',$siswa)
                ->where('kelas_id','=',$kelas)
                ->where('mapel_id','=',$mapel)
                ->count();
                // dd($cek);
                if ($cek==0) {
                    nilai_pengetahuan::create([
                        'krs_id' => $krs,
                        'kelas_id' => $kelas,
                        'mapel_id' => $mapel,
                        'siswa_id' => $siswa,
                        'tugas1' => $row['5'],
                        'tugas2' => $row['6'],
                        'tugas3' => $row['7'],
                        'tugas4' => $row['8'],
                        'tugas5' => $row['9'],
                        'tugas6' => $row['10'],
                        'uh1' => $row['11'],
                        'uh2' => $row['12'],
                        'uh3' => $row['13'],
                        'uh4' => $row['14'],
                        'uh5' => $row['15'],
                        'uh6' => $row['16'],
                        'uts' => $row['17'],
                        'uas' => $row['18'],
                    ]);
                }else{
                    $pengetahuan=nilai_pengetahuan::where('siswa_id','=',$siswa)
                    ->where('kelas_id','=',$kelas)
                    ->where('mapel_id','=',$mapel)
                    ->first();
                    $pengetahuan_id=$pengetahuan->id;
                    $data=nilai_pengetahuan::find($pengetahuan->id);
                        // $data->krs_id=$krs;
                        // $data->kelas_id=$kelas;
                        // $data->siswa_id=$siswa;
                        // $data->mapel_id=$mapel;
                        $data->tugas1 = $row['5'];
                        $data->tugas2 = $row['6'];
                        $data->tugas3 = $row['7'];
                        $data->tugas4 = $row['8'];
                        $data->tugas5 = $row['9'];
                        $data->tugas6 = $row['10'];
                        $data->uh1 = $row['11'];
                        $data->uh2 = $row['12'];
                        $data->uh3 = $row['13'];
                        $data->uh4 = $row['14'];
                        $data->uh5 = $row['15'];
                        $data->uh6 = $row['16'];
                        $data->uts = $row['17'];
                        $data->uas = $row['18'];
                    $data->save();
                }
            }
        }
  }
}
