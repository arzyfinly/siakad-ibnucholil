<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\mapel;
use App\ujian;
use App\nilai;
use App\nilai_usp_ukk;
use App\siswa;
use App\jawaban;
use App\soal;
use App\User;
use App\jurusan;
use App\kelas;
use App\krs;
use App\nilai_pengetahuan;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Auth;
class UjianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data_ujian($id)
    {
        $data=mapel::find($id);
        $kelas=kelas::find($data->kelas_id);
        return view('guru.ujian.data_ujian',compact('id','data','kelas'));
    }
    public function json_ujian($id)
    {
        $data=ujian::with(['mapel'])->where('mapel_id','=',$id)->get();
        //dd($data->toArray());
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($user) {
                        return '
                        <button type="button" data-toggle="modal" data-target="#myModal'.$user->id.'" class="btn btn-primary">Update</button>
                        <!-- Modal-->
                        <div id="myModal'.$user->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 id="exampleModalLabel" class="modal-title">Kompetensi Dasar</h4>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <p>Silahkan tambhakan .</p>
                                    <form action="'.route('ujian.update_ujian',$user->id).'" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                    <div class="form-group">
                                        <label>Jenis Ujian *</label>
                                        <input type="text" name="jenis" class="form-control" value="'.$user->jenis.'" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Ujian *</label>
                                        <input type="date" name="waktu" class="form-control" value="'.$user->waktu.'" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Durasi dalam menit*</label>
                                        <input type="number" name="durasi" class="form-control" value="'.$user->durasi.'" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Status *</label>
                                        <select class="form-control" name="status" required>
                                        <option value="AKTIF">Aktif</option>
                                        <option value="NONAKTIF">Nonaktif</option>
                                    </select>
                                    </div>
                                  <div class="form-group">       
                                    <input type="submit" value="update" class="btn btn-primary">
                                  </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                </div>
                                </div>
                            </div>
                            </div>
                            <!-- end of modal -->
                        <a href="'.route('ujian.delete_ujian',$user->id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                        ';
                    })
                    ->addColumn('mapel', function ($user) {
                        return $user->mapel->nama_mapel;
                    })
                    ->addColumn('soal', function ($user) {
                        return '
                        <a href="'.route('soal.data_soal',$user->id).'" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-edit"></i>Soal</a>
                        ';
                    })
                    ->addColumn('kode', function ($user) {
                        return '
                        <a href="'.route('ujian',$user->id).'" target="_blank">'.$user->id.'</a>
                        ';
                    })
                    ->addColumn('nilai', function ($user) {
                        return '
                        <a href="'.route('ujian.data_nilai_ujian',$user->id).'" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i>Nilai</a>
                        ';
                    })
                    ->addColumn('upload_nilai', function ($user) {
                        return '
                        <a href="'.route('ujian.upload_nilai',$user->id).'" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i>Upload</a>
                        ';
                    })
                    ->escapeColumns([])
                    ->make(true);
    }
    public function input_ujian(Request $request)
    {
        $request->validate([
            'mapel_id'=>['required'],
          ]);

          ujian::create([
            'mapel_id' => $request->get('mapel_id'),
            'waktu' => $request->get('waktu'),
            'durasi' => $request->get('durasi'),
            'jenis' => $request->get('jenis'), 
            'status' => $request->get('status'), 
        ]);
        return redirect()->back()->with('success', 'Berhasil ditambah');
    }
    public function update_ujian(Request $request, $id)
    {
        $data=ujian::find($id);
        $data->waktu=$request->get('waktu');
        $data->durasi=$request->get('durasi');
        $data->jenis=$request->get('jenis');
        $data->status=$request->get('status');
        $data->save();
        return redirect()->back()->with('success', 'Berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_ujian($id)
    {
        $data=ujian::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Berhasil dihapus');
    }
    public function data_ujian_siswa($id)
    {
        $data=mapel::find($id);
        return view('siswa.ujian.data_ujian',compact('id','data'));
    }
    public function json_ujian_siswa($id)
    {
        $data=ujian::with(['mapel'])->where('mapel_id','=',$id)->get();
        //dd($data->toArray());
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('mapel', function ($user) {
                        return $user->mapel->nama_mapel;
                    })
                    ->addColumn('soal', function ($user) {
                        return '
                        <button type="button" data-toggle="modal" data-target="#soal'.$user->id.'" class="btn btn-primary">Kerjakan</button>
                        <!-- Modal-->
                        <div id="soal'.$user->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 id="exampleModalLabel" class="modal-title">Siap Mengerjakan?</h4>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <p>Ujian ini Berdurasi : <b>'.$user->durasi.' Menit</b></p>
                                    *NB. Durasi akan berjalan setelah anda mengklik tombol berwarna kuning bertuliskan <span class="badge badge-warning text-white">Siap!</span>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn btn-xs btn-danger"><b>Tidak Siap</b></button>
                                    <a href="'.route('soal.soal_ujian',$user->id).'"class="btn btn-xs btn-warning"><b><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Siap!</b></a>
                                </div>
                                </div>
                            </div>
                            </div>
                            <!-- end of modal -->
                        ';
                    })
                    ->escapeColumns([])
                    ->make(true);
    }
    public function data_nilai_ujian($id)
    {
        $ujian=ujian::find($id);
        $mapel=mapel::find($ujian->mapel_id);
        // dd($mapel->toArray());
        $kelas=kelas::find($mapel->kelas_id);
        return view('guru.ujian.data_nilai_ujian',compact('id','mapel','kelas'));
    }
    public function json_nilai_ujian($id)
    {
        $cek=nilai_usp_ukk::with(['siswa'])->where('ujian_id',$id);
        if($cek->count() != 0){
            $data = $cek->get();
        }else{
            $data=nilai::with(['siswa'])->where('ujian_id','=',$id)->get();
        }
        // dd($data->nilai->toArray());
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('siswa', function ($user) {
                        return $user->siswa->nama_lengkap;
                    })
                    ->escapeColumns([])
                    ->make(true);
    }
    // public function data_nilai_ujian_siswa()
    // {
    //     return view('siswa.ujian.data_nilai_ujian_siswa');
    // }
    // public function json_nilai_ujian_siswa()
    // {
    //     $user_id=Auth::User()->id;
    //     $siswa_id=siswa::where('user_id','=',$user_id)->first();
    //     $data=siswa::with(['nilai'=>function($query){
    //         return $query->with(['ujian'=>function($query){
    //             return $query->with(['mapel']);
    //         }]);
    //     }])->find($siswa_id->id);
    //     // dd($data->nilai->toArray());
    //     return Datatables::of($data->nilai)
    //                 ->addIndexColumn()
    //                 ->addColumn('ujian', function ($user) {
    //                     return $user->ujian->jenis;
    //                 })
    //                 ->addColumn('mapel', function ($user) {
    //                     return $user->ujian->mapel->nama_mapel;
    //                 })
    //                 ->escapeColumns([])
    //                 ->make(true);
    // }
    public function cetak_nilai_ujian($id)
    {
        $jumlah_ganda=soal::where('ujian_id','=',$id)->where('tipe','=','GANDA')->count();
        $jumlah_uraian=soal::where('ujian_id','=',$id)->where('tipe','=','URAIAN')->count();
        $soal=soal::where('ujian_id','=',$id)->get();
        $jawaban=jawaban::with(['siswa'])->where('ujian_id','=',$id)->get();
        $nilai=nilai::with(['siswa'])->where('ujian_id','=',$id)->get();
        $ujian=ujian::find($id);
        $mapel=mapel::find($ujian->mapel_id);
        $kelas=kelas::find($mapel->kelas_id);
        $jurusan=jurusan::find($kelas->jurusan_id);
        // dd($jumlah_soal);
        // dd($data->toArray());
        return view('guru.ujian.cetak_nilai_ujian',compact('jumlah_ganda','jumlah_uraian','soal','jawaban','nilai','ujian','mapel','kelas','jurusan'));
    }
    public function upload_nilai($id)
    {
        
        $data=nilai::with(['siswa'])->where('ujian_id','=',$id)->get();
        // dd($data->toArray());
        foreach($data as $datas){
            $ujian=ujian::find($id);
            $jenis_ujian=$ujian->jenis;
            $total_nilai=$datas->nilai;
            $siswa=$datas->siswa_id;
            $mapel=$ujian->mapel_id;
            $mapel_id=mapel::find($mapel);
            $kelas=$mapel_id->kelas_id;
            $krs_id=krs::where('kelas_id','=',$kelas)->where('siswa_id','=',$siswa)->first();
            $krs=$krs_id->id;
            if ($jenis_ujian=="UTS") {
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
                // dd($pengetahuan);
                $pengetahuan_id=$pengetahuan->id;
                $data1=nilai_pengetahuan::find($pengetahuan_id);
                $data1->uts=$total_nilai;
                $data1->save();
                // dd($data1->toArray());
            }
            }elseif ($jenis_ujian=="UAS") {
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
        return redirect()->back()->with('success', 'Berhasil Upload');
    }
}
