<?php

namespace App\Exports;

use App\kd_mapel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class export_kd_mapel implements FromCollection, WithHeadings
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
        return kd_mapel::where('mapel_id','=',$mapel_id)
                        ->select('no_kd','kd')
                        ->get();
    }
    public function headings(): array
    {
        return [
            'NO KD',
            'KOMPETENSI DASAR',

        ];

    }
}
