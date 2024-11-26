<?php

namespace App\Exports;

use App\nilai_ukk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NilaiUKKExport implements FromCollection, WithHeadings
{
    public function headings(): array {




        // according to users table

        return [
    
            "NIS",
    
            "Nama Lengkap",
    
            "Nilai",
           ];
    
        }
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $kelas_id;
    protected $mapel_id;

 function __construct($kelas_id,$mapel_id) {
        $this->kelas_id = $kelas_id;
        $this->mapel_id = $mapel_id;
 }
    public function collection()
    { 
       return nilai_ukk::select('siswas.nis','siswas.nama_lengkap','nilai_ukks.nilai')->leftJoin('siswas', 'siswas.id', '=', 'nilai_ukks.siswa_id')->where('kelas_id',$this->kelas_id)->where('mapel_id',$this->mapel_id)->get();
    }
}
