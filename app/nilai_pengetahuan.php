<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class nilai_pengetahuan extends Model
{
    //
    protected $fillable = [
        'krs_id', 
        'kelas_id', 
        'mapel_id', 
        'siswa_id', 
        'tugas1',
        'tugas2',
        'tugas3',
        'tugas4',
        'tugas5',
        'tugas6',
        'uh1',
        'uh2',
        'uh3',
        'uh4',
        'uh5',
        'uh6',
        'uts',
        'uas',
    ];
    public function kelas(){
        return $this->belongsTo('App\kelas','kelas_id');

    }
    public function mapel(){
        return $this->belongsTo('App\mapel','mapel_id')->orderBy('tahun');
    }
    public function siswa(){
        return $this->belongsTo('App\siswa','siswa_id');
    }
    public function krs(){
        return $this->belongsTo('App\krs','krs_id');
    }

    public function nilai_akhir($mhs, $mapel){
        return 
        $coba = DB::select(DB::raw(" 
                                        SELECT
                                        m4.urut,
                                        m3.kelas,
                                        m4.nama_mapel,
                                        round(AVG((m1.tugas1) + (m1.tugas2) + (m1.tugas3) + (m1.tugas4) + (m1.tugas5) + (m1.tugas6)) / 6) AS  r_tugas,
                                        round(AVG((m1.uh1) + (m1.uh2) + (m1.uh3) + (m1.uh4) + (m1.uh5) + (m1.uh6)) / 6) AS  r_uh,
                                        round((round(AVG((m1.tugas1) + (m1.tugas2) + (m1.tugas3) + (m1.tugas4) + (m1.tugas5) + (m1.tugas6)) / 6)/2)+(round(AVG((m1.uh1) + (m1.uh2) + (m1.uh3) + (m1.uh4) + (m1.uh5) + (m1.uh6)) / 6)/2)) AS total_uas_tugas,
                                        m1.uts,
                                        m1.uas,
                                        round(((70*round((round(AVG((m1.tugas1) + (m1.tugas2) + (m1.tugas3) + (m1.tugas4) + (m1.tugas5) + (m1.tugas6)) / 6)/2)+(round(AVG((m1.uh1) + (m1.uh2) + (m1.uh3) + (m1.uh4) + (m1.uh5) + (m1.uh6)) / 6)/2)))+(15*m1.uts)+(15*m1.uas))/100) AS skor_akhir
                                    FROM
                                        nilai_pengetahuans m1
                                    LEFT JOIN	krs m2
                                    ON	m1.krs_id = m2.id
                                    LEFT JOIN kelas m3
                                    ON m2.kelas_id = m3.id
                                    LEFT JOIN mapels m4
                                    ON m1.mapel_id = m4.id
                                    WHERE m1.siswa_id = '$mhs' AND m1.mapel_id='$mapel';
                                  "));
    }
}
