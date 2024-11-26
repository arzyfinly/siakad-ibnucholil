<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    //
    protected $fillable = [
        'nama_lengkap',
        'jk',
        'nomor_kk',
        'nik',
        'nomor_akte',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'kode_pos',
        'no_hp',
        'bahasa',
        'tinggi_badan',
        'berat_badan',
        'anak_ke',
        'saudara_kandung',
        'saudara_tiri',
        'hobi',
        'riwayat_sakit',
        'buta_warna',
        'kelainan_fisik',
        'lingkar_kepala',
        'cita_cita',
        'golongan_darah',
        'keterangan_tempat_tinggal',
        
        'sekolah_asal',
        'npsn',
        'alamat_sekolah',
        'desa_sekolah',
        'kecamatan_sekolah',
        'kabupaten_sekolah',
        'provinsi_sekolah',
        'kode_pos_sekolah',
        'lama_sekolah',
        'npun',
        'ijazah_sd',
        'skhun_sd',
        'orang_tua_sd',
        'ijazah_smp',
        'skhun_smp',
        'orang_tua_smp',

        'no_ijazah',
        'tanggal_lulusan_ijazah',
        'mutasi',
        'keterangan_mutasi',
        'pic_lulus',

        'nis',
        'nisn',
        'pilihan_jurusan',
        'tahun',
        'ukuran_baju',

        'nama_ayah',
        'nik_ayah',
        'nomor_ayah',
        'tempat_lahir_ayah',
        'tanggal_lahir_ayah',
        'pekerjaan_ayah',
        'pendidikan_ayah',
        'penghasilan_ayah',

        'nama_ibu',
        'nik_ibu',
        'nomor_ibu',
        'tempat_lahir_ibu',
        'tanggal_lahir_ibu',
        'pekerjaan_ibu',
        'pendidikan_ibu',
        'penghasilan_ibu',

        'nama_wali',
        'nik_wali',
        'nomor_wali',
        'tempat_lahir_wali',
        'tanggal_lahir_wali',
        'pekerjaan_wali',
        'pendidikan_wali',
        'penghasilan_wali',
        
        'nomor_kip',
        'nomor_pkh',
        'nomor_sk',
        
        'pic',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function krs()//menampilkan user dengan data tes yang diikuti
    {
        return $this->hasMany('App\krs');
    }
    public function mapel()//menampilkan user dengan data tes yang diikuti
    {
        return $this->hasMany('App\mapel');
    }
    public function nilai_pengetahuan()//menampilkan user dengan data tes yang diikuti
    {
        return $this->hasMany('App\nilai_pengetahuan');
    }
    public function nilai_keterampilan()//menampilkan user dengan data tes yang diikuti
    {
        return $this->hasMany('App\nilai_keterampilan');
    }
    public function nilai_sikap()//menampilkan user dengan data tes yang diikuti
    {
        return $this->hasMany('App\nilai_sikap');
    }
    public function nilai()//menampilkan user dengan data tes yang diikuti
    {
        return $this->hasMany('App\nilai');
    }
}
