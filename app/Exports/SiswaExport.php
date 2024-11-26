<?php

namespace App\Exports;

use App\siswa;
use Maatwebsite\Excel\Concerns\FromCollection;

class SiswaExport implements FromCollection
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
        return siswa::where('tahun','=',$this->id)->get();
    }
}
