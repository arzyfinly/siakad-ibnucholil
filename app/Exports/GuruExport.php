<?php

namespace App\Exports;

use App\guru;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GuruExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return guru::all();
    }
    public function headings(): array
    {
        return [
        'id',
        'nama_lengkap',
        'nuptk',
        'jk',
        'tempat_lahir',
        'tanggal_lahir',
        'nip',
        'sk',
        'jenis_ptk',
        'agama',
        'kk',
        'nik',
        'alamat',
        'rt',
        'rw',
        'dusun',
        'desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'kode_pos',
        'no_hp',
        'email',
        'tugas_tambahan',
        'nama_ibu',
        'sp',
        'nama_pasangan',
        'jumlah_anak',
        'nama_bank',
        'no_rek',
        'an',
        'sk_pengangkatan',
        'tmt_pengangkatan',
        'lembaga_pengangkatan',
        'sumber_gaji',
        'nama_sd',
        'tahun_masuk_sd',
        'tahun_lulus_sd',
        'nama_smp',
        'tahun_masuk_smp',
        'tahun_lulus_smp',
        'nama_sma',
        'tahun_masuk_sma',
        'tahun_lulus_sma',
        'nama_s1',
        'tahun_masuk_s1',
        'tahun_lulus_s1',
        'nama_s2',
        'tahun_masuk_s2',
        'tahun_lulus_s2',
        'pic',
        'user_id',
        ];
    }
}
