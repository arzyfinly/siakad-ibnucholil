<?php

namespace App\Imports;

use App\siswa;
use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class SiswaImport implements ToModel
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
                if( $row['42']!=null){
                        $cek=siswa::where('nisn','=',$row['42'])->count();
                    if ($cek==0) {
                        $id = User::insertGetId([
                            'name' => $row['1'], 
                            'username' => $row['42'], 
                            'password'=>Hash::make("ibnucholil"), 
                            'role_id'=> 2, 
                            'pic'=> $row['73'],
                            'status'=> "ibnucholil",
                        ]);
                        siswa::create([
                            'nama_lengkap'=> $row['1'],
                            'jk'=> $row['2'],
                            'nomor_kk'=> $row['3'],
                            'nik'=> $row['4'],
                            'nomor_akte'=> $row['5'],
                            'tempat_lahir'=> $row['6'],
                            'tanggal_lahir'=> $row['7'],
                            'alamat'=> $row['8'],
                            'desa'=> $row['9'],
                            'kecamatan'=> $row['10'],
                            'kabupaten'=> $row['11'],
                            'provinsi'=> $row['12'],
                            'kode_pos'=> $row['13'],
                            'no_hp'=> $row['14'],
                            'bahasa'=> $row['15'],
                            'tinggi_badan'=> $row['16'],
                            'berat_badan'=> $row['17'],
                            'anak_ke'=> $row['18'],
                            'saudara_kandung'=> $row['19'],
                            'saudara_tiri'=> $row['20'],
                            'hobi'=> $row['21'],
                            'riwayat_sakit'=> $row['22'],
                            'buta_warna'=> $row['23'],
                            'kelainan_fisik'=> $row['24'],

                            'sekolah_asal'=> $row['25'],
                            'npsn'=> $row['26'],
                            'alamat_sekolah'=> $row['27'],
                            'desa_sekolah'=> $row['28'],
                            'kecamatan_sekolah'=> $row['29'],
                            'kabupaten_sekolah'=> $row['30'],
                            'provinsi_sekolah'=> $row['31'],
                            'kode_pos_sekolah'=> $row['32'],
                            'lama_sekolah'=> $row['33'],
                            'npun'=> $row['34'],
                            'ijazah_sd'=> $row['35'],
                            'skhun_sd'=> $row['36'],
                            'orang_tua_sd'=> $row['37'],
                            'ijazah_smp'=> $row['38'],
                            'skhun_smp'=> $row['39'],
                            'orang_tua_smp'=> $row['40'],

                            'nis'=> $row['41'],
                            'nisn'=> $row['42'],
                            'pilihan_jurusan'=> $row['43'],
                            'tahun'=> $row['44'],
                            'ukuran_baju'=> $row['45'],

                            'nama_ayah'=> $row['46'],
                            'nik_ayah'=> $row['47'],
                            'nomor_ayah'=> $row['48'],
                            'tempat_lahir_ayah'=> $row['49'],
                            'tanggal_lahir_ayah'=> $row['50'],
                            'pekerjaan_ayah'=> $row['51'],
                            'pendidikan_ayah'=> $row['52'],
                            'penghasilan_ayah'=> $row['53'],

                            'nama_ibu'=> $row['54'],
                            'nik_ibu'=> $row['55'],
                            'nomor_ibu'=> $row['56'],
                            'tempat_lahir_ibu'=> $row['57'],
                            'tanggal_lahir_ibu'=> $row['58'],
                            'pekerjaan_ibu'=> $row['59'],
                            'pendidikan_ibu'=> $row['60'],
                            'penghasilan_ibu'=> $row['61'],

                            'nama_wali'=> $row['62'],
                            'nik_wali'=> $row['63'],
                            'nomor_wali'=> $row['64'],
                            'tempat_lahir_wali'=> $row['65'],
                            'tanggal_lahir_wali'=> $row['66'],
                            'pekerjaan_wali'=> $row['67'],
                            'pendidikan_wali'=> $row['68'],
                            'penghasilan_wali'=> $row['69'],
                            
                            'nomor_kip'=> $row['70'],
                            'nomor_pkh'=> $row['71'],
                            'nomor_sk'=> $row['72'],
                    
                            'pic'=> $row['73'],
                            'user_id'=> $id,
                        ]);
                        
                        }
                }

            }
        }
        
    }
}
