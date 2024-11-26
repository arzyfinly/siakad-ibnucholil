<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\mapel;
use App\ujian;
use App\nilai;
use App\jawaban;
use App\User;
use App\soal;
use App\nilai_pengetahuan;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Auth;
class JawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function input_jawaban(Request $request)
    {
        $skor=0;
        $jenis_ujian=$request->get('jenis_ujian');
        $siswa_id=$request->get('siswa');
        $ujian_id=$request->get('ujian');
        $soal_id=$request->get('soal');
        $jawaban=$request->get('jawaban');

        $cek_jawaban=jawaban::where('siswa_id','=',$siswa_id)
                            ->where('ujian_id','=',$ujian_id)
                            ->where('soal_id','=',$soal_id)
                            ->count();
        
        $soal=soal::find($soal_id);
        if ($jawaban==$soal->kunci) {
            $status="BENAR";
            $skor=$soal->skor;
        }else{
            $status="SALAH";
            $skor=0;
        }

        if ($cek_jawaban==0) {
            jawaban::create([
                'siswa_id' => $request->get('siswa'),
                'ujian_id' => $request->get('ujian'),
                'soal_id' => $request->get('soal'),
                'jawaban' => $request->get('jawaban'),
                'status' => $status, 
                'skor' => $skor, 
            ]);
            echo'Jawaban Terkirim';
        }else{
            $jwb=jawaban::where('siswa_id','=',$siswa_id)
                            ->where('ujian_id','=',$ujian_id)
                            ->where('soal_id','=',$soal_id)
                            ->first();
            $data=jawaban::find($jwb->id);
            $data->jawaban=$jawaban;
            $data->status=$status;
            $data->skor=$skor;
            $data->save();
        echo "Jawaban diganti";
        }
        $cek_nilai=nilai::where('siswa_id','=',$siswa_id)
                        ->where('ujian_id','=',$ujian_id)
                        ->count();
        $total_nilai=jawaban::where('siswa_id','=',$siswa_id)
                            ->where('ujian_id','=',$ujian_id)
                            ->where('status','=','BENAR')
                            ->sum('skor');
        if ($cek_nilai==0) {
            nilai::create([
                'siswa_id' => $request->get('siswa'),
                'ujian_id' => $request->get('ujian'),
                'nilai' => $total_nilai, 
            ]);
            echo'Nilai Terkirim';
        }else{
            $nl=nilai::where('siswa_id','=',$siswa_id)
                            ->where('ujian_id','=',$ujian_id)
                            ->first();
            $data=nilai::find($nl->id);
            $data->nilai=$total_nilai;
            $data->save();
        echo "Nilai up";
        }
        if ($jenis_ujian=="UTS") {
            $siswa = $request->get('siswa');
        $krs=$request->input('krs');
        $kelas=$request->input('kelas');
        $mapel=$request->input('mapel');
        $cek=nilai_pengetahuan::where('siswa_id','=',$siswa)
        ->where('kelas_id','=',$kelas)
        ->where('mapel_id','=',$mapel)
        ->count();
        // dd($cek);
        if ($cek==0) {
            nilai_pengetahuan::create([
                'krs_id' => $krs,
                'kelas_id' => $kelas,
                'siswa_id' => $siswa,
                'mapel_id' => $mapel,
                'uts' => $total_nilai,
            ]);
        }else{
            $pengetahuan=nilai_pengetahuan::where('siswa_id','=',$siswa)
            ->where('kelas_id','=',$kelas)
            ->where('mapel_id','=',$mapel)
            ->first();
            $pengetahuan_id=$pengetahuan->id;
            $data=nilai_pengetahuan::find($pengetahuan->id);
            $data->uts=$total_nilai;
            $data->save();
        }
        }elseif ($jenis_ujian=="UAS") {
            $siswa = $request->get('siswa');
            $krs=$request->input('krs');
            $kelas=$request->input('kelas');
            $mapel=$request->input('mapel');
            $cek=nilai_pengetahuan::where('siswa_id','=',$siswa)
            ->where('kelas_id','=',$kelas)
            ->where('mapel_id','=',$mapel)
            ->count();
            // dd($cek);
            if ($cek==0) {
                nilai_pengetahuan::create([
                    'krs_id' => $krs,
                    'kelas_id' => $kelas,
                    'siswa_id' => $siswa,
                    'mapel_id' => $mapel,
                    'uas' => $total_nilai,
                ]);
            }else{
                $pengetahuan=nilai_pengetahuan::where('siswa_id','=',$siswa)
                ->where('kelas_id','=',$kelas)
                ->where('mapel_id','=',$mapel)
                ->first();
                $pengetahuan_id=$pengetahuan->id;
                $data=nilai_pengetahuan::find($pengetahuan->id);
                $data->uas=$total_nilai;
                $data->save();
            }
        }elseif ($jenis_ujian=="UH1") {
            $siswa = $request->get('siswa');
            $krs=$request->input('krs');
            $kelas=$request->input('kelas');
            $mapel=$request->input('mapel');
            $cek=nilai_pengetahuan::where('siswa_id','=',$siswa)
            ->where('kelas_id','=',$kelas)
            ->where('mapel_id','=',$mapel)
            ->count();
            // dd($cek);
            if ($cek==0) {
                nilai_pengetahuan::create([
                    'krs_id' => $krs,
                    'kelas_id' => $kelas,
                    'siswa_id' => $siswa,
                    'mapel_id' => $mapel,
                    'uh1' => $total_nilai,
                ]);
            }else{
                $pengetahuan=nilai_pengetahuan::where('siswa_id','=',$siswa)
                ->where('kelas_id','=',$kelas)
                ->where('mapel_id','=',$mapel)
                ->first();
                $pengetahuan_id=$pengetahuan->id;
                $data=nilai_pengetahuan::find($pengetahuan->id);
                $data->uh1=$total_nilai;
                $data->save();
            }
        }elseif ($jenis_ujian=="UH2") {
            $siswa = $request->get('siswa');
            $krs=$request->input('krs');
            $kelas=$request->input('kelas');
            $mapel=$request->input('mapel');
            $cek=nilai_pengetahuan::where('siswa_id','=',$siswa)
            ->where('kelas_id','=',$kelas)
            ->where('mapel_id','=',$mapel)
            ->count();
            // dd($cek);
            if ($cek==0) {
                nilai_pengetahuan::create([
                    'krs_id' => $krs,
                    'kelas_id' => $kelas,
                    'siswa_id' => $siswa,
                    'mapel_id' => $mapel,
                    'uh2' => $total_nilai,
                ]);
            }else{
                $pengetahuan=nilai_pengetahuan::where('siswa_id','=',$siswa)
                ->where('kelas_id','=',$kelas)
                ->where('mapel_id','=',$mapel)
                ->first();
                $pengetahuan_id=$pengetahuan->id;
                $data=nilai_pengetahuan::find($pengetahuan->id);
                $data->uh2=$total_nilai;
                $data->save();
            }
        }elseif ($jenis_ujian=="UH3") {
            $siswa = $request->get('siswa');
            $krs=$request->input('krs');
            $kelas=$request->input('kelas');
            $mapel=$request->input('mapel');
            $cek=nilai_pengetahuan::where('siswa_id','=',$siswa)
            ->where('kelas_id','=',$kelas)
            ->where('mapel_id','=',$mapel)
            ->count();
            // dd($cek);
            if ($cek==0) {
                nilai_pengetahuan::create([
                    'krs_id' => $krs,
                    'kelas_id' => $kelas,
                    'siswa_id' => $siswa,
                    'mapel_id' => $mapel,
                    'uh3' => $total_nilai,
                ]);
            }else{
                $pengetahuan=nilai_pengetahuan::where('siswa_id','=',$siswa)
                ->where('kelas_id','=',$kelas)
                ->where('mapel_id','=',$mapel)
                ->first();
                $pengetahuan_id=$pengetahuan->id;
                $data=nilai_pengetahuan::find($pengetahuan->id);
                $data->uh3=$total_nilai;
                $data->save();
            }
        }elseif ($jenis_ujian=="UH4") {
            $siswa = $request->get('siswa');
            $krs=$request->input('krs');
            $kelas=$request->input('kelas');
            $mapel=$request->input('mapel');
            $cek=nilai_pengetahuan::where('siswa_id','=',$siswa)
            ->where('kelas_id','=',$kelas)
            ->where('mapel_id','=',$mapel)
            ->count();
            // dd($cek);
            if ($cek==0) {
                nilai_pengetahuan::create([
                    'krs_id' => $krs,
                    'kelas_id' => $kelas,
                    'siswa_id' => $siswa,
                    'mapel_id' => $mapel,
                    'uh4' => $total_nilai,
                ]);
            }else{
                $pengetahuan=nilai_pengetahuan::where('siswa_id','=',$siswa)
                ->where('kelas_id','=',$kelas)
                ->where('mapel_id','=',$mapel)
                ->first();
                $pengetahuan_id=$pengetahuan->id;
                $data=nilai_pengetahuan::find($pengetahuan->id);
                $data->uh4=$total_nilai;
                $data->save();
            }
        }elseif ($jenis_ujian=="UH5") {
            $siswa = $request->get('siswa');
            $krs=$request->input('krs');
            $kelas=$request->input('kelas');
            $mapel=$request->input('mapel');
            $cek=nilai_pengetahuan::where('siswa_id','=',$siswa)
            ->where('kelas_id','=',$kelas)
            ->where('mapel_id','=',$mapel)
            ->count();
            // dd($cek);
            if ($cek==0) {
                nilai_pengetahuan::create([
                    'krs_id' => $krs,
                    'kelas_id' => $kelas,
                    'siswa_id' => $siswa,
                    'mapel_id' => $mapel,
                    'uh5' => $total_nilai,
                ]);
            }else{
                $pengetahuan=nilai_pengetahuan::where('siswa_id','=',$siswa)
                ->where('kelas_id','=',$kelas)
                ->where('mapel_id','=',$mapel)
                ->first();
                $pengetahuan_id=$pengetahuan->id;
                $data=nilai_pengetahuan::find($pengetahuan->id);
                $data->uh5=$total_nilai;
                $data->save();
            }
        }elseif ($jenis_ujian=="UH6") {
            $siswa = $request->get('siswa');
            $krs=$request->input('krs');
            $kelas=$request->input('kelas');
            $mapel=$request->input('mapel');
            $cek=nilai_pengetahuan::where('siswa_id','=',$siswa)
            ->where('kelas_id','=',$kelas)
            ->where('mapel_id','=',$mapel)
            ->count();
            // dd($cek);
            if ($cek==0) {
                nilai_pengetahuan::create([
                    'krs_id' => $krs,
                    'kelas_id' => $kelas,
                    'siswa_id' => $siswa,
                    'mapel_id' => $mapel,
                    'uh6' => $total_nilai,
                ]);
            }else{
                $pengetahuan=nilai_pengetahuan::where('siswa_id','=',$siswa)
                ->where('kelas_id','=',$kelas)
                ->where('mapel_id','=',$mapel)
                ->first();
                $pengetahuan_id=$pengetahuan->id;
                $data=nilai_pengetahuan::find($pengetahuan->id);
                $data->uh6=$total_nilai;
                $data->save();
            }
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
