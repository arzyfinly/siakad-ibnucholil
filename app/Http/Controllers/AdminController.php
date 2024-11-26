<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\User;
use App\p_bukti_tf;
use App\siswa;
use App\guru;
use App\jurusan;
use App\kelas;
use App\nilai;
use App\mapel;
use App\kd_mapel;
use App\krs;
use App\nilai_ukk;
use App\nilai_pengetahuan;
use App\nilai_keterampilan;
use App\nilai_sikap;
use App\prakerin;
use App\eskul;
use App\prestasi;
use App\absen;
use App\tahun_ajaran;
use App\catatan;
use App\Exports\SiswaExport;
use App\Exports\NilaiUKKExport;
use App\Exports\GuruExport;
use App\Exports\export_kd_mapel;
use App\Exports\export_keterampilan;
use App\Exports\export_pengetahuan;
use App\Exports\export_sikap;
use App\Imports\SiswaImport;
use App\Imports\GuruImport;
use App\Imports\import_kd_mapel;
use App\Imports\import_keterampilan;
use App\Imports\import_pengetahuan;
use App\Imports\import_sikap;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        //
        $jumlah_siswa=siswa::count();
        $jumlah_guru=guru::count();
        return view('admin.index',compact('jumlah_siswa','jumlah_guru'));
    }
    /*  Aplikasi Sistem Akademik
        Aplikasi ini memiliki fitur :
        >Import data guru
        >Import data siswa
        >Input data jurusan
        >Input data kelas
        >Input data mapel
        >Input data krs
        >Input data nilai
        >Verifikasi
        >Bukti tranfer
    */
    public function data_jurusan()
    {
        return view('admin.siakad.data_jurusan');
    }
    public function json_jurusan()
    {
        $data=jurusan::all();
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
                                    <h4 id="exampleModalLabel" class="modal-title">Jurusan</h4>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <p>Silahkan tambhakan .</p>
                                    <form action="'.route('update_jurusan',$user->id).'" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                    <div class="form-group">
                                        <label>Nama Jurusan *</label>
                                        <input type="text" name="jurusan" class="form-control" required value="'.$user->jurusan.'">
                                    </div>
                                    <div class="form-group">
                                        <label>Daya Tampung *</label>
                                        <input type="number" name="daya_tampung" class="form-control" required value="'.$user->daya_tampung.'">
                                    </div>
                                    <div class="form-group">       
                                        <input type="submit" value="Update" class="btn btn-primary">
                                    </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                </div>
                                </div>
                            </div>
                            </div>
                            <!-- end of modal -->
                        <a href="'.route('data_tahun_ajaran',$user->id).'" data-id="'.$user->id.'" class="btn btn-xs btn-success" ><i class="glyphicon glyphicon-edit"></i>Tahun Ajaran</a>
                        <button onclick="confirmDelete('.$user->id.')" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</button>
                        ';
                        // <a href="'.route('hapus_jurusan',$user->id).'" data-id="'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                    })
                    ->make(true);
    }
    public function input_jurusan(Request $request)
    {
        $request->validate([
            'jurusan'=>['required'],
            'daya_tampung'=>['required'],
          ]);

          jurusan::create([
            'jurusan' => $request->get('jurusan'), 
            'daya_tampung' => $request->get('daya_tampung'),
        ]);
        return redirect()->back()->with('success', 'Jurusan Berhasil ditambahkan');
    }
    public function update_jurusan(Request $request,$id)
    {
        $request->validate([
            'jurusan'=>['required'],
            'daya_tampung'=>['required'],
          ]);

            $data=jurusan::find($id);
            $data->jurusan=$request->get('jurusan');
            $data->daya_tampung=$request->get('daya_tampung');
            $data->save();
            return redirect()->back()->with('success', 'Berhasil Diperbaharui');
    }
    public function hapus_jurusan($id)
    {
        $data=jurusan::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Berhasil Dihapus');
    }
    // TAHUN AJARAN
    public function data_tahun_ajaran($id)
    {
        $data=jurusan::find($id);
        //dd($data);

        return view('admin.siakad.data_tahun_ajaran',compact('data','id'));
    }
    public function json_tahun_ajaran($id)
    {
        $data=tahun_ajaran::where('jurusan_id','=',$id)->get();
        //dd($data->toArray());
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($user) {
                        return '
                        <a href="'.route('data_kelas_jurusan',['id'=>$user->jurusan_id,'tahun'=>$user->tahun]).'" data-id="'.$user->id.'" class="btn btn-xs btn-info" target="_blank"><i class="glyphicon glyphicon-edit"></i> Kelas</a>
                        <button onclick="confirmDelete('.$user->id.')" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</button>
                        ';
                        // <a href="'.route('hapus_tahun_ajaran',$user->id).'" data-id="'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                    })
                   
                    ->make(true);
    }
    
    public function input_tahun_ajaran(Request $request)
    {
        $request->validate([
            'tahun'=>['required'],
            'jurusan_id'=>['required'],
          ]);

          tahun_ajaran::create([
            'tahun' => $request->get('tahun'), 
            'jurusan_id' => $request->get('jurusan_id'),
        ]);
        return redirect()->back()->with('success', 'Berhasil Ditambahkan');
    }
    public function form_update_tahun_ajaran($id)
    {
        $kelas=kelas::find($id);
        return view('admin.siakad.form_tahun_ajaran',compact('kelas'));
    }
    public function update_tahun_ajaran(Request $request,$id)
    {
        $request->validate([
            'tahun'=>['required'],
            'jurusan_id'=>['required'],
          ]);
          
            $data=tahun_ajaran::find($id);
            $data->tahun=$request->get('tahun');
            $data->jurusan_id=$request->get('jurusan_id');
            $data->save();
            return redirect()->back()->with('success', 'Berhasil Diperbaharui');
    }
    public function hapus_tahun_ajaran($id)
    {
        $data=tahun_ajaran::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Berhasil Dihapus');
    }
    public function data_kelas()
    {
        return view('admin.siakad.data_kelas');
    }
    public function json_kelas()
    {
        $data=kelas::all();
        //dd($data->toArray());
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($user) {
                        return '
                        <a href="'.route('form_update_kelas',$user->id).'" data-id="'.$user->id.'" class="btn btn-xs btn-info" target="_blank"><i class="glyphicon glyphicon-edit"></i> Update</a>
                        <button onclick="confirmDelete('.$user->id.')" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</button>
                        ';
                        // <a href="'.route('hapus_kelas',$user->id).'" data-id="'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                    })
                   
                    
                    ->escapeColumns([])
                    ->addColumn('jurusan', function ($user) {
                        return $user->jurusan->jurusan;
                    })
                    ->addColumn('wali', function ($user) {
                        return $user->guru->nama_lengkap;
                    })
                    ->make(true);
    }
    public function data_kelas_jurusan($id,$tahun)
    {
        $jurusan_id=$id;
        $tahun_ajaran=$tahun;
        $data=jurusan::find($jurusan_id);
        return view('admin.siakad.data_kelas_jurusan',compact('jurusan_id','data','tahun_ajaran'));
    }
    public function json_kelas_jurusan($id,$tahun)
    {
        $data=kelas::where('jurusan_id','=',$id)->where('ket','=',$tahun)->get();
        // dd($data->toArray());
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($user) {
                        return '
                        <a href="'.route('form_update_kelas',$user->id).'" data-id="'.$user->id.'" class="btn btn-xs btn-info" target="_blank"><i class="glyphicon glyphicon-edit"></i> Update</a>
                        <button onclick="confirmDelete('.$user->id.')" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</button>
                        ';
                        // <a href="'.route('hapus_kelas',$user->id).'" data-id="'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                    })
                    ->addColumn('siswa', function ($user) {
                        return'
                        <a href="'.route('data_krs',['id'=>$user->id,'semester'=>'GANJIL']).'" data-id="'.$user->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>Ganjil</a>
                        <a href="'.route('data_krs',['id'=>$user->id,'semester'=>'GENAP']).'" data-id="'.$user->id.'" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i>Genap</a>
                        ';
                    })
                    ->addColumn('mapel', function ($user) {
                        return'
                        <a href="'.route('data_mapel_kelas',['id'=>$user->id,'semester'=>'GANJIL']).'" data-id="'.$user->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>Ganjil</a>
                        <a href="'.route('data_mapel_kelas',['id'=>$user->id,'semester'=>'GENAP']).'" data-id="'.$user->id.'" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i>Genap</a>
                        ';
                    })
                    ->addColumn('ujian', function ($user) {
                        $sub_kelas = substr($user->kelas,0,3);
                        
                        $btn = '';
                        if ($sub_kelas != "XI-" || $sub_kelas != "Xl-") {
                            $btn .= '
                            <a href="'.route('data_mapel_kelas_usp',['id'=>$user->id,'semester'=>'GENAP']).'" data-id="'.$user->id.'" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i>USP</a>
                            ';
                        }

                        if ($sub_kelas == "XII" || $sub_kelas == "Xll"){
                            $btn .= '<a href="'.route('data_mapel_kelas_ukk',['id'=>$user->id,'semester'=>'GENAP']).'" data-id="'.$user->id.'" class="btn btn-xs btn-secondary"><i class="glyphicon glyphicon-edit"></i>UKK</a>';
                        }
                        
                        
                        return $btn;

                    })
                    ->escapeColumns([])
                    ->addColumn('jurusan', function ($user) {
                        return $user->jurusan->jurusan;
                    })
                    ->addColumn('wali', function ($user) {
                        return $user->guru->nama_lengkap;
                    })
                    ->make(true);
    }
    public function input_kelas(Request $request)
    {
        $request->validate([
            'kelas'=>['required'],
            'ket'=>['required'],
            'guru_id'=>['required'],
            'jurusan_id'=>['required'],
          ]);

          kelas::create([
            'kelas' => $request->get('kelas'), 
            'ket' => $request->get('ket'),
            'guru_id' => $request->get('guru_id'),
            'jurusan_id' => $request->get('jurusan_id'),
        ]);
        return redirect()->back()->with('success', 'Berhasil Ditambahkan');
    }
    public function form_update_kelas($id)
    {
        $kelas=kelas::find($id);
        return view('admin.siakad.form_update_kelas',compact('kelas'));
    }
    public function update_kelas(Request $request,$id)
    {
        $request->validate([
            'kelas'=>['required'],
            'ket'=>['required'],
            'guru_id'=>['required'],
          ]);
          
            $data=kelas::find($id);
            $data->kelas=$request->get('kelas');
            $data->ket=$request->get('ket');
            $data->guru_id=$request->get('guru_id');
            $data->save();
            return redirect()->back()->with('success', 'Berhasil Diperbaharui');
    }
    public function hapus_kelas($id)
    {
        $data=kelas::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Berhasil Dihapus');
    }
   
    public function data_mapel_kelas($id,$semester)
    {
        $kelas=kelas::find($id);
        return view('admin.siakad.data_mapel_kelas',compact('id','kelas','semester'));
    }
    //dev mapel
    public function data_mapel_kelas_ukk($id,$semester)
    {
        $kelas=kelas::find($id);
        return view('admin.siakad.data_mapel_kelas_ukk',compact('id','kelas','semester'));
    }
    public function json_mapel_kelas_ukk($id,$semester)
    {
        $data=mapel::with(['jurusan','kelas','guru'])->where('kelas_id','=',$id)->where('semester','=',$semester)
        ->whereIn('kategori', ['Kompetensi Keahlian','Dasar Program Keahlian','Kompetensi Keahlian'])     
        ->orderBy('urut', 'ASC')->get();
        //dd($data->toArray());
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($datas) {
                        // return '
                        // <a href="'.route('form_update_mapel',$datas->id).'" class="btn btn-xs btn-info" target="_blank"><i class="glyphicon glyphicon-edit"></i> Update</a>
                        // <a href="'.route('hapus_mapel',$datas->id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                        // ';
                        return '
                        <a href="'.route('form_update_mapel',$datas->id).'" class="btn btn-xs btn-info" target="_blank"><i class="glyphicon glyphicon-edit"></i> Update</a>
                        ';
                    })
                    ->addColumn('nilai', function ($datas) {
                        return '
                        <a href="'.route('data_nilai_ukk',$datas->id).'" class="btn btn-xs btn-success" target="_blank"><i class="glyphicon glyphicon-edit"></i>UKK</a>
                        ';
                    })
                    ->escapeColumns([])
                    ->addColumn('jurusan', function ($datas) {
                        return $datas->jurusan->jurusan;
                    })
                    ->addColumn('kelas', function ($datas) {
                        return $datas->kelas->kelas;
                    })
                    ->addColumn('guru', function ($datas) {
                        return $datas->guru->nama_lengkap;
                    })
                    ->make(true);
    }
    public function data_mapel_kelas_usp($id,$semester)
    {
        $kelas=kelas::find($id);
        return view('admin.siakad.data_mapel_kelas_usp',compact('id','kelas','semester'));
    }

    //dev json kelas usp
    public function json_mapel_kelas_usp($id,$semester)
    {
        $data=mapel::with(['jurusan','kelas','guru'])->where('kelas_id','=',$id)->where('semester','=',$semester)->orderBy('urut', 'ASC')->get();
        //dd($data->toArray());
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($datas) {
                        // return '
                        // <a href="'.route('form_update_mapel',$datas->id).'" class="btn btn-xs btn-info" target="_blank"><i class="glyphicon glyphicon-edit"></i> Update</a>
                        // <a href="'.route('hapus_mapel',$datas->id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                        // ';
                        return '
                        <a href="'.route('form_update_mapel',$datas->id).'" class="btn btn-xs btn-info" target="_blank"><i class="glyphicon glyphicon-edit"></i> Update</a>
                        ';
                    })
                    ->addColumn('nilai', function ($datas) {
                        return '
                        <a href="'.route('data_nilai_usp',$datas->id).'" class="btn btn-xs btn-success" target="_blank"><i class="glyphicon glyphicon-edit"></i>USP</a>
                        ';
                    })
                    ->escapeColumns([])
                    ->addColumn('jurusan', function ($datas) {
                        return $datas->jurusan->jurusan;
                    })
                    ->addColumn('kelas', function ($datas) {
                        return $datas->kelas->kelas;
                    })
                    ->addColumn('guru', function ($datas) {
                        return $datas->guru->nama_lengkap;
                    })
                    ->make(true);
    }
    public function form_update_mapel($id)
    {
        $mapel=mapel::find($id);
        return view('admin.siakad.form_update_mapel',compact('mapel'));
    }
   
    public function json_mapel_kelas($id,$semester)
    {
        $data=mapel::with(['jurusan','kelas','guru'])->where('kelas_id','=',$id)->where('semester','=',$semester)->orderBy('urut', 'ASC')->get();
        //dd($data->toArray());
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($datas) {
                        return '
                        <a href="'.route('form_update_mapel',$datas->id).'" class="btn btn-xs btn-info" target="_blank"><i class="glyphicon glyphicon-edit"></i> Update</a>
                        <button onclick="confirmDelete('.$datas->id.')" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</button>
                        ';
                        // <a href="'.route('hapus_mapel',$datas->id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                        // return '
                        // <a href="'.route('form_update_mapel',$datas->id).'" class="btn btn-xs btn-info" target="_blank"><i class="glyphicon glyphicon-edit"></i> Update</a>
                        // ';
                    })
                    ->addColumn('nilai', function ($datas) {
                        return '
                        <a href="'.route('data_nilai_pengetahuan',$datas->id).'" class="btn btn-xs btn-success" target="_blank"><i class="glyphicon glyphicon-edit"></i>Pengetahuan</a>
                        <a href="'.route('data_nilai_keterampilan',$datas->id).'" class="btn btn-xs btn-info" target="_blank"><i class="glyphicon glyphicon-edit"></i>Keterampilan</a>
                        <a href="'.route('data_nilai_sikap',$datas->id).'" class="btn btn-xs btn-warning" target="_blank"><i class="glyphicon glyphicon-edit"></i>Sikap</a>
                        ';
                    })
                    ->addColumn('kd', function ($datas) {
                        return '
                        <a href="'.route('data_kd_pengetahuan',$datas->id).'" class="btn btn-xs btn-success" target="_blank"><i class="glyphicon glyphicon-edit"></i>Pengetahuan</a>
                        <a href="'.route('data_kd_keterampilan',$datas->id).'" class="btn btn-xs btn-info" target="_blank"><i class="glyphicon glyphicon-edit"></i>Keterampilan</a>
                        ';
                    })
                    ->escapeColumns([])
                    ->addColumn('jurusan', function ($datas) {
                        return $datas->jurusan->jurusan;
                    })
                    ->addColumn('kelas', function ($datas) {
                        return $datas->kelas->kelas;
                    })
                    ->addColumn('guru', function ($datas) {
                        return $datas->guru->nama_lengkap;
                    })
                    ->make(true);
    }
    public function input_mapel(Request $request)
    {
        $request->validate([
            'nama_mapel'=>['required'],
            'ket'=>['required'],
            'kategori'=>['required'],
            'semester'=>['required'],
            'tahun'=>['required'],
            'kelas_id'=>['required'],
            'jurusan_id'=>['required'],
            'guru_id'=>['required'],
          ]);
            $tahun=$string = str_replace(' ', '', $request->get('tahun'));
          mapel::create([
            'urut' => $request->get('urut'),
            'nama_mapel' => $request->get('nama_mapel'),
            'ket' => $request->get('ket'),
            'kategori' => $request->get('kategori'),
            'semester' => $request->get('semester'),
            'tahun' => $tahun,
            'kelas_id' => $request->get('kelas_id'), 
            'jurusan_id' => $request->get('jurusan_id'),
            'guru_id' => $request->get('guru_id'), 
        ]);
        return redirect()->back()->with('success', 'Berhasil ditambah');
    }
    public function update_mapel(Request $request,$id)
    {
        $request->validate([
            'nama_mapel'=>['required'],
            'ket'=>['required'],
            'kategori'=>['required'],
            'guru_id'=>['required'],
          ]);
          
            $data=mapel::find($id);
            $data->urut=$request->get('urut');
            $data->nama_mapel=$request->get('nama_mapel');
            $data->ket=$request->get('ket');
            $data->kategori=$request->get('kategori');
            $data->guru_id=$request->get('guru_id');
            $data->save();
            return redirect()->back()->with('success', 'Berhasil update');
    }
    public function hapus_mapel($id)
    {
        $data=mapel::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Berhasil Dihapus');
    }


    public function data_kd_pengetahuan($id)
    {
        $mapel_id=$id;
        $mapel=mapel::find($mapel_id);
        return view('admin.siakad.data_kd_pengetahuan',compact('mapel_id','mapel'));
    }
    public function json_kd_pengetahuan($id)
    {
        $data=kd_mapel::with(['mapel'])
                ->where('mapel_id','=',$id)
                ->where('kriteria','=','PENGETAHUAN')
                ->get();
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
                                    <form action="'.route('update_kd_mapel',$user->id).'" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                    <div class="form-group">
                                    <input type="text" name="mapel_id" value="'.$user->mapel_id.'" class="form-control" hidden required>
                                  </div>
                                  <div class="form-group">
                                    <label>No KD *</label>
                                    <input type="text" name="no_kd" value="'.$user->no_kd.'" class="form-control" required placeholder="Ex. 1.3.1xxxx">
                                  </div>
                                  <div class="form-group">
                                    <label>KD *</label>
                                    <input type="text" name="kd" value="'.$user->kd.'" class="form-control" required placeholder="Kompetensi dasar">
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
                            <button onclick="confirmDelete('.$user->id.')" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</button>
                            ';
                            // <a href="'.route('hapus_kd_mapel',$user->id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                    })
                    ->escapeColumns([])
                    ->make(true);
    }
    public function data_kd_keterampilan($id)
    {
        $mapel_id=$id;
        $mapel=mapel::find($mapel_id);
        return view('admin.siakad.data_kd_keterampilan',compact('mapel_id','mapel'));
    }
    public function json_kd_keterampilan($id)
    {
        $data=kd_mapel::with(['mapel'])
                ->where('mapel_id','=',$id)
                ->where('kriteria','=','KETERAMPILAN')
                ->get();
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
                                    <form action="'.route('update_kd_mapel',$user->id).'" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                    <div class="form-group">
                                    <input type="text" name="mapel_id" value="'.$user->mapel_id.'" class="form-control" hidden required>
                                  </div>
                                  <div class="form-group">
                                    <label>No KD *</label>
                                    <input type="text" name="no_kd" value="'.$user->no_kd.'" class="form-control" required placeholder="Ex. 1.3.1xxxx">
                                  </div>
                                  <div class="form-group">
                                    <label>KD *</label>
                                    <input type="text" name="kd" value="'.$user->kd.'" class="form-control" required placeholder="Kompetensi dasar">
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
                            <button onclick="confirmDelete('.$user->id.')" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</button>
                            ';
                            // <a href="'.route('hapus_kd_mapel',$user->id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                    })
                    
                    ->escapeColumns([])
                    ->make(true);
    }
    public function import_kd_mapel(Request $request)
    {
        // validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
            $kriteria=$request->get('kriteria');
            $mapel_id=$request->get('mapel_id');
        // menangkap file excel
        // dd($mapel_id);
        $uploaded = $request->file('file');
            $nama_file=$uploaded->getClientOriginalName();
            $path = $uploaded->store('public/file');
		//dd($path);
 
		// import data
		Excel::import(new import_kd_mapel($kriteria,$mapel_id), $path);
 
		return redirect()->back()->with('success', 'Berhasil Menambahkan');
    }
    public function export_kd_mapel($id)
    {
        $tgl=date("d-m-Y-h-i-s");
        //dd($tgl);
        return Excel::download(new export_kd_mapel($id), 'Data KD - '.$tgl.'.xlsx');
    }
    public function input_kd_mapel(Request $request)
    {
        $request->validate([
            'mapel_id'=>['required'],
            'no_kd'=>['required'],
            'kd'=>['required'],
            'kriteria'=>['required'],
          ]);

          kd_mapel::create([
            'mapel_id' => $request->get('mapel_id'),
            'no_kd' => $request->get('no_kd'),
            'kd' => $request->get('kd'), 
            'kriteria' => $request->get('kriteria'), 
        ]);
        return redirect()->back()->with('success', 'Berhasil ditambah');
    }
    public function update_kd_mapel(Request $request,$id)
    {
        $request->validate([
            'mapel_id'=>['required'],
            'no_kd'=>['required'],
            'kd'=>['required'],
          ]);
          
            $data=kd_mapel::find($id);
            $data->mapel_id=$request->get('mapel_id');
            $data->no_kd=$request->get('no_kd');
            $data->kd=$request->get('kd');
            $data->save();
            return redirect()->back()->with('success', 'Berhasil update');
    }
    public function hapus_kd_mapel($id)
    {
        $data=kd_mapel::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Berhasil Dihapus');
    }

    public function data_guru()
    {
        return view('admin.siakad.data_guru');
    }
    public function form_tambah_guru()
    {
        return view('admin.siakad.form_guru');
    }
    public function tambah_guru(Request $request)
    {
                $id = User::insertGetId([
                    'name' => $request->get('nama_lengkap'), 
                    'username' => $request->get('nip'), 
                    'password'=>Hash::make($request->get('nip')), 
                    'role_id'=> 4, 
                    'pic'=> "belum",
                    'status'=> $request->get('nip'),
                ]);
                guru::create([
                    'user_id'=>$id,
                    'nama_lengkap'=>$request->get('nama_lengkap'),
                    'nuptk'=>$request->get('nuptk'),
                    'jk'=>$request->get('jk'),
                    'tempat_lahir'=>$request->get('tempat_lahir'),
                    'tanggal_lahir'=>$request->get('tanggal_lahir'),
                    'nip'=>$request->get('nip'),
                    'sk'=>$request->get('sk'),
                    'jenis_ptk'=>$request->get('jenis_ptk'),
                    'agama'=>$request->get('agama'),
                    'kk'=>$request->get('kk'),
                    'nik'=>$request->get('nik'),
                    'alamat'=>$request->get('alamat'),
                    'rt'=>$request->get('rt'),
                    'rw'=>$request->get('rw'),
                    'dusun'=>$request->get('dusun'),
                    'desa'=>$request->get('desa'),
                    'kecamatan'=>$request->get('kecamatan'),
                    'kabupaten'=>$request->get('kabupaten'),
                    'provinsi'=>$request->get('provinsi'),
                    'kode_pos'=>$request->get('kode_pos'),
                    'no_hp'=>$request->get('no_hp'),
                    'email'=>$request->get('email'),
                    'tugas_tambahan'=>$request->get('tugas_tambahan'),
                    'nama_ibu'=>$request->get('nama_ibu'),
                    'sp'=>$request->get('sp'),
                    'nama_pasangan'=>$request->get('nama_pasangan'),
                    'jumlah_anak'=>$request->get('jumlah_anak'),
                    'nama_bank'=>$request->get('nama_bank'),
                    'no_rek'=>$request->get('no_rek'),
                    'an'=>$request->get('an'),
                    'sk_pengangkatan'=>$request->get('sk_pengangkatan'),
                    'tmt_pengangkatan'=>$request->get('tmt_pengangkatan'),
                    'lembaga_pengangkatan'=>$request->get('lembaga_pengangkatan'),
                    'sumber_gaji'=>$request->get('sumber_gaji'),
                    'nama_sd'=>$request->get('nama_sd'),
                    'tahun_masuk_sd'=>$request->get('tahun_masuk_sd'),
                    'tahun_lulus_sd'=>$request->get('tahun_lulus_sd'),
                    'nama_smp'=>$request->get('nama_smp'),
                    'tahun_masuk_smp'=>$request->get('tahun_masuk_smp'),
                    'tahun_lulus_smp'=>$request->get('tahun_lulus_smp'),
                    'nama_sma'=>$request->get('nama_sma'),
                    'tahun_masuk_sma'=>$request->get('tahun_masuk_sma'),
                    'tahun_lulus_sma'=>$request->get('tahun_lulus_sma'),
                    'nama_s1'=>$request->get('nama_s1'),
                    'tahun_masuk_s1'=>$request->get('tahun_masuk_s1'),
                    'tahun_lulus_s1'=>$request->get('tahun_lulus_s1'),
                    'nama_s2'=>$request->get('nama_s2'),
                    'tahun_masuk_s2'=>$request->get('tahun_masuk_s2'),
                    'tahun_lulus_s2'=>$request->get('tahun_lulus_s2'),
                    'pic'=>"belum",
                ]);
        return redirect()->back()->with('success', 'Berhasil Tambah Guru');
    }
    public function import_guru(Request $request)
    {
        // validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
        $uploaded = $request->file('file');
            $nama_file=$uploaded->getClientOriginalName();
            $path = $uploaded->store('public/file');
		//dd($path);
 
		// import data
		Excel::import(new GuruImport, $path);
 
		return redirect()->back()->with('success', 'Berhasil Menambahkan');
    }
    public function export_guru()
    {
        $tgl=date("d-m-Y-h-i-s");
        //dd($tgl);
        return Excel::download(new GuruExport, 'Data_Guru - '.$tgl.'.xlsx');
    }
    public function form_update_guru($id)
    {
        $data=guru::find($id);
        //dd($data->toArray());
        return view('admin.siakad.update_data_guru',compact('data'));
    }
    public function update_tentang_guru(Request $request, $id)
    {
        $data=guru::find($id);
            $data->nama_lengkap = $request->get('nama_lengkap');  
            $data->jk = $request->get('jk'); 
            $data->kk = $request->get('kk'); 
            $data->nik = $request->get('nik'); 
            $data->tempat_lahir = $request->get('tempat_lahir'); 
            $data->tanggal_lahir = $request->get('tanggal_lahir'); 
            $data->agama = $request->get('agama');
            $data->alamat = $request->get('alamat');
            $data->desa = $request->get('desa');
            $data->kecamatan = $request->get('kecamatan');
            $data->kabupaten = $request->get('kabupaten');
            $data->provinsi = $request->get('provinsi');
            $data->kode_pos = $request->get('kode_pos');
            $data->no_hp = $request->get('no_hp');
            $data->email = $request->get('email');
            $data->save();
            return redirect()->back()->with('success', 'Berhasil update tentang Guru');
        
    }
    public function update_pendidikan_guru(Request $request, $id)
    {
        $data=guru::find($id);  
            $data->nama_sd = $request->get('nama_sd');
            $data->tahun_masuk_sd = $request->get('tahun_masuk_sd');
            $data->tahun_lulus_sd = $request->get('tahun_lulus_sd');
            $data->nama_smp = $request->get('nama_smp');
            $data->tahun_masuk_smp = $request->get('tahun_masuk_smp');
            $data->tahun_lulus_smp = $request->get('tahun_lulus_smp');
            $data->nama_sma = $request->get('nama_sma');
            $data->tahun_masuk_sma = $request->get('tahun_masuk_sma');
            $data->tahun_lulus_sma = $request->get('tahun_lulus_sma');
            $data->nama_s1 = $request->get('nama_s1');
            $data->tahun_masuk_s1 = $request->get('tahun_masuk_s1');
            $data->tahun_lulus_s1 = $request->get('tahun_lulus_s1');
            $data->nama_s2 = $request->get('nama_s2');
            $data->tahun_masuk_s2 = $request->get('tahun_masuk_s2');
            $data->tahun_lulus_s2 = $request->get('tahun_lulus_s2');
            $data->save();
            return redirect()->back()->with('success', 'Berhasil update data Guru');
        
    }
    public function update_lain_guru(Request $request, $id)
    {
        $data=guru::find($id); 
            $data->nama_ibu = $request->get('nama_ibu');
            $data->sp = $request->get('sp');
            $data->nama_pasangan = $request->get('nama_pasangan');
            $data->jumlah_anak = $request->get('jumlah_anak');
            $data->nama_bank = $request->get('nama_bank');
            $data->no_rek = $request->get('no_rek');
            $data->an = $request->get('an');
            $data->save();
            return redirect()->back()->with('success', 'Berhasil update data Guru');
        
    }
    public function update_pegawai_guru(Request $request, $id)
    {
        $data=guru::find($id);
            $data->nip = $request->get('nip'); 
            $data->nuptk = $request->get('nuptk'); 
            $data->sk = $request->get('sk'); 
            $data->jenis_ptk = $request->get('jenis_ptk'); 
            $data->lembaga_pengangkatan = $request->get('lembaga_pengangkatan'); 
            $data->sumber_gaji = $request->get('sumber_gaji'); 
            $data->tugas_tambahan = $request->get('tugas_tambahan'); 
            $data->save();
            return redirect()->back()->with('success', 'Berhasil update data Guru');
        
    }
    public function update_foto_guru(Request $request, $id)
    {
        $request->validate([
            'pic'=>['required'],
          ]);
          $data=guru::find($id);
          if ($request->hasFile('pic')) {
                $request->validate([
                    'pic' => ['image','mimes:jpeg,png,jpg,gif,svg']
                ]);
                $foto = $request->file('pic');
                $path = $foto->store('public/profile');
                Storage::delete($data->pic);
                $data->pic=$path;
                $data->save();
            }
            return redirect()->back()->with('success', 'Berhasil update data Guru');
        
    }
    public function update_password_guru(Request $request, $id)
    {
        $siswa=guru::find($id);
        $data=User::find($siswa->user_id);
             $data->password = $request->get('password');
             $data->status = $request->get('password');
             $data->save();
            return redirect()->back()->with('success', 'Berhasil ganti password');
        
    }
    public function json_guru()
    {
        $data=guru::with(['user'])->orderBy('id', 'DESC')->get();
        //dd($data->toArray());
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($user) {
                        return '
                        <a href="'.route('cetak_idcard_guru',$user->id).'" data-id="'.$user->id.'" class="btn btn-xs btn-success" target="_blank"> ID Card</a>
                        <button type="button" data-toggle="modal" data-target="#foto'.$user->id.'" class="btn btn-primary">Edit Foto</button>
                        <!-- Modal-->
                        <div id="foto'.$user->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 id="exampleModalLabel" class="modal-title">Perbaharui Foto</h4>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <form action="'.route('admin_update_foto_guru',$user->id).'" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                  <div class="form-group">
                                    <label>Cari Foto *</label>
                                    <input type="file" name="pic" class="form-control" required placeholder="Masukan 1-100">
                                  </div>
                                  <div class="form-group">       
                                    <input type="submit" value="Upload Foto" class="btn btn-primary">
                                  </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                </div>
                                </div>
                            </div>
                            </div>
                            <!-- end of modal -->
                        <a href="'.route('form_update_guru',$user->id).'" data-id="'.$user->id.'" class="btn btn-xs btn-info" target="_blank"><i class="glyphicon glyphicon-edit"></i> Update</a>
                        <button onclick="confirmDelete('.$user->id.')" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</button>
                        ';
                        // <a href="'.route('hapus_user',$user->user->id).'" data-id="'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                    })
                    ->addColumn('foto', function ($user) {
                        $ub=$user->pic;
                        $url=url('/').Storage::url($user->pic);
                        $not= asset('img/bg3x4.jpg');
                        $kondisi="belum";
                        if($ub == $kondisi){
                            return '
                            <img src="'.$not.'" width="113px" height="151px" alt="">
                            ';
                        }else{
                            return '
                            <img src="'.$url.'" width="113px" height="151px" alt="">
                            ';
                        }
                        
                    })
                    ->escapeColumns([])
                    ->make(true);
    }
    public function cetak_idcard_guru($id){
        $datas = guru::find($id);
        return view('guru.idcard',compact('datas'));
    }
    public function json_user_as_guru()
    {
        $data=guru::where('role_id','=',4)->orderBy('id', 'DESC')->get();
        //dd($data->toArray());
        return Datatables::of($data)
                    ->addIndexColumn()
                    
                    ->make(true);
    }
    public function cetak_buku_induk_guru()
    {
        $data=guru::all();
        return view('admin.siakad.cetak_buku_induk_guru',compact('data'));
    }
    public function data_siswa()
    {
        return view('admin.siakad.data_siswa');
    }
    public function download_skl($id)
    {
        $siswa = siswa::find($id);
        // $myFile = storage_path("folder/dummy_pdf.pdf");
      
        return Storage::download($siswa->skl);
    }
    public function json_siswa()
    {
        $data=siswa::with(['user'])->orderBy('id', 'DESC')->get();
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($user) {
                        return '
                        <a href="'.route('buku_besar_siswa',$user->id).'" data-id="'.$user->id.'" class="btn btn-xs btn-warning" target="_blank"><i class="glyphicon glyphicon-edit"></i> Cetak Buku Induk</a>
                        <a href="'.route('form_update_siswa',$user->id).'" data-id="'.$user->id.'" class="btn btn-xs btn-info" target="_blank"><i class="glyphicon glyphicon-edit"></i> Update</a>
                        <button onclick="confirmDelete('.$user->id.')" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</button>
                        ';
                        // <a href="'.route('hapus_user',$user->user->id).'" data-id="'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                    })
                    ->addColumn('cetak_skl', function ($user) {
                        if ($user->skl != null) {
                            return '
                            <a href="'.route('download_skl',$user->id).'" class="btn btn-xs btn-success" target="_blank">Download SKL</a>
                            ';
                        } else {
                            return '-';
                        }
                    })
                    ->addColumn('cetak_idcard', function ($user) {
                        
                            return '
                            <a href="'.route('siswa.cetak_idcard',$user->id).'" class="btn btn-xs btn-success" target="_blank">ID Card</a>
                            ';
                    })
                    ->addColumn('select', function ($user) {
                        return '
                            <input type="checkbox" class="form-control" data-id="'.$user->id.'">
                               ';
                    })
                    ->escapeColumns([])
                    ->make(true);
    }
    public function export_siswa(Request $request)
    {
        $id=$request->get('tahun');
        $tgl=date("d-m-Y-h-i-s");
        //dd($tgl);
        return Excel::download(new SiswaExport($id), 'Data_tahun_'.$id.'-'.$tgl.'.xlsx');
    }
    public function import_siswa(Request $request) 
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
        $uploaded = $request->file('file');
            $nama_file=$uploaded->getClientOriginalName();
            $path = $uploaded->store('public/file');
		//dd($path);
 
		// import data
		Excel::import(new SiswaImport, $path);
 
		return redirect()->back()->with('success', 'Berhasil Menambahkan');
    }
    public function hapus_guru($id)
    {   
        $data=Guru::find($id);
        $user=User::find($data->user_id);
        Storage::delete($data->pic);
        // dd($user);
        $data->delete();
        $user->delete();
        return redirect()->back()->with('success', 'Berhasil Dihapus');
    }
    public function hapus_user($id)
    {   
        $data=Siswa::find($id);
        $user=User::find($data->user_id);
        Storage::delete($data->pic);
        Storage::delete($data->pic_lulus);
        Storage::delete($data->skl);
        // dd($user);
        $data->delete();
        $user->delete();
        return redirect()->back()->with('success', 'Berhasil Dihapus');
    }
    public function pilih_siswa($id,$tahun,$semester)
    {
        $kelas_id=$id;
        $data=kelas::find($kelas_id);
        return view('admin.siakad.data_pilih_siswa',compact('kelas_id','data','tahun','semester'));
    }
    public function json_pilih_siswa()
    {
        // $data=siswa::leftjoin('krs', 'siswas.id', '=', 'krs.siswa_id')->whereNull('krs.siswa_id')
        //                     ->select('siswas.*')            
        //                     ->get();
        $data=siswa::all();
        //dd($cek->toArray());
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('pilih', function ($user) {
                        return '
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="siswa[]" value="'.$user->id.'">
                        </div>
                        ';
                    })
                    ->escapeColumns([])
                    ->make(true);
       
    }
    public function data_krs($id,$semester)
    {
        $kelas_id=$id;
        $data=kelas::find($kelas_id);
        $krs=krs::where('kelas_id','=',$kelas_id)->get();
        return view('admin.siakad.data_krs',compact('krs','kelas_id','data','semester'));
    }
    public function json_krs($id,$semester)
    {
        $data=krs::with(['siswa','kelas'])->where('kelas_id','=',$id)->where('semester','=',$semester)->orderBy('id', 'DESC')->get();
        //dd($data->toArray());
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($user) {
                        return '
                        <button type="button" data-toggle="modal" data-target="#data'.$user->id.'" class="btn btn-primary">Update</button>
                        <!-- Modal-->
                        <div id="data'.$user->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 id="exampleModalLabel" class="modal-title">Perbaharui Data</h4>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <form action="'.route('update_krs',$user->id).'" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                <div class="form-group">
                                    <label>Tahun *</label>
                                    <input type="text" name="tahun" value="'.$user->tahun.'" class="form-control" required placeholder="Tahun..">
                                  </div>
                                  
                                  <div class="form-group">       
                                    <input type="submit" value="Update" class="btn btn-primary">
                                  </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                </div>
                                </div>
                            </div>
                            </div>
                            <!-- end of modal -->
                            <button onclick="confirmDelete('.$user->id.')" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</button>
                            ';
                            // <a href="'.route('hapus_krs',$user->id).'" data-id="'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                    })
                    ->addColumn('cetak', function ($user) {
                        return '
                        <a href="'.route('cetak_sampul',[$user->id]).'" target="_blank" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i>Sampul</a>
                        <a href="'.route('cetak_data_sekolah',[$user->id]).'" target="_blank" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i>Data Sekolah</a>
                        <a href="'.route('cetak_petunjuk',[$user->id]).'" target="_blank" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i>Petunjuk</a>
                        <a href="'.route('cetak_data_diri',[$user->id]).'" target="_blank" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i>Keterangan Diri</a>
                        <a href="'.route('cetak_raport',[$user->id]).'" target="_blank" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i>Pencapaian</a>
                        <a href="'.route('cetak_deskripsi',[$user->id]).'" target="_blank" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i>Deskripsi</a>
                        ';
                    })
                    ->addColumn('deskripsi', function ($user) {
                        return '
                        <a href="'.route('data_prakerin',[$user->id]).'" target="_blank" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i>Prakerin</a>
                        <a href="'.route('data_eskul',[$user->id]).'" target="_blank" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-edit"></i>Ekstrakurikuler</a>
                        <a href="'.route('data_prestasi',[$user->id]).'" target="_blank" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i>Prestasi</a>
                        <a href="'.route('data_absen',[$user->id]).'" target="_blank" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-edit"></i>Presensi</a>
                        <a href="'.route('data_catatan',[$user->id]).'" target="_blank" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i>Catatan</a>
                        ';
                    })
                    ->addColumn('nis', function ($user) {
                        return $user->siswa->nis;
                    })
                    ->addColumn('nama', function ($user) {
                        return $user->siswa->nama_lengkap;
                    })
                    ->addColumn('kelas', function ($user) {
                        return $user->kelas->kelas;
                    })
                    ->escapeColumns([])
                    ->make(true);
    }
    public function input_krs(Request $request)
    {
        $siswa = $request->input('siswa');
        $kelas=$request->input('kelas_id');
        $semester=$request->input('semester');
        $tahun=$request->input('tahun');
        
        if ($siswa==null) {
            return redirect()->back()->with('gagal', 'Tidak ada siswa yang dipilih');
           
        }else{
           
                foreach($siswa as $siswas){
                    $cek=krs::where('siswa_id','=',$siswas)
                        ->where('tahun','=',$tahun)
                        ->where('semester','=',$semester)
                        ->count();
                    if ($cek==0) {
                    krs::create([
                        'kelas_id' => $kelas,
                        'siswa_id' => $siswas,
                        'semester' => $semester,
                        'tahun' => $tahun,
                    
                    ]);
                }
            }
            
           
            return redirect()->back()->with('success', 'Berhasil ditambah');
        }
       
    }
    public function update_krs(Request $request,$id)
    {
       
        $data=krs::find($id);
        $tahun=$request->get('tahun');
        if ($tahun!=null) {
            $data->tahun=$request->get('tahun');
        }else{
            $data->kelas_id=$request->get('kelas_id');
        }
        $data->save();
        return redirect()->back()->with('success', 'Berhasil diperbaharui');
    }
    public function hapus_krs($id)
    {
        $data=krs::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Berhasil Dihapus');
    }
    
    public function data_nilai_pengetahuan($id)
    {
        $mapel_id=$id;
        $data=mapel::find($mapel_id);
        $kelas_id=$data->kelas_id;
        return view('admin.siakad.data_nilai_pengetahuan',compact('mapel_id','data','kelas_id'));
    }

    //dev nilai usp
    public function data_nilai_usp($id)
    {
        $mapel_id=$id;
        $data=mapel::find($mapel_id);
        $kelas_id=$data->kelas_id;
        return view('admin.siakad.data_nilai_usp',compact('mapel_id','data','kelas_id'));
    }
    //dev nilai ukk
    public function data_nilai_ukk($id)
    {
        $mapel_id=$id;
        $data=mapel::find($mapel_id);
        $kelas_id=$data->kelas_id;
        return view('admin.siakad.data_nilai_ukk',compact('mapel_id','data','kelas_id'));
    }
    //dev nilai usp
    public function json_nilai_usp($id)
    {
        $mapel_id=$id;
        $mapel=mapel::find($mapel_id);
        $kelas_id=$mapel->kelas_id;
        $semester=$mapel->semester;
        // $data=nilai_usp_ukk::with('siswa','ujian')->leftJoin('ujians', 'ujians.id', '=', 'nilai_usp_ukks.ujian_id')->where('mapel_id', $mapel->id)->where('jenis','USP')->select('nilai_usp_ukks.*')->get();
        $data = nilai::with('usp','siswa')->has('usp')->leftJoin('ujians', function($join) { $join->on('nilais.ujian_id', '=', 'ujians.id');
                                })->leftJoin('mapels', function($join) { $join->on('ujians.mapel_id', '=', 'mapels.id');
                                })->where('mapels.id', '=', $mapel_id)->select(
                                                                                'nilais.*', 
                                                                                'ujians.mapel_id',
                                                                                'mapels.nama_mapel'
                                                                               )->get();
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('nis', function ($user) {
                        return $user->siswa->nis;
                    })
                    ->addColumn('nama', function ($user) {
                        return $user->siswa->nama_lengkap;
                    })
                    ->addColumn('angka', function ($user) {
                        return $user->nilai;
                    })
                    ->addColumn('nilai', function ($user) {
                        // dd($user->count()==0);
                        $cek = $user;
                        if ($cek->count()==0) {
                        return '
                        <button type="button" data-toggle="modal" data-target="#proyek6'.$user->id.'" class="btn btn-primary">Masukan Nilai</button>
                        <!-- Modal-->
                        <div id="proyek6'.$user->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 id="exampleModalLabel" class="modal-title">Masukan Nilai</h4>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <form action="'.route('input_nilai_usp').'" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                  <div class="form-group">
                                    <input type="text" name="nilai_id" value="'.$user->id.'" class="form-control" required hidden>
                                    <input type="text" name="ujian_id" value="'.$user->ujian_id.'" class="form-control" required hidden>
                                    <input type="text" name="siswa_id" value="'.$user->siswa->id.'" class="form-control" required hidden>                                  </div>
                                  </div>
                                  <div class="form-group">
                                    <label>Nilai USP *</label>
                                    <input type="text" name="nilai" value="" class="form-control">
                                  </div>
                                  <div class="form-group">       
                                    <input type="submit" value="Set Nilai" class="btn btn-primary">
                                  </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- end of modal -->
                        ';
                        }else{
                            // foreach ($user as $get){
                                return '
                                <button type="button" data-toggle="modal" data-target="#proyek6'.$user->id.'" class="btn btn-success">Tambah Nilai</button>
                                <!-- Modal-->
                                <div id="proyek6'.$user->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                    <div role="document" class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 id="exampleModalLabel" class="modal-title">Masukan Nilai</h4>
                                                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="'.route('input_nilai_usp').'" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="_token" value="'.csrf_token().'">
                                                    <div class="form-group">
                                                        <input type="text" name="nilai_id" value="'.$user->id.'" class="form-control" required hidden>
                                                        <input type="text" name="ujian_id" value="'.$user->ujian_id.'" class="form-control" required hidden>
                                                        <input type="text" name="siswa_id" value="'.$user->siswa->id.'" class="form-control" required hidden>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nilai USP *</label>
                                                        <input type="text" name="nilai" value="'.$user->nilai.'" class="form-control">
                                                    </div>
                                                    <div class="form-group">       
                                                        <input type="submit" value="Set Nilai" class="btn btn-primary">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of modal -->
                                ';
                            // }
                        }
                        
                    })
                    ->escapeColumns([])
                    ->make(true);
    }
    //dev nilai ukk
    public function json_nilai_ukk($id)
    {
        $mapel_id=$id;
        $mapel=mapel::find($mapel_id);
        $kelas_id=$mapel->kelas_id;
        $semester=$mapel->semester;
        $data = krs::with('siswa')->where('kelas_id', $kelas_id)->where('semester', 'GENAP')->get();
        // dd($data);
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('nis', function ($user) {
                        return $user->siswa->nis;
                    })
                    ->addColumn('nama', function ($user) {
                        return $user->siswa->nama_lengkap;
                    })
                    ->addColumn('angka', function ($user) use ($mapel_id){
                        $nilai_ukk = nilai_ukk::where('siswa_id',$user->siswa_id)->where('kelas_id',$user->kelas_id)->where('mapel_id',$mapel_id)->first();
                        if($nilai_ukk != null){
                            return $nilai_ukk->nilai;
                        }
                        return 0;
                    })
                    ->addColumn('nilai', function ($user) use ($mapel_id){
                        $nilai_ukk = nilai_ukk::where('siswa_id',$user->siswa_id)->where('kelas_id',$user->kelas_id)->where('mapel_id',$mapel_id)->first();
                        $cek = $user;
                        if ($nilai_ukk == null) {
                        return '
                        <button type="button" data-toggle="modal" data-target="#proyek6'.$user->id.'" class="btn btn-primary">Masukan Nilai</button>
                        <!-- Modal-->
                        <div id="proyek6'.$user->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 id="exampleModalLabel" class="modal-title">Masukan Nilai</h4>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <form action="'.route('input_nilai_ukk').'" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                  <div class="form-group">
                                    <input type="text" name="mapel_id" value="'.$mapel_id.'" class="form-control" required hidden>
                                    <input type="text" name="siswa_id" value="'.$user->siswa->id.'" class="form-control" required hidden>                                 
                                    <input type="text" name="kelas_id" value="'.$user->kelas_id.'" class="form-control" required hidden>                                  
                                  </div>
                                  <div class="form-group">
                                    <label>Nilai UKK *</label>
                                    <input type="text" name="nilai" value="" class="form-control">
                                  </div>
                                  <div class="form-group">       
                                    <input type="submit" value="Set Nilai" class="btn btn-primary">
                                  </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- end of modal -->
                        ';
                        }else{
                            // foreach ($user as $get){
                                return '
                                <button type="button" data-toggle="modal" data-target="#proyek6'.$user->id.'" class="btn btn-success">Tambah Nilai</button>
                                <!-- Modal-->
                                <div id="proyek6'.$user->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                    <div role="document" class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 id="exampleModalLabel" class="modal-title">Masukan Nilai</h4>
                                                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="'.route('input_nilai_ukk').'" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="_token" value="'.csrf_token().'">
                                                    <div class="form-group">
                                                        <input type="text" name="nilai_id" value="'.$nilai_ukk->id.'" class="form-control" required hidden>
                                                        <input type="text" name="mapel_id" value="'.$mapel_id.'" class="form-control" required hidden>
                                                        <input type="text" name="siswa_id" value="'.$user->siswa->id.'" class="form-control" required hidden>
                                                        <input type="text" name="kelas_id" value="'.$nilai_ukk->kelas_id.'" class="form-control" required hidden>                                  

                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nilai UKK *</label>
                                                        <input type="text" name="nilai" value="'.$nilai_ukk->nilai.'" class="form-control">
                                                    </div>
                                                    <div class="form-group">       
                                                        <input type="submit" value="Set Nilai" class="btn btn-primary">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of modal -->
                                ';
                            // }
                        }
                        
                    })
                    ->escapeColumns([])
                    ->make(true);
    }
    public function input_nilai_ukk(Request $request)
    {
        $id = $request->input('nilai_id');
        $siswa = $request->input('siswa_id');
        $mapel =$request->input('mapel_id');
        $kelas =$request->input('kelas_id');
        $cek=nilai_ukk::find($id);
        try {
            DB::beginTransaction();
    
            $cek = nilai_ukk::find($id);
    
            if ($cek == null) {
                nilai_ukk::create([
                    'siswa_id' => $siswa,
                    'kelas_id' => $kelas,
                    'mapel_id' => $mapel,
                    'nilai' => $request->input('nilai'),
                ]);
            } else {
                $data = nilai_ukk::find($id);
                $data->nilai = $request->input('nilai');
                $data->save();
            }
    
            DB::commit();
    
            return redirect()->back()->with('success', 'Berhasil ditambah');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Gagal ditambah');
        }
          
    }
    public function data_siswa_pengetahuan($id)
    {
        $mapel_id=$id;
        $data=mapel::find($mapel_id);
        $kelas_id=$data->kelas_id;
        return view('admin.siakad.data_siswa_pengetahuan',compact('mapel_id','data','kelas_id'));
    }
    public function json_nilai_pengetahuan($id)
    {
        $mapel_id=$id;
        $mapel=mapel::find($mapel_id);
        $kelas_id=$mapel->kelas_id;
        $semester=$mapel->semester;
        $data=krs::with(['siswa','kelas','nilai_pengetahuan'=>function ($query) use ($mapel_id)
        {
            $query->where('mapel_id','=',$mapel_id)->get();
        }])
                ->where('kelas_id','=',$kelas_id)
                ->where('semester','=',$semester)
                ->get();
        // dd($data->toArray());
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('nis', function ($user) {
                        return $user->siswa->nis;
                    })
                    ->addColumn('nama', function ($user) {
                        return $user->siswa->nama_lengkap;
                    })
                    ->addColumn('nilai', function ($user) use ($kelas_id,$mapel_id){
                        if ($user->nilai_pengetahuan->count()==0) {
                        return '
                        <button type="button" data-toggle="modal" data-target="#proyek6'.$user->id.'" class="btn btn-primary">Masukan Nilai</button>
                        <!-- Modal-->
                        <div id="proyek6'.$user->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 id="exampleModalLabel" class="modal-title">Masukan Nilai</h4>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <form action="'.route('input_nilai_pengetahuan').'" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                  <div class="form-group">
                                    <input type="text" name="krs_id" value="'.$user->id.'" class="form-control" required hidden>
                                    <input type="text" name="kelas_id" value="'.$kelas_id.'" class="form-control" required hidden>
                                    <input type="text" name="siswa_id" value="'.$user->siswa->id.'" class="form-control" required hidden>
                                    <input type="text" name="mapel_id" value="'.$mapel_id.'" class="form-control" required hidden>
                                  </div>
                                  <div class="form-group">
                                            <label>Nilai tugas 1 *</label>
                                            <input type="text" name="tugas1" value="" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai tugas 2 *</label>
                                            <input type="text" name="tugas2" value="" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai tugas 3 *</label>
                                            <input type="text" name="tugas3" value="" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai tugas 4 *</label>
                                            <input type="text" name="tugas4" value="" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai tugas 5 *</label>
                                            <input type="text" name="tugas5" value="" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai tugas 6 *</label>
                                            <input type="text" name="tugas6" value="" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai uh 1 *</label>
                                            <input type="text" name="uh1" value="" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai uh 2 *</label>
                                            <input type="text" name="uh2" value="" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai uh 3 *</label>
                                            <input type="text" name="uh3" value="" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai uh 4 *</label>
                                            <input type="text" name="uh4" value="" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai uh 5 *</label>
                                            <input type="text" name="uh5" value="" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai uh 6 *</label>
                                            <input type="text" name="uh6" value="" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai uts *</label>
                                            <input type="text" name="uts" value="" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai uas *</label>
                                            <input type="text" name="uas" value="" class="form-control">
                                          </div>
                                  <div class="form-group">       
                                    <input type="submit" value="Set Nilai" class="btn btn-primary">
                                  </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                </div>
                                </div>
                            </div>
                            </div>
                            <!-- end of modal -->
                        ';
                        }else{
                            foreach ($user->nilai_pengetahuan as $nilai){
                                // dd($nilai->toArray());
                                return '
                                <button type="button" data-toggle="modal" data-target="#proyek6'.$user->id.'" class="btn btn-success">Tambah Nilai</button>
                                <!-- Modal-->
                                <div id="proyek6'.$user->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                    <div role="document" class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 id="exampleModalLabel" class="modal-title">Masukan Nilai</h4>
                                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="'.route('input_nilai_pengetahuan').'" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="'.csrf_token().'">
                                          <div class="form-group">
                                            <input type="text" name="krs_id" value="'.$user->id.'" class="form-control" required hidden>
                                            <input type="text" name="kelas_id" value="'.$kelas_id.'" class="form-control" required hidden>
                                            <input type="text" name="siswa_id" value="'.$user->siswa->id.'" class="form-control" required hidden>
                                            <input type="text" name="mapel_id" value="'.$mapel_id.'" class="form-control" required hidden>
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai tugas 1 *</label>
                                            <input type="text" name="tugas1" value="'.$nilai->tugas1.'" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai tugas 2 *</label>
                                            <input type="text" name="tugas2" value="'.$nilai->tugas2.'" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai tugas 3 *</label>
                                            <input type="text" name="tugas3" value="'.$nilai->tugas3.'" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai tugas 4 *</label>
                                            <input type="text" name="tugas4" value="'.$nilai->tugas4.'" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai tugas 5 *</label>
                                            <input type="text" name="tugas5" value="'.$nilai->tugas5.'" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai tugas 6 *</label>
                                            <input type="text" name="tugas6" value="'.$nilai->tugas6.'" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai uh 1 *</label>
                                            <input type="text" name="uh1" value="'.$nilai->uh1.'" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai uh 2 *</label>
                                            <input type="text" name="uh2" value="'.$nilai->uh2.'" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai uh 3 *</label>
                                            <input type="text" name="uh3" value="'.$nilai->uh3.'" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai uh 4 *</label>
                                            <input type="text" name="uh4" value="'.$nilai->uh4.'" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai uh 5 *</label>
                                            <input type="text" name="uh5" value="'.$nilai->uh5.'" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai uh 6 *</label>
                                            <input type="text" name="uh6" value="'.$nilai->uh6.'" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai uts *</label>
                                            <input type="text" name="uts" value="'.$nilai->uts.'" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai uas *</label>
                                            <input type="text" name="uas" value="'.$nilai->uas.'" class="form-control">
                                          </div>
                                          <div class="form-group">       
                                            <input type="submit" value="Set Nilai" class="btn btn-primary">
                                          </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- end of modal -->
                                ';
                                }
                        }
                        
                    })
                    ->escapeColumns([])
                    ->make(true);
    }
    public function import_pengetahuan(Request $request)
    {
        // validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
            $uploaded = $request->file('file');
            $nama_file=$uploaded->getClientOriginalName();
            $path = $uploaded->store('public/pengetahuan');
		//dd($path);
 
		// import data
		Excel::import(new import_pengetahuan, $path);
 
		return redirect()->back()->with('success', 'Berhasil Menambahkan');
    }
    public function export_pengetahuan($id)
    {
        $id=$id;
        $tgl=date("d-m-Y-h-i-s");
        //dd($tgl);
        return Excel::download(new export_pengetahuan($id), 'Tempalate_Pengetahuan'.$id.'-'.$tgl.'.xlsx');
    }
    public function input_nilai_pengetahuan(Request $request)
    {
        $siswa = $request->input('siswa_id');
        $krs=$request->input('krs_id');
        $kelas=$request->input('kelas_id');
        $mapel=$request->input('mapel_id');
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
                'tugas1' => $request->input('tugas1'),
                'tugas2' => $request->input('tugas2'),
                'tugas3' => $request->input('tugas3'),
                'tugas4' => $request->input('tugas4'),
                'tugas5' => $request->input('tugas5'),
                'tugas6' => $request->input('tugas6'),
                'uh1' => $request->input('uh1'),
                'uh2' => $request->input('uh2'),
                'uh3' => $request->input('uh3'),
                'uh4' => $request->input('uh4'),
                'uh5' => $request->input('uh5'),
                'uh6' => $request->input('uh6'),
                'uts' => $request->input('uts'),
                'uas' => $request->input('uas'),
            ]);
        }else{
            $pengetahuan=nilai_pengetahuan::where('siswa_id','=',$siswa)
            ->where('kelas_id','=',$kelas)
            ->where('mapel_id','=',$mapel)
            ->first();
            $pengetahuan_id=$pengetahuan->id;
            $data=nilai_pengetahuan::find($pengetahuan->id);
            $data->krs_id=$krs;
            $data->kelas_id=$kelas;
            $data->siswa_id=$siswa;
            $data->mapel_id=$mapel;
            $data->tugas1=$request->get('tugas1');
            $data->tugas2=$request->get('tugas2');
            $data->tugas3=$request->get('tugas3');
            $data->tugas4=$request->get('tugas4');
            $data->tugas5=$request->get('tugas5');
            $data->tugas6=$request->get('tugas6');
            $data->uh1=$request->get('uh1');
            $data->uh2=$request->get('uh2');
            $data->uh3=$request->get('uh3');
            $data->uh4=$request->get('uh4');
            $data->uh5=$request->get('uh5');
            $data->uh6=$request->get('uh6');
            $data->uts=$request->get('uts');
            $data->uas=$request->get('uas');
            $data->save();
        }
            return redirect()->back()->with('success', 'Berhasil ditambah');
          
    }
    //dev input nilai usp
    public function input_nilai_usp(Request $request)
    {
        $id = $request->input('nilai_id');
        $siswa = $request->input('siswa_id');
        $ujian=$request->input('ujian_id');
        $cek=nilai::find($id);
        // dd($cek);
        if ($cek==null) {
            nilai::create([
                'siswa_id' => $siswa,
                'ujian_id' => $ujian,
                'nilai' => $request->input('nilai'),
            ]);
        }else{
            $data=nilai::find($id);
            $data->nilai=$request->get('nilai');
            $data->save();

        }
            return redirect()->back()->with('success', 'Berhasil ditambah');
          
    }
    
    public function data_nilai_keterampilan($id)
    {
        $mapel_id=$id;
        $data=mapel::find($mapel_id);
        $kelas_id=$data->kelas_id;
        return view('admin.siakad.data_nilai_keterampilan',compact('mapel_id','data','kelas_id'));
    }
    public function data_siswa_keterampilan($id)
    {
        $mapel_id=$id;
        $data=mapel::find($mapel_id);
        $kelas_id=$data->kelas_id;
        return view('admin.siakad.data_siswa_keterampilan',compact('mapel_id','data','kelas_id'));
    }
    public function json_nilai_keterampilan($id)
    {
        $mapel_id=$id;
        $mapel=mapel::find($mapel_id);
        $kelas_id=$mapel->kelas_id;
        $semester=$mapel->semester;
        $data=krs::with(['siswa','kelas','nilai_keterampilan'=>function ($query) use ($mapel_id)
        {
            $query->where('mapel_id','=',$mapel_id)->get();
        }])
        ->where('kelas_id','=',$kelas_id)
        ->where('semester','=',$semester)->get();
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('nis', function ($user) {
                        return $user->siswa->nis;
                    })
                    ->addColumn('nama', function ($user) {
                        
                        return $user->siswa->nama_lengkap;
                       
                    })
                    ->addColumn('nilai', function ($user) use ($kelas_id,$mapel_id){
                        if ($user->nilai_keterampilan->count()==0) {
                            return '
                        <button type="button" data-toggle="modal" data-target="#proyek6'.$user->id.'" class="btn btn-primary">Masukan Nilai</button>
                        <!-- Modal-->
                        <div id="proyek6'.$user->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 id="exampleModalLabel" class="modal-title">Masukan Nilai</h4>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <form action="'.route('input_nilai_keterampilan').'" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                  <div class="form-group">
                                    <input type="text" name="krs_id" value="'.$user->id.'" class="form-control" required hidden>
                                    <input type="text" name="kelas_id" value="'.$kelas_id.'" class="form-control" required hidden>
                                    <input type="text" name="siswa_id" value="'.$user->siswa->id.'" class="form-control" required hidden>
                                    <input type="text" name="mapel_id" value="'.$mapel_id.'" class="form-control" required hidden>
                                  </div>
                                  <div class="form-group">
                                    <label>Nilai Praktik 1 *</label>
                                    <input type="text" name="praktik1" value="" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>Nilai Praktik 2 *</label>
                                    <input type="text" name="praktik2" value="" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>Nilai Praktik 3 *</label>
                                    <input type="text" name="praktik3" value="" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>Nilai Praktik 4 *</label>
                                    <input type="text" name="praktik4" value="" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>Nilai Praktik 5 *</label>
                                    <input type="text" name="praktik5" value="" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>Nilai Praktik 6 *</label>
                                    <input type="text" name="praktik6" value="" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>Nilai portofolio 1 *</label>
                                    <input type="text" name="portofolio1" value="" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>Nilai portofolio 2 *</label>
                                    <input type="text" name="portofolio2" value="" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>Nilai portofolio 3 *</label>
                                    <input type="text" name="portofolio3" value="" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>Nilai portofolio 4 *</label>
                                    <input type="text" name="portofolio4" value="" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>Nilai portofolio 5 *</label>
                                    <input type="text" name="portofolio5" value="" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>Nilai portofolio 6 *</label>
                                    <input type="text" name="portofolio6" value="" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>Nilai proyek 1 *</label>
                                    <input type="text" name="proyek1" value="" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>Nilai proyek 2 *</label>
                                    <input type="text" name="proyek2" value="" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>Nilai proyek 3 *</label>
                                    <input type="text" name="proyek3" value="" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>Nilai proyek 4 *</label>
                                    <input type="text" name="proyek4" value="" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>Nilai proyek 5 *</label>
                                    <input type="text" name="proyek5" value="" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>Nilai proyek 6 *</label>
                                    <input type="text" name="proyek6" value="" class="form-control">
                                  </div>
                                  <div class="form-group">       
                                    <input type="submit" value="Set Nilai" class="btn btn-primary">
                                  </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                </div>
                                </div>
                            </div>
                            </div>
                            <!-- end of modal -->
                        ';
                        }else{
                            foreach ($user->nilai_keterampilan as $nilai){
                                return '
                                <button type="button" data-toggle="modal" data-target="#proyek6'.$user->id.'" class="btn btn-success">Tambah Nilai</button>
                                <!-- Modal-->
                                <div id="proyek6'.$user->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                    <div role="document" class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 id="exampleModalLabel" class="modal-title">Masukan Nilai</h4>
                                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="'.route('input_nilai_keterampilan').'" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="'.csrf_token().'">
                                          <div class="form-group">
                                            <input type="text" name="krs_id" value="'.$user->id.'" class="form-control" required hidden>
                                            <input type="text" name="kelas_id" value="'.$kelas_id.'" class="form-control" required hidden>
                                            <input type="text" name="siswa_id" value="'.$user->siswa->id.'" class="form-control" required hidden>
                                            <input type="text" name="mapel_id" value="'.$mapel_id.'" class="form-control" required hidden>
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai Praktik 1 *</label>
                                            <input type="text" name="praktik1" value="'.$nilai->praktik1.'" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai Praktik 2 *</label>
                                            <input type="text" name="praktik2" value="'.$nilai->praktik2.'" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai Praktik 3 *</label>
                                            <input type="text" name="praktik3" value="'.$nilai->praktik3.'" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai Praktik 4 *</label>
                                            <input type="text" name="praktik4" value="'.$nilai->praktik4.'" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai Praktik 5 *</label>
                                            <input type="text" name="praktik5" value="'.$nilai->praktik5.'" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai Praktik 6 *</label>
                                            <input type="text" name="praktik6" value="'.$nilai->praktik6.'" class="form-control">
                                          </div>

                                          <div class="form-group">
                                            <label>Nilai portofolio 1 *</label>
                                            <input type="text" name="portofolio1" value="'.$nilai->portofolio1.'" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai portofolio 2 *</label>
                                            <input type="text" name="portofolio2" value="'.$nilai->portofolio2.'" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai portofolio 3 *</label>
                                            <input type="text" name="portofolio3" value="'.$nilai->portofolio3.'" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai portofolio 4 *</label>
                                            <input type="text" name="portofolio4" value="'.$nilai->portofolio4.'" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai portofolio 5 *</label>
                                            <input type="text" name="portofolio5" value="'.$nilai->portofolio5.'" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai portofolio 6 *</label>
                                            <input type="text" name="portofolio6" value="'.$nilai->portofolio6.'" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai proyek 1 *</label>
                                            <input type="text" name="proyek1" value="'.$nilai->proyek1.'" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai proyek 2 *</label>
                                            <input type="text" name="proyek2" value="'.$nilai->proyek2.'" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai proyek 3 *</label>
                                            <input type="text" name="proyek3" value="'.$nilai->proyek3.'" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai proyek 4 *</label>
                                            <input type="text" name="proyek4" value="'.$nilai->proyek4.'" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai proyek 5 *</label>
                                            <input type="text" name="proyek5" value="'.$nilai->proyek5.'" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai proyek 6 *</label>
                                            <input type="text" name="proyek6" value="'.$nilai->proyek6.'" class="form-control">
                                          </div>
                                          <div class="form-group">       
                                            <input type="submit" value="Set Nilai" class="btn btn-primary">
                                          </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- end of modal -->
                                ';
                                }
                        }
                        
                    })
                    ->escapeColumns([])
                    ->make(true);
    }
    public function import_keterampilan(Request $request)
    {
        // validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
            $uploaded = $request->file('file');
            $nama_file=$uploaded->getClientOriginalName();
            $path = $uploaded->store('public/keterampilan');
		//dd($path);
 
		// import data
		Excel::import(new import_keterampilan, $path);
 
		return redirect()->back()->with('success', 'Berhasil Menambahkan');
    }
    public function export_keterampilan($id)
    {
        $id=$id;
        $tgl=date("d-m-Y-h-i-s");
        //dd($tgl);
        return Excel::download(new export_keterampilan($id), 'Template_keterampilan'.$id.'-'.$tgl.'.xlsx');
    }
    public function input_nilai_keterampilan(Request $request)
    {
        $siswa = $request->input('siswa_id');
        $krs=$request->input('krs_id');
        $kelas=$request->input('kelas_id');
        $mapel=$request->input('mapel_id');
        $cek=nilai_keterampilan::where('siswa_id','=',$siswa)
        ->where('kelas_id','=',$kelas)
        ->where('mapel_id','=',$mapel)
        ->count();
        // dd($cek);
        if ($cek==0) {
            nilai_keterampilan::create([
                'krs_id' => $krs,
                'kelas_id' => $kelas,
                'siswa_id' => $siswa,
                'mapel_id' => $mapel,
                'praktik1' => $request->input('praktik1'),
                'praktik2' => $request->input('praktik2'),
                'praktik3' => $request->input('praktik3'),
                'praktik4' => $request->input('praktik4'),
                'praktik5' => $request->input('praktik5'),
                'praktik6' => $request->input('praktik6'),
                'portofolio1' => $request->input('portofolio1'),
                'portofolio2' => $request->input('portofolio2'),
                'portofolio3' => $request->input('portofolio3'),
                'portofolio4' => $request->input('portofolio4'),
                'portofolio5' => $request->input('portofolio5'),
                'portofolio6' => $request->input('portofolio6'),
                'proyek1' => $request->input('proyek1'),
                'proyek2' => $request->input('proyek2'),
                'proyek3' => $request->input('proyek3'),
                'proyek4' => $request->input('proyek4'),
                'proyek5' => $request->input('proyek5'),
                'proyek6' => $request->input('proyek6'),
            ]);
        }else{
            $keterampilan=nilai_keterampilan::where('siswa_id','=',$siswa)
            ->where('kelas_id','=',$kelas)
            ->where('mapel_id','=',$mapel)
            ->first();
            $keterampilan_id=$keterampilan->id;
            $data=nilai_keterampilan::find($keterampilan->id);
            $data->krs_id=$krs;
            $data->kelas_id=$kelas;
            $data->siswa_id=$siswa;
            $data->mapel_id=$mapel;
            $data->praktik1=$request->get('praktik1');
            $data->praktik2=$request->get('praktik2');
            $data->praktik3=$request->get('praktik3');
            $data->praktik4=$request->get('praktik4');
            $data->praktik5=$request->get('praktik5');
            $data->praktik6=$request->get('praktik6');
            $data->portofolio1 = $request->input('portofolio1');
            $data->portofolio2 = $request->input('portofolio2');
            $data->portofolio3 = $request->input('portofolio3');
            $data->portofolio4 = $request->input('portofolio4');
            $data->portofolio5 = $request->input('portofolio5');
            $data->portofolio6 = $request->input('portofolio6');
            $data->proyek1 = $request->input('proyek1');
            $data->proyek2 = $request->input('proyek2');
            $data->proyek3 = $request->input('proyek3');
            $data->proyek4 = $request->input('proyek4');
            $data->proyek5 = $request->input('proyek5');
            $data->proyek6 = $request->input('proyek6');
            $data->save();
        }
            return redirect()->back()->with('success', 'Berhasil ditambah');
        
       
    }
    
    public function data_nilai_sikap($id)
    {
        $mapel_id=$id;
        $data=mapel::find($mapel_id);
        $kelas_id=$data->kelas_id;
        return view('admin.siakad.data_nilai_sikap',compact('mapel_id','data','kelas_id'));
    }
    public function data_siswa_sikap($id)
    {
        $mapel_id=$id;
        $data=mapel::find($mapel_id);
        $kelas_id=$data->kelas_id;
        return view('admin.siakad.data_siswa_sikap',compact('mapel_id','data','kelas_id'));
    }
    
    public function json_nilai_sikap($id)
    {
        $mapel_id=$id;
        $mapel=mapel::find($mapel_id);
        $kelas_id=$mapel->kelas_id;
        $semester=$mapel->semester;
        $data=krs::with(['siswa','kelas','nilai_sikap'=>function ($query) use ($mapel_id)
        {
            $query->where('mapel_id','=',$mapel_id)->get();
        }])
        ->where('kelas_id','=',$kelas_id)
        ->where('semester','=',$semester)->get();
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('nis', function ($user) {
                        return $user->siswa->nis;
                    })
                    ->addColumn('nama', function ($user) {
                        return $user->siswa->nama_lengkap;
                    })
                    ->addColumn('nilai', function ($user) use ($kelas_id,$mapel_id){
                        if ($user->nilai_sikap->count()==0) {
                            return '
                        <button type="button" data-toggle="modal" data-target="#proyek6'.$user->id.'" class="btn btn-primary">Masukan Nilai</button>
                        <!-- Modal-->
                        <div id="proyek6'.$user->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 id="exampleModalLabel" class="modal-title">Masukan Nilai</h4>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <form action="'.route('input_nilai_sikap').'" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                  <div class="form-group">
                                    <input type="text" name="krs_id" value="'.$user->id.'" class="form-control" required hidden>
                                    <input type="text" name="kelas_id" value="'.$kelas_id.'" class="form-control" required hidden>
                                    <input type="text" name="siswa_id" value="'.$user->siswa->id.'" class="form-control" required hidden>
                                    <input type="text" name="mapel_id" value="'.$mapel_id.'" class="form-control" required hidden>
                                  </div>
                                  <div class="form-group">
                                    <label>Nilai Sikap *</label>
                                    <input type="text" name="sikap" value="" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>Deskripsi *</label>
                                    <input type="text" name="deskripsi" value="" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>Alpha *</label>
                                    <input type="text" name="alpha" value="" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>Izin *</label>
                                    <input type="text" name="izin" value="" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>Sakit *</label>
                                    <input type="text" name="sakit" value="" class="form-control">
                                  </div>
                                  <div class="form-group">       
                                    <input type="submit" value="Set Nilai" class="btn btn-primary">
                                  </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                </div>
                                </div>
                            </div>
                            </div>
                            <!-- end of modal -->
                        ';
                        }else{
                            foreach ($user->nilai_sikap as $nilai){
                                return '
                                <button type="button" data-toggle="modal" data-target="#proyek6'.$user->id.'" class="btn btn-success">Tambah Nilai</button>
                                <!-- Modal-->
                                <div id="proyek6'.$user->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                    <div role="document" class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 id="exampleModalLabel" class="modal-title">Masukan Nilai</h4>
                                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="'.route('input_nilai_sikap').'" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="'.csrf_token().'">
                                          <div class="form-group">
                                            <input type="text" name="krs_id" value="'.$user->id.'" class="form-control" required hidden>
                                            <input type="text" name="kelas_id" value="'.$kelas_id.'" class="form-control" required hidden>
                                            <input type="text" name="siswa_id" value="'.$user->siswa->id.'" class="form-control" required hidden>
                                            <input type="text" name="mapel_id" value="'.$mapel_id.'" class="form-control" required hidden>
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai Sikap *</label>
                                            <input type="text" name="sikap" value="'.$nilai->sikap.'" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Deskripsi *</label>
                                            <input type="text" name="deskripsi" value="'.$nilai->deskripsi.'" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Alpha *</label>
                                            <input type="text" name="alpha" value="'.$nilai->alpha.'" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Izin *</label>
                                            <input type="text" name="izin" value="'.$nilai->izin.'" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Sakit *</label>
                                            <input type="text" name="sakit" value="'.$nilai->sakit.'" class="form-control">
                                        </div>
                                          <div class="form-group">       
                                            <input type="submit" value="Set Nilai" class="btn btn-primary">
                                          </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- end of modal -->
                                ';
                                }
                        }
                        
                    })
                    ->escapeColumns([])
                    ->make(true);
    }
    public function import_sikap(Request $request)
    {
        // validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
            $uploaded = $request->file('file');
            $nama_file=$uploaded->getClientOriginalName();
            $path = $uploaded->store('public/sikap');
		//dd($path);
 
		// import data
		Excel::import(new import_sikap, $path);
 
		return redirect()->back()->with('success', 'Berhasil Menambahkan');
    }
    public function export_sikap($id)
    {
        $id=$id;
        $tgl=date("d-m-Y-h-i-s");
        //dd($tgl);
        return Excel::download(new export_sikap($id), 'Template_sikap'.$id.'-'.$tgl.'.xlsx');
    }
    public function input_nilai_sikap(Request $request)
    {
        
        $siswa = $request->input('siswa_id');
        $krs=$request->input('krs_id');
        $kelas=$request->input('kelas_id');
        $mapel=$request->input('mapel_id');
        $cek=nilai_sikap::where('siswa_id','=',$siswa)
        ->where('kelas_id','=',$kelas)
        ->where('mapel_id','=',$mapel)
        ->count();
        // dd($cek);
        if ($cek==0) {
            nilai_sikap::create([
                'krs_id' => $krs,
                'kelas_id' => $kelas,
                'siswa_id' => $siswa,
                'mapel_id' => $mapel,
                'sikap' => $request->input('sikap'),
                'deskripsi' => $request->input('deskripsi'),
                'alpha' => $request->input('alpha'),
                'izin' => $request->input('izin'),
                'sakit' => $request->input('sakit'),
            ]);
        }else{
            $sikap=nilai_sikap::where('siswa_id','=',$siswa)
            ->where('kelas_id','=',$kelas)
            ->where('mapel_id','=',$mapel)
            ->first();
            $sikap_id=$sikap->id;
            $data=nilai_sikap::find($sikap->id);
            $data->krs_id=$krs;
            $data->kelas_id=$kelas;
            $data->siswa_id=$siswa;
            $data->mapel_id=$mapel;
                $data->sikap = $request->input('sikap');
                $data->deskripsi = $request->input('deskripsi');
                $data->alpha = $request->input('alpha');
                $data->izin = $request->input('izin');
                $data->sakit = $request->input('sakit');
            $data->save();
        }
            return redirect()->back()->with('success', 'Berhasil ditambah');
        
       
       
    }
    
     /* Aplikasi PPDB
        Aplikasi ini memiliki fitur :
        >Pendaftarn
        >Verifikasi
        >Bukti tranfer
    */
    public function data_pendaftar()
    {
        return view('admin.data_pendaftar');
    }
    public function json_pendaftar()
    {
        $data=User::where('role_id','=',3)->orderBy('id', 'DESC')->get();
        //dd($data->toArray());
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($user) {
                        return '
                        <button onclick="confirmDelete('.$user->id.')" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</button>
                        ';
                        // <a href="'.route('hapus_user',$user->id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                    })
                    ->make(true);
    }
    public function data_unverified()
    {
        return view('admin.data_unverified');
    }
    public function json_unverified()
    {
        $data=p_bukti_tf::with(['user'])->where('v_status','=','Pending')->orderBy('id', 'DESC')->get();
        //dd($data->toArray());
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($user) {
                        return '
                        <a href="'.route('verifikasi_user',$user->id).'" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-edit"></i> Verifikasi</a>
                        <button onclick="confirmDelete('.$user->id.')" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</button>
                        ';
                        // <a href="'.route('hapus_bukti_tf',$user->id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                    })
                    ->addColumn('nama', function ($user) {
                        return $user->user->name;
                    })
                    ->addColumn('nisn', function ($user) {
                        return $user->user->username;
                    })
                    ->editColumn('pic',  function ($user) {
                        return '
                        <button type="button" data-toggle="modal" data-target="#gambar'.$user->id.'" class="btn btn-primary">Lihat Bukti</button>
                        <div id="gambar'.$user->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 id="exampleModalLabel" class="modal-title">Bukti Transfer</h4>
                                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                    <div class="card"><img class="card-img-top w-100 d-block" src="'.url('/').'/'.Storage::url($user->pic).'" />
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                    </div>
                                </div>
                            </div>
                        </div>
                        ';
                    })
                    ->escapeColumns([])
                    ->make(true);
    }
    public function data_verified()
    {
        return view('admin.data_verified');
    }
    public function json_verified()
    {
        $data=p_bukti_tf::with(['user'])->where('v_status','=','Verified')->orderBy('id', 'DESC')->get();
        //dd($data->toArray());
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($user) {
                        return '
                        <a href="'.route('unverifikasi_user',$user->id).'" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-edit"></i> Unverifikasi</a>
                        ';
                    })
                    ->addColumn('nama', function ($user) {
                        return $user->user->name;
                    })
                    ->addColumn('nisn', function ($user) {
                        return $user->user->username;
                    })
                    ->editColumn('pic',  function ($user) {
                        return '
                        <button type="button" data-toggle="modal" data-target="#gambar'.$user->id.'" class="btn btn-primary">Lihat Bukti</button>
                        <div id="gambar'.$user->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 id="exampleModalLabel" class="modal-title">Bukti Transfer</h4>
                                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                    <div class="card"><img class="card-img-top w-100 d-block" src="'.url('/').'/'.Storage::url($user->pic).'" />
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                    </div>
                                </div>
                            </div>
                        </div>
                        ';
                    })
                    ->escapeColumns([])
                    ->make(true);
    }
    
    public function hapus_bukti_tf($id)
    {
    $data=p_bukti_tf::find($id);
    Storage::delete($data->pic);
    $data->delete();
    return redirect()->back()->with('success', 'Berhasil Dihapus');
    }
    public function verifikasi_user($id)
    {
        
        $bukti=p_bukti_tf::find($id);
        $bukti->v_status="Verified";
        $bukti->save();
        $data=User::find($bukti->user_id);
        $data->role_id=2;
        $data->save();
       return redirect()->back()->with('success', 'Berhasil Diverifikasi');
    }
    public function unverifikasi_user($id)
    {
        
        $bukti=p_bukti_tf::find($id);
        $bukti->v_status="Pending";
        $bukti->save();
        $data=User::find($bukti->user_id);
        $data->role_id=3;
        $data->save();
       return redirect()->back()->with('success', 'Berhasil Diunverifikasi');
    }
    public function buku_besar()
    {
        $datas=siswa::all();
        return view('admin.buku_besar_all',compact('datas'));
    }
    //new update
    public function buku_besar_siswa($id)
    {
        $data=siswa::find($id);
        $total_pengetahuan = 0;
        $total_keterampilan = 0;
        $total_sikap = 0;
        $eskul = null;
        $prakerins = null;
        
        $qusp = nilai::with('usp')->has('usp')->where('siswa_id', $id)->get();
        $nilai_ukk = nilai_ukk::leftjoin('mapels', 'mapels.id', '=', 'nilai_ukks.mapel_id')->where('siswa_id',$id)->get();

        // $nilai_ukk = nilai_ukk::with('ukk')->has('ukk')->where('siswa_id', $id)->first();

        foreach ($qusp as $val) {
                $all_usp[] = [
                                'nama_mapel' => $val->usp->mapel->nama_mapel,
                                'nilai' => $val->nilai
                             ];
        }
        $krs = krs::where('siswa_id', $id)->orderBy('tahun','ASC')->orderBy('semester', "ASC")->get();
        $krs_count = count($krs);
        foreach ($krs as $row) {
            $mapel[] = mapel::with('guru')->where('kelas_id', $row->kelas_id)->groupBy('nama_mapel')->orderBy('urut')->get();
            foreach ($row->nilai_pengetahuan as $key) {
                $r_tugas = 0;
                $r_uh = 0;

                $a_tugas = array_filter(array($key->tugas1,$key->tugas2,$key->tugas3,$key->tugas4,$key->tugas5,$key->tugas6));
                $t_tugas = array_sum($a_tugas);
                $j_tugas = count($a_tugas);
                if ($j_tugas) {
                    $r_tugas = $t_tugas/$j_tugas;
                }


                $a_uh = array_filter(array($key->uh1,$key->uh2,$key->uh3,$key->uh4,$key->uh5,$key->uh6));
                $t_uh = array_sum($a_uh);
                $j_uh = count($a_uh);
                if ($j_uh) {
                    $r_uh = $t_uh/$j_uh;
                }
                $total_uas_tugas = round(($r_tugas/2)+($r_uh/2),1); 
                $nilai_pengetahuan[] = [
                                            'id_mapel' => $key->mapel->id,   
                                            'tahun' => $key->mapel->tahun,
                                            'kelas' => $key->kelas->kelas,
                                            'semester' => $row->semester,
                                            'nama_mapel' => $key->mapel->nama_mapel,
                                            'r_tugas' => round($r_tugas,1),
                                            'r_uh' => round($r_uh,1),
                                            'total_uas_tugas' => $total_uas_tugas,
                                            'skor_akhir' => round((((70*$total_uas_tugas)+(15*$key->uts)+(15*$key->uas))/100),1)
                                        ];
                $total_pengetahuan = $total_pengetahuan + round((((70*$total_uas_tugas)+(15*$key->uts)+(15*$key->uas))/100),1);
            
            }
            foreach ($row->nilai_keterampilan as $key) {
                $r_praktik = 0;
                $r_portofolio = 0;
                $r_proyek = 0;



                $a_praktik = array_filter(array($key->praktik1,$key->praktik2,$key->praktik3,$key->praktik4,$key->praktik5,$key->praktik6));
                $t_praktik = array_sum($a_praktik);
                $j_praktik = count($a_praktik);
                if ($j_praktik) {
                    $r_praktik = $t_praktik/$j_praktik;
                }
                
                $a_portofolio = array_filter(array($key->portofolio1,$key->portofolio2,$key->portofolio3,$key->portofolio4,$key->portofolio5,$key->portofolio6));
                $t_portofolio = array_sum($a_portofolio);
                $j_portofolio = count($a_portofolio);
                if ($j_portofolio) {
                    $r_portofolio = $t_portofolio/$j_portofolio;
                }

                $a_proyek = array_filter(array($key->proyek1,$key->proyek2,$key->proyek3,$key->proyek4,$key->proyek5,$key->proyek6));
                $t_proyek = array_sum($a_proyek);
                $j_proyek = count($a_proyek);
                if ($j_proyek) {
                    $r_proyek = $t_proyek/$j_proyek;
                }
                
                $nilai_keterampilan[] = [
                                            'id_mapel' => $key->mapel->id,   
                                            'tahun' => $key->mapel->tahun,
                                            'kelas' => $key->kelas->kelas,
                                            'semester' => $row->semester,
                                            'nama_mapel' => $key->mapel->nama_mapel,
                                            'r_praktik' => $r_praktik,
                                            'r_portofolio' => $r_portofolio,
                                            'r_proyek' => $r_proyek,
                                            'skor_akhir' => round(((($r_praktik)+($r_portofolio)+($r_proyek))/3),1)
                                        ];
                $total_keterampilan = $total_keterampilan + round(((($r_praktik)+($r_portofolio)+($r_proyek))/3),1);
            }   
            foreach ($row->nilai_sikap as $key) {
                $nilai_sikap[] = [
                                            'id_mapel' => $key->mapel->id,   
                                            'tahun' => $key->mapel->tahun,
                                            'kelas' => $key->kelas->kelas,
                                            'semester' => $row->semester,
                                            'nama_mapel' => $key->mapel->nama_mapel,
                                            'nilai' => $key->sikap,
                                        ];
                $total_sikap = $total_sikap + $key->sikap;
            }    
            foreach ($row->eskul as $key) {
                $eskul[] = [
                                            'tahun' => $key->tahun,
                                            'nilai' => $key->nilai,
                                            'kegiatan' => $key->kegiatan,
                                            'ket' => $key->ket,
                                        ];
            }
            foreach ($row->prakerin as $key) {
                $prakerins[] = [
                                            'tahun' => $key->tahun,
                                            'nilai' => $key->nilai,
                                            'mitra' => $key->mitra,
                                            'lokasi' => $key->lokasi,
                                            'lama' => $key->lama,
                                            'ket' => $key->ket,
                                        ];
            }
            foreach ($nilai_ukk as $key) {
                $all_ukk[] = [
                                'nama_mapel' => $key->nama_mapel,
                                'tahun'      => $key->tahun,
                                'kategori'   => $key->kategori,
                                'tahun'      => $key->tahun,
                                'nilai'      => $key->nilai,
                             ]; 
            }
            
            if (!isset($eskul)) {
                $eskul = null;
            }
            if (!isset($nilai_keterampilan)) {
                $nilai_keterampilan = null;
            }
            if (!isset($nilai_pengetahuan)) {
                $nilai_pengetahuan = null;
            }
            if (!isset($nilai_sikap)) {
                $nilai_sikap = null;
            }
            
        }
        //get_mapel
        if(isset($mapel)){
            foreach ($mapel as $row) {
                foreach ($row as $value) {
                    $mapels[] = [
                        'urut' => $value['urut'],
                        'nama_mapel' => $value['nama_mapel'],
                        'kategori' => $value['kategori'],
                        'ket' => $value['ket'],
                    ];
                }
            }
            $col_mapel = collect($mapels);
            $filtered_mapel = $col_mapel->groupBy('nama_mapel');
            foreach ($filtered_mapel as $key) {
                $filtered_mapels[] = $key->last();
            }
        }
        if (isset($data)) {
            $compact[] = 'data'; 
        }
        if (isset($filtered_mapels)) {
            $compact[] = 'filtered_mapels'; 
        }
        if (isset($krs)) {
            $compact[] = 'krs'; 
        }
        if (isset($nilai_pengetahuan)) {
            $compact[] = 'nilai_pengetahuan'; 
        }
        if (isset($nilai_keterampilan)) {
            $compact[] = 'nilai_keterampilan'; 
        }
        if (isset($nilai_sikap)) {
            $compact[] = 'nilai_sikap'; 
        }
        if (isset($all_usp)) {
            $compact[] = 'all_usp'; 
        }
        if (isset($all_ukk)) {
            $compact[] = 'all_ukk'; 
        }
        if (isset($krs_count)) {
            $compact[] = 'krs_count'; 
        }
        if (isset($eskul)) {
            $compact[] = 'eskul'; 
        }
        if (isset($prakerins)) {
            $compact[] = 'prakerins'; 
        }

        return view('admin.buku_besar',compact($compact));

    }
    public function buku_besar_tahunan(Request $request)
    {
        $id = $request->get('tahun');
        $data=siswa::where('tahun','=',$id)->get();
        //dd($data->toArray());
        return view('admin.buku_besar',compact('data'));
    }
    public function form_update_siswa($id)
    {
        $data=siswa::find($id);
        // dd($data);
        return view('admin.update_data_siswa',compact('data'));
    }
    public function update_data_diri(Request $request, $id)
    {
        $data=siswa::find($id);
            $data->nama_lengkap = $request->get('nama_lengkap');  
            $data->jk = $request->get('jk'); 
            $data->nomor_kk = $request->get('nomor_kk'); 
            $data->nik = $request->get('nik'); 
            $data->nomor_akte = $request->get('nomor_akte');
            $data->tempat_lahir = $request->get('tempat_lahir'); 
            $data->tanggal_lahir = $request->get('tanggal_lahir'); 
            $data->alamat = $request->get('alamat');
            $data->desa = $request->get('desa');
            $data->kecamatan = $request->get('kecamatan'); 
            $data->kabupaten = $request->get('kabupaten');
            $data->provinsi = $request->get('provinsi');
            $data->kode_pos = $request->get('kode_pos');
            $data->no_hp = $request->get('no_hp');
            $data->bahasa = $request->get('bahasa');
            $data->save();
            return redirect()->back()->with('success', 'Berhasil update data diri');
        
    }
    public function update_data_lulusan(Request $request, $id)
    {
        $data=siswa::find($id);
        if ($request->hasFile('pic_lulus')) {
            $request->validate([
                'pic_lulus' => ['image','mimes:jpeg,png,jpg,gif,svg']
            ]);
            if ($request->hasFile('skl')) {
                $request->validate([
                    'skl' => ['file','mimes:pdf']
                ]);
                $skl = $request->file('skl');
                $path_skl = $skl->store('public/profile');
                Storage::delete($data->skl);
                $data->skl=$path_skl;
            }
            $foto = $request->file('pic_lulus');
            $path = $foto->store('public/profile');
            Storage::delete($data->pic_lulus);
            $data->pic_lulus=$path;
            $data->no_ijazah = $request->get('no_ijazah');  
            $data->tanggal_lulusan_ijazah = $request->get('tanggal_lulusan_ijazah'); 
            $data->mutasi = $request->get('mutasi'); 
            $data->keterangan_mutasi = $request->get('keterangan_mutasi'); 
            $data->save();
            return redirect()->back()->with('success', 'Berhasil update foto data lulusan');
        } else {
            if ($request->hasFile('skl')) {
                $skl = $request->file('skl');
                $path_skl = $skl->store('public/profile');
                Storage::delete($data->skl);
                $data->skl=$path_skl;
            }
            $data->no_ijazah = $request->get('no_ijazah');  
            $data->tanggal_lulusan_ijazah = $request->get('tanggal_lulusan_ijazah'); 
            $data->mutasi = $request->get('mutasi'); 
            $data->keterangan_mutasi = $request->get('keterangan_mutasi'); 
            $data->save();
            return redirect()->back()->with('success', 'Berhasil update data lulusan');
        }
        return redirect()->back()->with('success', 'Maaf Foto salah');
        
    }
    public function update_foto(Request $request, $id)
    {
        $data=siswa::find($id);
        if ($request->hasFile('pic')) {
            $request->validate([
                'pic' => ['image','mimes:jpeg,png,jpg,gif,svg']
              ]);
            $foto = $request->file('pic');
            $path = $foto->store('public/profile');
            Storage::delete($data->pic);
            $data->pic=$path;
            $data->lingkar_kepala = $request->get('lingkar_kepala');
            $data->cita_cita = $request->get('cita_cita');
            $data->golongan_darah = $request->get('golongan_darah');
            $data->keterangan_tempat_tinggal = $request->get('keterangan_tempat_tinggal');
            $data->tinggi_badan = $request->get('tinggi_badan');
            $data->berat_badan = $request->get('berat_badan');
            $data->anak_ke = $request->get('anak_ke');
            $data->saudara_kandung = $request->get('saudara_kandung');
            $data->saudara_tiri = $request->get('saudara_tiri');
            $data->hobi = $request->get('hobi');
            $data->riwayat_sakit = $request->get('riwayat_sakit');
            $data->buta_warna = $request->get('buta_warna');
            $data->kelainan_fisik = $request->get('kelainan_fisik');
            $data->save();
            return redirect()->back()->with('success', 'Berhasil ganti foto');
        }else{
            $data->lingkar_kepala = $request->get('lingkar_kepala');
            $data->cita_cita = $request->get('cita_cita');
            $data->golongan_darah = $request->get('golongan_darah');
            $data->keterangan_tempat_tinggal = $request->get('keterangan_tempat_tinggal');
            $data->tinggi_badan = $request->get('tinggi_badan');
            $data->berat_badan = $request->get('berat_badan');
            $data->anak_ke = $request->get('anak_ke');
            $data->saudara_kandung = $request->get('saudara_kandung');
            $data->saudara_tiri = $request->get('saudara_tiri');
            $data->hobi = $request->get('hobi');
            $data->riwayat_sakit = $request->get('riwayat_sakit');
            $data->buta_warna = $request->get('buta_warna');
            $data->kelainan_fisik = $request->get('kelainan_fisik');
            $data->save();
            return redirect()->back()->with('success', 'Berhasil simpan data');
        }
        return redirect()->back()->with('success', 'Maaf Foto salah');
    }
    public function update_sekolah_asal(Request $request, $id)
    {
        $data=siswa::find($id);
            $data->nisn = $request->get('nisn'); 
            $data->sekolah_asal = $request->get('sekolah_asal');
             $data->npsn = $request->get('npsn');
             $data->alamat_sekolah = $request->get('alamat_sekolah'); 
             $data->desa_sekolah = $request->get('desa_sekolah');
             $data->kecamatan_sekolah = $request->get('kecamatan_sekolah'); 
             $data->kabupaten_sekolah = $request->get('kabupaten_sekolah');
             $data->provinsi_sekolah = $request->get('provinsi_sekolah');
             $data->kode_pos_sekolah = $request->get('kode_pos_sekolah');
             $data->lama_sekolah = $request->get('lama_sekolah');
             $data->npun = $request->get('npun');
             $data->ijazah_sd = $request->get('ijazah_sd');
             $data->skhun_sd = $request->get('skhun_sd');
             $data->orang_tua_sd = $request->get('orang_tua_smp');
             $data->ijazah_smp = $request->get('ijazah_smp');
             $data->skhun_smp = $request->get('skhun_smp');
             $data->orang_tua_smp = $request->get('orang_tua_smp');
             $data->save();
             
            $user=User::find($data->user_id);
            $user->username = $request->get('nisn');
            $user->save();

            return redirect()->back()->with('success', 'Berhasil update sekolah asal');

    }
    public function update_ayah(Request $request, $id)
    {
        $data=siswa::find($id);
              $data->nama_ayah = $request->get('nama_ayah');
              $data->nik_ayah = $request->get('nik_ayah');
              $data->nomor_ayah = $request->get('nomor_ayah');
              $data->tempat_lahir_ayah = $request->get('tempat_lahir_ayah');
              $data->tanggal_lahir_ayah = $request->get('tanggal_lahir_ayah'); 
              $data->pekerjaan_ayah = $request->get('pekerjaan_ayah');
              $data->pendidikan_ayah = $request->get('pendidikan_ayah');
              $data->penghasilan_ayah = $request->get('penghasilan_ayah');
              $data->save();
              return redirect()->back()->with('success', 'Berhasil update data ayah');
    }
    
    public function update_ibu(Request $request, $id)
    {
        $data=siswa::find($id);
              $data->nama_ibu = $request->get('nama_ibu');
              $data->nik_ibu = $request->get('nik_ibu');
              $data->nomor_ibu = $request->get('nomor_ibu');
              $data->tempat_lahir_ibu = $request->get('tempat_lahir_ibu');
              $data->tanggal_lahir_ibu = $request->get('tanggal_lahir_ibu'); 
              $data->pekerjaan_ibu = $request->get('pekerjaan_ibu');
              $data->pendidikan_ibu = $request->get('pendidikan_ibu');
              $data->penghasilan_ibu = $request->get('penghasilan_ibu');
              $data->save();
            return redirect()->back()->with('success', 'Berhasil update data ibu');
    }
    
    public function update_wali(Request $request, $id)
    {
        $data=siswa::find($id);
              $data->nama_wali = $request->get('nama_wali');
              $data->nik_wali = $request->get('nik_wali');
              $data->nomor_wali = $request->get('nomor_wali');
              $data->tempat_lahir_wali = $request->get('tempat_lahir_wali');
              $data->tanggal_lahir_wali = $request->get('tanggal_lahir_wali'); 
              $data->pekerjaan_wali = $request->get('pekerjaan_wali');
              $data->pendidikan_wali = $request->get('pendidikan_wali');
              $data->penghasilan_wali = $request->get('penghasilan_wali');
              $data->save();
            return redirect()->back()->with('success', 'Berhasil update data wali');
    }
   
    public function update_surat(Request $request, $id)
    {
        $data=siswa::find($id);
             $data->nomor_kip = $request->get('nomor_kip');
             $data->nomor_pkh = $request->get('nomor_pkh');
             $data->nomor_sk = $request->get('nomor_sk');
             $data->save();
            return redirect()->back()->with('success', 'Berhasil update data surat');
    }
   
    public function update_pilihan_jurusan(Request $request, $id)
    {
        $data=siswa::find($id); 
        $data->nis = $request->get('nis');
        $data->pilihan_jurusan = $request->get('pilihan_jurusan');
        $data->ukuran_baju = $request->get('ukuran_baju');
        $data->tahun = $request->get('tahun');
        $data->save();
        return redirect()->back()->with('success', 'Berhasil pilih jurusan');
    }
    public function update_password(Request $request, $id)
    {
        $siswa=siswa::find($id);
        $data=User::find($siswa->user_id);
             $data->password = $request->get('password');
             $data->status = $request->get('password');
             $data->save();
            return redirect()->back()->with('success', 'Berhasil ganti password');
    }
    public function ganti_password(Request $request, $id)
    {
        $id=Auth::User()->id;
        $data=User::find($id);
             $data->password = $request->get('password');
             $data->status = $request->get('password');
             $data->save();
            return redirect()->back()->with('success', 'Berhasil ganti password');
    }
    
    public function cetak_nilai_pengetahuan($id)
    {
        $mapel_id=$id;
        $data=nilai_pengetahuan::with(['siswa','mapel'=>function($query){
            $query->with(['kd_mapel']);
        }])->where('mapel_id','=',$mapel_id)->get();
        $mapel=mapel::find($mapel_id);
        $kd_mapel=kd_mapel::where('mapel_id','=',$mapel_id)->where('kriteria','=','PENGETAHUAN')->GET();
        $kelas=kelas::find($mapel->kelas_id);
        //dd($data->toArray());
            //$data=siswa::with(['krs'])->get();
        return view('admin.siakad.cetak_nilai_pengetahuan',compact('data','mapel','kelas','kd_mapel'));
    }
    public function cetak_nilai_keterampilan($id)
    {
        $mapel_id=$id;
        $data=nilai_keterampilan::with(['siswa','mapel'=>function($query){
            $query->with(['kd_mapel']);
        }])->where('mapel_id','=',$mapel_id)->get();
        $mapel=mapel::find($mapel_id);
        $kd_mapel=kd_mapel::where('mapel_id','=',$mapel_id)->where('kriteria','=','KETERAMPILAN')->GET();
        $kelas=kelas::find($mapel->kelas_id);
        //dd($data->toArray());
            //$data=siswa::with(['krs'])->get();
        return view('admin.siakad.cetak_nilai_keterampilan',compact('data','mapel','kelas','kd_mapel'));
    }
    public function cetak_nilai_sikap($id)
    {
        $mapel_id=$id;
        $data=nilai_sikap::with(['siswa','mapel'=>function($query){
            $query->with(['kd_mapel']);
        }])->where('mapel_id','=',$mapel_id)->get();
        $mapel=mapel::find($mapel_id);
        $kelas=kelas::find($mapel->kelas_id);
        //dd($data->toArray());
            //$data=siswa::with(['krs'])->get();
        return view('admin.siakad.cetak_nilai_sikap',compact('data','mapel','kelas'));
    }
    public function data_prakerin($id)
    {
        $krs_id=$id;
        return view('admin.siakad.data_siswa_prakerin',compact('krs_id'));
    }
    public function json_prakerin($id)
    {
        $data=prakerin::with(['krs'])
                    ->where('krs_id','=',$id)
                    ->orderBy('id', 'DESC')
                    ->get();
        //dd($data->toArray());
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($user) {
                        return '
                        <button type="button" data-toggle="modal" data-target="#data'.$user->id.'" class="btn btn-primary">Update</button>
                        <!-- Modal-->
                        <div id="data'.$user->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 id="exampleModalLabel" class="modal-title">Perbaharui Data</h4>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <form action="'.route('update_prakerin',$user->id).'" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                <div class="form-group">
                                    <label>Tahun *</label>
                                    <input type="number" name="tahun" value="'.$user->tahun.'" class="form-control" required placeholder="Tahun..">
                                  </div>
                                  <div class="form-group">
                                    <label>Nilai *</label>
                                    <input type="number" name="nilai" value="'.$user->nilai.'" class="form-control" required placeholder="Nilai Prakerin">
                                  </div>
                                  <div class="form-group">
                                    <label>Mitra *</label>
                                    <input type="text" name="mitra" value="'.$user->mitra.'" class="form-control" required placeholder="Mitra Prakerin">
                                  </div>
                                  <div class="form-group">
                                    <label>Lokasi Prakerin *</label>
                                    <input type="text" name="lokasi" value="'.$user->lokasi.'" class="form-control" required placeholder="Lokai Prakerin">
                                  </div>
                                  <div class="form-group">
                                    <label>Lama Prakerin (Bulan) *</label>
                                    <input type="text" name="lama" value="'.$user->lama.'" class="form-control" required placeholder="Lama Prakerin">
                                  </div>
                                  <div class="form-group">
                                    <label>Keterangan *</label>
                                    <input type="text" name="ket" value="'.$user->ket.'" class="form-control" required placeholder="Jika tidak ada isi dengan strip">
                                  </div>
                                  <div class="form-group">       
                                    <input type="submit" value="Update" class="btn btn-primary">
                                  </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                </div>
                                </div>
                            </div>
                            </div>
                            <!-- end of modal -->
                            <button onclick="confirmDelete('.$user->id.')" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</button>
                            ';
                            // <a href="'.route('hapus_prakerin',$user->id).'" data-id="'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                    })
                    ->make(true);
    }
    public function input_prakerin(Request $request)
    {
        $request->validate([
            'krs_id'=>['required'],
            'tahun'=>['required'],
            'nilai'=>['required'],
            'mitra'=>['required'],
            'lokasi'=>['required'],
            'lama'=>['required'],
            'ket'=>['required'],
          ]);

         prakerin::create([ 
            'krs_id'=>$request->get('krs_id'),
            'tahun'=>$request->get('tahun'),
            'nilai'=>$request->get('nilai'),
            'mitra'=>$request->get('mitra'),
            'lokasi'=>$request->get('lokasi'),
            'lama'=>$request->get('lama'),
            'ket'=>$request->get('ket'),
        ]);
        return redirect()->back()->with('success', 'Berhasil ditambah');

    }
    public function update_prakerin(Request $request, $id)
    {
        $request->validate([
            'tahun'=>['required'],
            'nilai'=>['required'],
            'mitra'=>['required'],
            'lokasi'=>['required'],
            'lama'=>['required'],
            'ket'=>['required'],
          ]);

        $data=prakerin::find($id);
        $data->tahun=$request->get('tahun');
        $data->nilai=$request->get('nilai');
        $data->mitra=$request->get('mitra');
        $data->lokasi=$request->get('lokasi');
        $data->lama=$request->get('lama');
        $data->ket=$request->get('ket');
        $data->save();
        return redirect()->back()->with('success', 'Berhasil diperbaharui');
    }
    public function hapus_prakerin($id)
    {
        $data=prakerin::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Berhasil dihapus');
    }
    public function data_eskul($id)
    {
        $krs_id=$id;
        return view('admin.siakad.data_siswa_eskul',compact('krs_id'));
    }
    public function json_eskul($id)
    {
        $data=eskul::with(['krs'])
                    ->where('krs_id','=',$id)
                    ->orderBy('id', 'DESC')
                    ->get();
        //dd($data->toArray());
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($user) {
                        return '
                        <button type="button" data-toggle="modal" data-target="#data'.$user->id.'" class="btn btn-primary">Update</button>
                        <!-- Modal-->
                        <div id="data'.$user->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 id="exampleModalLabel" class="modal-title">Perbaharui Data</h4>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <form action="'.route('update_eskul',$user->id).'" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                        <div class="form-group">
                                            <label>Tahun *</label>
                                            <input type="number" name="tahun" value="'.$user->tahun.'" class="form-control" required placeholder="Tahun..">
                                        </div>
                                        <div class="form-group">
                                            <label>Nilai *</label>
                                            <input type="number" name="nilai" value="'.$user->nilai.'" class="form-control" required placeholder="Nilai..">
                                        </div>
                                        <div class="form-group">
                                            <label>Ektrakurikuler *</label>
                                            <input type="text" name="kegiatan" value="'.$user->kegiatan.'" class="form-control" required placeholder="eskul untuk siswa">
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan *</label>
                                            <input type="text" name="ket" value="'.$user->ket.'" class="form-control" required placeholder="Jika tidak ada isi dengan strip">
                                        </div>
                                    <div class="form-group">       
                                    <input type="submit" value="Update" class="btn btn-primary">
                                  </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                </div>
                                </div>
                            </div>
                            </div>
                            <!-- end of modal -->
                            <button onclick="confirmDelete('.$user->id.')" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</button>
                            ';
                            // <a href="'.route('hapus_eskul',$user->id).'" data-id="'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                    })
                    ->make(true);
    }
    public function input_eskul(Request $request)
    {
        # code...
        $request->validate([
            'krs_id'=>['required'],
            'tahun'=>['required'],
            'nilai'=>['required'],
            'kegiatan'=>['required'],
            'ket'=>['required'],
          ]);

         eskul::create([ 
            'krs_id'=>$request->get('krs_id'),
            'tahun'=>$request->get('tahun'),
            'nilai'=>$request->get('nilai'),
            'kegiatan'=>$request->get('kegiatan'),
            'ket'=>$request->get('ket'),
        ]);
        return redirect()->back()->with('success', 'Berhasil ditambah');

    }
    public function update_eskul(Request $request, $id)
    {
        # code...
        $request->validate([
            'tahun'=>['required'],
            'nilai'=>['required'],
            'kegiatan'=>['required'],
            'ket'=>['required'],
          ]);

        $data=eskul::find($id);
        $data->tahun=$request->get('tahun');
        $data->nilai=$request->get('nilai');
        $data->kegiatan=$request->get('kegiatan');
        $data->ket=$request->get('ket');
        $data->save();
        return redirect()->back()->with('success', 'Berhasil diperbaharui');
    }
    public function hapus_eskul($id)
    {
        # code...
        $data=eskul::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Berhasil dihapus');
    }
    public function data_prestasi($id)
    {
        # code...
        $krs_id=$id;
        return view('admin.siakad.data_siswa_prestasi',compact('krs_id'));
    }
    public function json_prestasi($id)
    {
        # code...
        $data=prestasi::with(['krs'])
                    ->where('krs_id','=',$id)
                    ->orderBy('id', 'DESC')
                    ->get();
        //dd($data->toArray());
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($user) {
                    return '
                    <button type="button" data-toggle="modal" data-target="#data'.$user->id.'" class="btn btn-primary">Update</button>
                    <!-- Modal-->
                    <div id="data'.$user->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h4 id="exampleModalLabel" class="modal-title">Perbaharui Data</h4>
                                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                                <div class="modal-body">
                                    <form action="'.route('update_prestasi',$user->id).'" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                <div class="form-group">
                                    <label>Tahun *</label>
                                    <input type="number" name="tahun" value="'.$user->tahun.'" class="form-control" required placeholder="Tahun..">
                                </div>
                                <div class="form-group">
                                    <label>Presatsi *</label>
                                    <input type="text" name="jenis_prestasi" value="'.$user->jenis_prestasi.'" class="form-control" required placeholder="Prestasi siswa">
                                </div>
                                <div class="form-group">
                                    <label>Keterangan *</label>
                                    <input type="text" name="ket" value="'.$user->ket.'" class="form-control" required placeholder="Jika tidak ada isi dengan strip">
                                </div>
                                <div class="form-group">       
                                    <input type="submit" value="Update" class="btn btn-primary">
                                  </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                            </div>
                            </div>
                        </div>
                        </div>
                        <!-- end of modal -->
                        <button onclick="confirmDelete('.$user->id.')" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</button>
                        ';
                        // <a href="'.route('hapus_prestasi',$user->id).'" data-id="'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                })
                ->make(true);
    }
    public function input_prestasi(Request $request)
    {
        $request->validate([
            'krs_id'=>['required'],
            'tahun'=>['required'],
            'jenis_prestasi'=>['required'],
            'ket'=>['required'],
          ]);

         prestasi::create([ 
            'krs_id'=>$request->get('krs_id'),
            'tahun'=>$request->get('tahun'),
            'jenis_prestasi'=>$request->get('jenis_prestasi'),
            'ket'=>$request->get('ket'),
        ]);
        return redirect()->back()->with('success', 'Berhasil ditambah');

    }
    public function update_prestasi(Request $request, $id)
    {
        # code...
        $request->validate([
            'tahun'=>['required'],
            'jenis_prestasi'=>['required'],
            'ket'=>['required'],
          ]);
        $data=prestasi::find($id);
        $data->tahun=$request->get('tahun');
        $data->jenis_prestasi=$request->get('jenis_prestasi');
        $data->ket=$request->get('ket');
        $data->save();
        return redirect()->back()->with('success', 'Berhasil diperbaharui');
    }
    public function hapus_prestasi($id)
    {
        # code...
        $data=prestasi::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Berhasil dihapus');
    }
    public function data_absen($id)
    {
        # code...
        $krs_id=$id;
        return view('admin.siakad.data_siswa_absen',compact('krs_id'));
    }
    public function json_absen($id)
    {
        # code...
        $data=absen::with(['krs'])
                    ->where('krs_id','=',$id)
                    ->orderBy('id', 'DESC')
                    ->get();
        //dd($data->toArray());
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($user) {
                    return '
                    <button type="button" data-toggle="modal" data-target="#data'.$user->id.'" class="btn btn-primary">Update</button>
                    <!-- Modal-->
                    <div id="data'.$user->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h4 id="exampleModalLabel" class="modal-title">Perbaharui Data</h4>
                                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="'.route('update_absen',$user->id).'" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="'.csrf_token().'">
                                <div class="form-group">
                                    <label>Tahun *</label>
                                    <input type="number" name="tahun" value="'.$user->tahun.'" class="form-control" required placeholder="Tahun..">
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Sakit *</label>
                                    <input type="number" name="sakit" value="'.$user->sakit.'" class="form-control" required placeholder="Jumlah Sakit..">
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Izin *</label>
                                    <input type="number" name="izin" value="'.$user->izin.'" class="form-control" required placeholder="Jumlah Izin..">
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Alpha *</label>
                                    <input type="number" name="alpha" value="'.$user->alpha.'" class="form-control" required placeholder="Jumlah Alpha..">
                                </div>
                                <div class="form-group">       
                                <input type="submit" value="Update" class="btn btn-primary">
                              </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                            </div>
                            </div>
                        </div>
                        </div>
                        <!-- end of modal -->
                        <button onclick="confirmDelete('.$user->id.')" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</button>
                        ';
                        // <a href="'.route('hapus_absen',$user->id).'" data-id="'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                })
                ->make(true);
    }
    public function input_absen(Request $request)
    {
        # code...
        $request->validate([
            'krs_id'=>['required'],
            'tahun'=>['required'],
            'sakit'=>['required'],
            'izin'=>['required'],
            'alpha'=>['required'],
          ]);

         absen::create([ 
            'krs_id'=>$request->get('krs_id'),
            'tahun'=>$request->get('tahun'),
            'sakit'=>$request->get('sakit'),
            'izin'=>$request->get('izin'),
            'alpha'=>$request->get('alpha'),
        ]);
        return redirect()->back()->with('success', 'Berhasil ditambah');

    }
    public function update_absen(Request $request,$id)
    {
        # code...
         $request->validate([
            'tahun'=>['required'],
            'sakit'=>['required'],
            'izin'=>['required'],
            'alpha'=>['required'],
          ]);
        $data=absen::find($id);
        $data->tahun=$request->get('tahun');
        $data->sakit=$request->get('sakit');
        $data->izin=$request->get('izin');
        $data->alpha=$request->get('alpha');
        $data->save();
        return redirect()->back()->with('success', 'Berhasil diperbaharui');
    }
    public function hapus_absen($id)
    {
        # code...
        $data=absen::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Berhasil dihapus');
    }
    public function data_catatan($id)
    {
        # code...
        $krs_id=$id;
        return view('admin.siakad.data_siswa_catatan',compact('krs_id'));
    }
    public function json_catatan($id)
    {
        # code...
        $data=catatan::with(['krs'])
                    ->where('krs_id','=',$id)
                    ->orderBy('id', 'DESC')
                    ->get();
        //dd($data->toArray());
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($user) {
                    return '
                    <button type="button" data-toggle="modal" data-target="#data'.$user->id.'" class="btn btn-primary">Update</button>
                    <!-- Modal-->
                    <div id="data'.$user->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h4 id="exampleModalLabel" class="modal-title">Perbaharui Data</h4>
                                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="'.route('update_catatan',$user->id).'" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="'.csrf_token().'">
                                <div class="form-group">
                                    <label>Tahun *</label>
                                    <input type="number" name="tahun" value="'.$user->tahun.'" class="form-control" required placeholder="Tahun..">
                                </div>
                                <div class="form-group">
                                    <label>Catatan *</label>
                                    <input type="text" name="catatan" value="'.$user->catatan.'" class="form-control" required placeholder="Catatan untuk siswa">
                                </div>
                                <div class="form-group">
                                    <label>Keterangan *</label>
                                    <input type="text" name="ket" value="'.$user->ket.'" class="form-control" required placeholder="Jika tidak ada isi dengan strip">
                                </div>
                                <div class="form-group">       
                                <input type="submit" value="Update" class="btn btn-primary">
                              </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                            </div>
                            </div>
                        </div>
                        </div>
                        <!-- end of modal -->
                        <button onclick="confirmDelete('.$user->id.')" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</button>
                        ';
                        // <a href="'.route('hapus_catatan',$user->id).'" data-id="'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                })
                ->make(true);
    }
    public function input_catatan(Request $request)
    {
        # code...
        $request->validate([
            'krs_id'=>['required'],
            'tahun'=>['required'],
            'catatan'=>['required'],
            'ket'=>['required'],
          ]);

         catatan::create([ 
            'krs_id'=>$request->get('krs_id'),
            'tahun'=>$request->get('tahun'),
            'catatan'=>$request->get('catatan'),
            'ket'=>$request->get('ket'),
        ]);
        return redirect()->back()->with('success', 'Berhasil ditambah');

    }
    public function update_catatan(Request $request, $id)
    {
        # code...
        $request->validate([
            'tahun'=>['required'],
            'catatan'=>['required'],
            'ket'=>['required'],
          ]);

        $data=catatan::find($id);
        $data->tahun=$request->get('tahun');
        $data->catatan=$request->get('catatan');
        $data->ket=$request->get('ket');
        $data->save();
        return redirect()->back()->with('success', 'Berhasil dihapus');
    }
    public function hapus_catatan($id)
    {
        # code...
        $data=catatan::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Berhasil dihapus');
    }
    public function cetak_sampul($id)
    {
        # code...
        $krs_id=$id;
        $krs=krs::find($krs_id);
        $siswa_id=$krs->siswa_id;
        $kelas_id=$krs->kelas_id;
        $data=siswa::find($siswa_id);
        return view('admin.siakad.cetak_sampul',compact('data'));
    }
    public function cetak_sampul_all($id)
    {
        $kelas_id=$id;
        $data=krs::with(['siswa'])->where('kelas_id','=',$kelas_id)->get();
        //dd($krs->toArray());
        return view('admin.siakad.cetak_sampul_all',compact('data'));
    }
    public function cetak_data_sekolah($id)
    {
        return view('admin.siakad.cetak_data_sekolah');
    }
    public function cetak_data_sekolah_all($id)
    {
        $kelas_id=$id;
        $data=krs::where('kelas_id','=',$kelas_id)->get();
        //dd($data->toArray());
        return view('admin.siakad.cetak_data_sekolah_all',compact('data'));
    }
    public function cetak_petunjuk($id)
    {
        return view('admin.siakad.cetak_petunjuk');
    }
    public function cetak_petunjuk_all($id)
    {
        $kelas_id=$id;
        $data=krs::where('kelas_id','=',$kelas_id)->get();
        return view('admin.siakad.cetak_petunjuk_all',compact('data'));
    }
    public function cetak_data_diri($id)
    {
        # code...
        $krs_id=$id;
        $krs=krs::find($krs_id);
        $siswa_id=$krs->siswa_id;
        $kelas_id=$krs->kelas_id;
        $data=siswa::find($siswa_id);
        return view('admin.siakad.cetak_data_diri',compact('data'));
    }
    public function cetak_data_diri_all($id)
    {
        # code...
        $kelas_id=$id;
        $data=krs::with(['siswa'])->where('kelas_id','=',$kelas_id)->get();
        return view('admin.siakad.cetak_data_diri_all',compact('data'));
    }
    public function cetak_raport($id)
    {
        $krs_id=$id;
        $krs=krs::find($krs_id);
        $siswa_id=$krs->siswa_id;
        $kelas_id=$krs->kelas_id;
        $semester=$krs->semester;
        $data=krs::with(['siswa','kelas'=>function($query) use ($siswa_id,$semester){
                $query->with(['jurusan','mapel'=>function($query) use ($siswa_id,$semester){
                    $query->with(['nilai_pengetahuan'=>function($query) use ($siswa_id){
                        $query->where('siswa_id','=',$siswa_id)->get();
                    },'nilai_keterampilan'=>function($query) use ($siswa_id){
                        $query->where('siswa_id','=',$siswa_id)->get();
                    },'nilai_sikap'=>function($query) use ($siswa_id){
                        $query->where('siswa_id','=',$siswa_id)->get();
                    }])->orderBy('urut', 'ASC')->get();
                    $query->with(['kd_mapel'])->where('semester','=',$semester)->get();
                }])->get();
            }])->where('id','=',$krs_id)->get();
    //    dd($data);
        return view('admin.siakad.cetak_raport',compact('data'));
    }
    public function cetak_raport_all($id, $semester)
    {
        $date=date('Y-m-d');
        $kelas=$id;
        $siswa_all = krs::where('kelas_id', $kelas)->where('semester', $semester)->get();
        foreach ($siswa_all as $siswa) {
            $siswa_id = $siswa->siswa_id;
            $datas=krs::with(['siswa','kelas'=>function($query) use ($siswa_id,$semester){
                $query->with(['jurusan','mapel'=>function($query) use ($siswa_id,$semester){
                    $query->with(['nilai_pengetahuan'=>function($query) use ($siswa_id){
                        $query->where('siswa_id','=',$siswa_id)->get();
                    },'nilai_keterampilan'=>function($query) use ($siswa_id){
                        $query->where('siswa_id','=',$siswa_id)->get();
                    },'nilai_sikap'=>function($query) use ($siswa_id){
                        $query->where('siswa_id','=',$siswa_id)->get();
                    }])->get();
                    $query->with(['kd_mapel'])->where('semester','=',$semester)->get();
                }])->get();
            }])->where('id','=',$siswa->id)->first();
            $data[] = $datas;
            // dd($datas->kelas->mapel->toArray());
        }
        // dd($datas);
        return view('admin.siakad.cetak_raport_all',compact('data','date'));
    }
    public function cetak_deskripsi($id)
    {
        $date=date('Y-m-d');
        # code...
        $krs_id=$id;
        $krs=krs::find($krs_id);
        $semester=$krs->semester;
        //dd($semester);
        $siswa_id=$krs->siswa_id;
        $kelas_id=$krs->kelas_id;
        $siswa=siswa::find($siswa_id);
        $data=krs::with(['prakerin','eskul','prestasi','absen','catatan','kelas'=>function($query){
            $query->with(['guru'])->get();
        }])->where('id','=',$krs_id)->get();
        $absen=krs::with(['nilai_sikap'])->where('id','=',$krs_id)->get();
        // dd($absen->toArray());
        $data1=krs::with(['siswa','kelas'=>function($query) use ($siswa_id,$semester){
                $query->with(['jurusan','mapel'=>function($query) use ($siswa_id,$semester){
                    $query->with(['nilai_pengetahuan'=>function($query) use ($siswa_id){
                        $query->where('siswa_id','=',$siswa_id)->get();
                    },'nilai_keterampilan'=>function($query) use ($siswa_id){
                        $query->where('siswa_id','=',$siswa_id)->get();
                    },'nilai_sikap'=>function($query) use ($siswa_id){
                        $query->where('siswa_id','=',$siswa_id)->get();
                    }])->get();
                    $query->with(['kd_mapel'])->where('semester','=',$semester)->get();
                }])->get();
            }])->where('id','=',$krs_id)->get();
        //dd($data->toArray());
        return view('admin.siakad.cetak_deskripsi',compact('data1','data','siswa','semester','absen','date'));
    }
    public function cetak_deskripsi_date($id,$date)
    {
        # code...
        $krs_id=$id;
        $krs=krs::find($krs_id);
        $semester=$krs->semester;
        //dd($semester);
        $siswa_id=$krs->siswa_id;
        $kelas_id=$krs->kelas_id;
        $siswa=siswa::find($siswa_id);
        $data=krs::with(['prakerin','eskul','prestasi','absen','catatan','kelas'=>function($query){
            $query->with(['guru'])->get();
        }])->where('id','=',$krs_id)->get();
        $absen=krs::with(['nilai_sikap'])->where('id','=',$krs_id)->get();
        // dd($absen->toArray());
        $data1=krs::with(['siswa','kelas'=>function($query) use ($siswa_id,$semester){
                $query->with(['jurusan','mapel'=>function($query) use ($siswa_id,$semester){
                    $query->with(['nilai_pengetahuan'=>function($query) use ($siswa_id){
                        $query->where('siswa_id','=',$siswa_id)->get();
                    },'nilai_keterampilan'=>function($query) use ($siswa_id){
                        $query->where('siswa_id','=',$siswa_id)->get();
                    },'nilai_sikap'=>function($query) use ($siswa_id){
                        $query->where('siswa_id','=',$siswa_id)->get();
                    }])->get();
                    $query->with(['kd_mapel'])->where('semester','=',$semester)->get();
                }])->get();
            }])->where('id','=',$krs_id)->get();
        //dd($data->toArray());
        return view('admin.siakad.cetak_deskripsi',compact('data1','data','siswa','semester','absen','date'));
    }
    public function cetak_deskripsi_all($id)
    {
        $date=date('Y-m-d');
        $kelas_id=$id;
        $data=krs::with(['siswa'])->where('kelas_id','=',$kelas_id)->get();
        $data2=krs::with(['siswa'])->where('kelas_id','=',$kelas_id)->first();
        // dd('cek');
        $krs_id=$data2->id;
        $krs=krs::find($krs_id);
        $semester=$krs->semester;
        //dd($semester);
        $siswa_id=$krs->siswa_id;
        $kelas_id=$krs->kelas_id;
        $siswa=siswa::find($siswa_id);
        $data=krs::with(['prakerin','eskul','prestasi','absen','catatan','kelas'=>function($query){
            $query->with(['guru'])->get();
        }])->where('id','=',$krs_id)->get();

        
        $data1=krs::with(['siswa','kelas'=>function($query) use ($siswa_id,$semester){
                $query->with(['jurusan','mapel'=>function($query) use ($siswa_id,$semester){
                    $query->with(['nilai_pengetahuan'=>function($query) use ($siswa_id){
                        $query->where('siswa_id','=',$siswa_id)->get();
                    },'nilai_keterampilan'=>function($query) use ($siswa_id){
                        $query->where('siswa_id','=',$siswa_id)->get();
                    },'nilai_sikap'=>function($query) use ($siswa_id){
                        $query->where('siswa_id','=',$siswa_id)->get();
                    }])->get();
                    $query->with(['kd_mapel'])->where('semester','=',$semester)->get();
                }])->get();
            }])->where('id','=',$krs_id)->get();
        //dd($data->toArray());
        return view('admin.siakad.cetak_deskripsi_all',compact('data1','data','siswa','semester','date'));
    }
    public function export_nilai_ukk($kelas_id, $mapel_id)
	{  
        $kelas = kelas::find($kelas_id);
        $mapel = mapel::find($mapel_id);
        $name_file = 'NILAI UKK '.$mapel->nama_mapel.' '.$kelas->kelas.' Tahun '.$kelas->ket.'.xlsx';
		return Excel::download(new NilaiUKKExport($kelas_id,$mapel_id), $name_file);
	}
    
    public function cetak_pilihan_idcard(Request $request)
	{  
        $dataString = $request->input('data');
        $dataArray = explode(",",$dataString);
        $data=siswa::select('nama_lengkap','tempat_lahir','tanggal_lahir','alamat','pilihan_jurusan','nis','nisn','pic')
                    ->whereIn('id', $dataArray)
                    ->get();

        return view('siswa.cetak_idcard',compact('data'));
	}

}
