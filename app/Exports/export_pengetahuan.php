<?php

namespace App\Exports;

use App\nilai_pengetahuan;
use App\mapel;
use App\krs;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class export_pengetahuan implements FromCollection, WithHeadings
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
        $data=nilai_pengetahuan::with(['siswa','mapel'=>function($query){
            $query->with(['kd_mapel']);
        }])->where('mapel_id','=',$mapel_id)->get();
        // dd($data->toArray());
        $no=0;
        foreach($data as $key => $datas){
            if ($datas->toArray()==[]) {
                $site[$no]=array(
                    'krs_id'=>$datas->krs_id,
                    'kelas_id'=>$datas->kelas_id,
                    'mapel_id'=>$datas->mapel_id,
                    'siswa_id'=>$datas->siswa_id,
                    'nama_lengkap'=>$datas->siswa->nama_lengkap,
                );
            }else {
                
                    $site[$no]=array(
                        'krs_id'=>$datas->krs_id,
                        'kelas_id'=>$datas->kelas_id,
                        'mapel_id'=>$datas->mapel_id,
                        'siswa_id'=>$datas->siswa_id,
                        'nama_lengkap'=>$datas->siswa->nama_lengkap,
                        'tugas1'=>$datas->tugas1,
                        'tugas2'=>$datas->tugas2,
                        'tugas3'=>$datas->tugas3,
                        'tugas4'=>$datas->tugas4,
                        'tugas5'=>$datas->tugas5,
                        'tugas6'=>$datas->tugas6,
                        'uh1'=>$datas->uh1,
                        'uh2'=>$datas->uh2,
                        'uh3'=>$datas->uh3,
                        'uh4'=>$datas->uh4,
                        'uh5'=>$datas->uh5,
                        'uh6'=>$datas->uh6,
                        'uts'=>$datas->uts,
                        'uas'=>$datas->uas,
                    ); 
            
        }
            $no++;
        }
        $site = collect([$site]);
        //  dd($site);
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
            'TUGAS 1',
            'TUGAS 2',
            'TUGAS 3',
            'TUGAS 4',
            'TUGAS 5',
            'TUGAS 6',
            'UH 1',
            'UH 2',
            'UH 3',
            'UH 4',
            'UH 5',
            'UH 6',
            'UTS',
            'UAS',
        ];
    }
}
