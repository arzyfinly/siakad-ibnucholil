<?php

namespace App\Imports;

use App\nilai_keterampilan;
use Maatwebsite\Excel\Concerns\ToModel;

class import_keterampilan implements ToModel
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
            $cek=nilai_keterampilan::where('siswa_id','=',$siswa)
            ->where('kelas_id','=',$kelas)
            ->where('mapel_id','=',$mapel)
            ->count();
            // dd($cek);
            if ($cek==0) {
                nilai_keterampilan::create([
                    'krs_id' => $krs,
                    'kelas_id' => $kelas,
                    'mapel_id' => $mapel,
                    'siswa_id' => $siswa,
                    'praktik1' => $row['5'],
                    'praktik2' => $row['6'],
                    'praktik3' => $row['7'],
                    'praktik4' => $row['8'],
                    'praktik5' => $row['9'],
                    'praktik6' => $row['10'],
                    'portofolio1' => $row['11'],
                    'portofolio2' => $row['12'],
                    'portofolio3' => $row['13'],
                    'portofolio4' => $row['14'],
                    'portofolio5' => $row['15'],
                    'portofolio6' => $row['16'],
                    'proyek1' => $row['17'],
                    'proyek2' => $row['18'],
                    'proyek3' => $row['19'],
                    'proyek4' => $row['20'],
                    'proyek5' => $row['21'],
                    'proyek6' => $row['22'],
                ]);
            }else{
                $keterampilan=nilai_keterampilan::where('siswa_id','=',$siswa)
                ->where('kelas_id','=',$kelas)
                ->where('mapel_id','=',$mapel)
                ->first();
                $keterampilan_id=$keterampilan->id;
                $data=nilai_keterampilan::find($keterampilan->id);
                        // $data->krs_id=$krs;
                        // $data->kelas_id=$kelas;
                        // $data->siswa_id=$siswa;
                        // $data->mapel_id=$mapel;
                $data->praktik1 = $row['5'];
                $data->praktik2 = $row['6'];
                $data->praktik3 = $row['7'];
                $data->praktik4 = $row['8'];
                $data->praktik5 = $row['9'];
                $data->praktik6 = $row['10'];
                $data->portofolio1 = $row['11'];
                $data->portofolio2 = $row['12'];
                $data->portofolio3 = $row['13'];
                $data->portofolio4 = $row['14'];
                $data->portofolio5 = $row['15'];
                $data->portofolio6 = $row['16'];
                $data->proyek1 = $row['17'];
                $data->proyek2 = $row['18'];
                $data->proyek3 = $row['19'];
                $data->proyek4 = $row['20'];
                $data->proyek5 = $row['21'];
                $data->proyek6 = $row['22'];
                $data->save();
            }
        }
    }
  }
}
