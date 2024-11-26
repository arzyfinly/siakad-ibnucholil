<?php

namespace App\Imports;

use App\guru;
use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class GuruImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if ($row['0']!=null) {
            if( $row['0']!="NO"){
                if( $row['1']!=null){
                    $cek=guru::where('nip','=',$row['6'])->count();
                if ($cek==0) {
                        $id = User::insertGetId([
                            'name' => $row['1'], 
                            'username' => $row['6'], 
                            'password'=>Hash::make($row['6']), 
                            'role_id'=> 4, 
                            'pic'=> $row['50'],
                            'status'=> "ibnucholil",
                        ]);
                        guru::create([
                            'user_id'=>$id,
                            'nama_lengkap'=>$row['1'],
                            'nuptk'=>$row['2'],
                            'jk'=>$row['3'],
                            'tempat_lahir'=>$row['4'],
                            'tanggal_lahir'=>$row['5'],
                            'nip'=>$row['6'],
                            'sk'=>$row['7'],
                            'jenis_ptk'=>$row['8'],
                            'agama'=>$row['9'],
                            'kk'=>$row['10'],
                            'nik'=>$row['11'],
                            'alamat'=>$row['12'],
                            'rt'=>$row['13'],
                            'rw'=>$row['14'],
                            'dusun'=>$row['15'],
                            'desa'=>$row['16'],
                            'kecamatan'=>$row['17'],
                            'kabupaten'=>$row['18'],
                            'provinsi'=>$row['19'],
                            'kode_pos'=>$row['20'],
                            'no_hp'=>$row['21'],
                            'email'=>$row['22'],
                            'tugas_tambahan'=>$row['23'],
                            'nama_ibu'=>$row['24'],
                            'sp'=>$row['25'],
                            'nama_pasangan'=>$row['26'],
                            'jumlah_anak'=>$row['27'],
                            'nama_bank'=>$row['28'],
                            'no_rek'=>$row['29'],
                            'an'=>$row['30'],
                            'sk_pengangkatan'=>$row['31'],
                            'tmt_pengangkatan'=>$row['32'],
                            'lembaga_pengangkatan'=>$row['33'],
                            'sumber_gaji'=>$row['34'],
                            'nama_sd'=>$row['35'],
                            'tahun_masuk_sd'=>$row['36'],
                            'tahun_lulus_sd'=>$row['37'],
                            'nama_smp'=>$row['38'],
                            'tahun_masuk_smp'=>$row['39'],
                            'tahun_lulus_smp'=>$row['40'],
                            'nama_sma'=>$row['41'],
                            'tahun_masuk_sma'=>$row['42'],
                            'tahun_lulus_sma'=>$row['43'],
                            'nama_s1'=>$row['44'],
                            'tahun_masuk_s1'=>$row['45'],
                            'tahun_lulus_s1'=>$row['46'],
                            'nama_s2'=>$row['47'],
                            'tahun_masuk_s2'=>$row['48'],
                            'tahun_lulus_s2'=>$row['49'],
                            'pic'=>$row['50'],
                        ]);
                    
                    }
                }

            }
        }
    }
}
