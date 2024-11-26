<?php

namespace App\Exports;

use App\nilai_keterampilan;
use App\mapel;
use App\krs;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class export_keterampilan implements FromCollection, WithHeadings
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
        $data=nilai_keterampilan::with(['siswa','mapel'=>function($query){
            $query->with(['kd_mapel']);
        }])->where('mapel_id','=',$mapel_id)->get();
        // dd($data->toArray());
        $no=0;
        foreach($data as $key => $datas){
            // dd($datas->nilai_keterampilan->toArray());
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
                        'praktik1'=>$datas->praktik1,
                        'praktik2'=>$datas->praktik2,
                        'praktik3'=>$datas->praktik3,
                        'praktik4'=>$datas->praktik4,
                        'praktik5'=>$datas->praktik5,
                        'praktik6'=>$datas->praktik6,
                        'portofolio1'=>$datas->portofolio1,
                        'portofolio2'=>$datas->portofolio2,
                        'portofolio3'=>$datas->portofolio3,
                        'portofolio4'=>$datas->portofolio4,
                        'portofolio5'=>$datas->portofolio5,
                        'portofolio6'=>$datas->portofolio6,
                        'proyek1'=>$datas->proyek1,
                        'proyek2'=>$datas->proyek2,
                        'proyek3'=>$datas->proyek3,
                        'proyek4'=>$datas->proyek4,
                        'proyek5'=>$datas->proyek5,
                        'proyek6'=>$datas->proyek6,
                    ); 
                
            }
            $no++;
        }
        $site = collect([$site]);
        // dd($site);
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
            'PRAKTiK 1',
            'PRAKTiK 2',
            'PRAKTiK 3',
            'PRAKTiK 4',
            'PRAKTiK 5',
            'PRAKTiK 6',
            'PORTOFOLIO 1',
            'PORTOFOLIO 2',
            'PORTOFOLIO 3',
            'PORTOFOLIO 4',
            'PORTOFOLIO 5',
            'PORTOFOLIO 6',
            'PROYEK 1',
            'PROYEK 2',
            'PROYEK 3',
            'PROYEK 4',
            'PROYEK 5',
            'PROYEK 6',
        ];
    }
}
