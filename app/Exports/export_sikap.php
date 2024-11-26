<?php

namespace App\Exports;

use App\nilai_sikap;
use App\mapel;
use App\krs;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class export_sikap implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $id;

    function __construct($id) {
            $this->id = $id;
    }
    public function collection()
    {
        $mapel_id=$this->id;
        $mapel=mapel::find($mapel_id);
        $kelas_id=$mapel->kelas_id;
        $semester=$mapel->semester;
        $data=nilai_sikap::with(['siswa','mapel'=>function($query){
            $query->with(['kd_mapel']);
        }])->where('mapel_id','=',$mapel_id)->get();
        foreach($data as $key => $datas){
            if ($datas->toArray()==[]) {
                $site[$key]=array(
                'krs_id'=>$datas->id,
                'kelas_id'=>$datas->kelas_id,
                'mapel_id'=>$mapel_id,
                'siswa_id'=>$datas->siswa_id,
                'nama_lengkap'=>$datas->siswa->nama_lengkap,
                );
            }else{
                $site[$key]=array(
                    'krs_id'=>$datas->id,
                    'kelas_id'=>$datas->kelas_id,
                    'mapel_id'=>$datas->mapel_id,
                    'siswa_id'=>$datas->siswa_id,
                    'nama_lengkap'=>$datas->siswa->nama_lengkap,
                    'sikap'=>$datas->sikap,
                    'deskripsi'=>$datas->deskripsi,
                    'alpha'=>$datas->alpha,
                    'izin'=>$datas->izin,
                    'sakit'=>$datas->sakit,
                    );
            }
        }
        // dd($site);

        $site = collect([$site]);
        return $site;
    }
    public function headings(): array
    {
        return [
                'ID', 
                'ID KELAS', 
                'ID MAPEL', 
                'ID SISWA', 
                'NAMA LENGKAP', 
                'SIKAP',
                'DESKRIPSI',
                'ALPHA',
                'IZIN',
                'SAKIT',
        ];
    }
}
