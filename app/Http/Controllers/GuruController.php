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
use App\mapel;
use App\kd_mapel;
use App\krs;
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
use Auth;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $user_id=Auth::User()->id;
        $data=guru::where('user_id','=',$user_id)->first();
        return view('guru.index',compact('data'));
    }
    public function form_update_guru()
    {
        $user_id=Auth::User()->id;
        $data=guru::where('user_id','=',$user_id)->first();
        $id=$data->id;
        $data=guru::find($id);
        //dd($data->toArray());
        return view('guru.update_data_guru',compact('data'));
    }
    public function cetak_idcard_guru($id){
        $datas = guru::find($id);
        return view('guru.idcard',compact('datas'));
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
    public function data_mapel($tahun, $semester)
    {
        return view('guru.data_mapel',compact('tahun', 'semester'));
    }
   
    public function json_mapel($tahun, $semester)
    {
        
        $user_id=Auth::User()->id;
        $data=guru::where('user_id','=',$user_id)->first();
        $data=mapel::with(['jurusan','kelas','guru'])->where('guru_id','=',$data->id)->where('semester', $semester)->where('tahun','=',$tahun)->get();
        // dd($data->toArray());
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('nilai', function ($datas) {
                        return '
                        <a href="'.route('guru.data_nilai_pengetahuan',$datas->id).'" class="btn btn-xs btn-success" target="_blank"><i class="glyphicon glyphicon-edit"></i>Pengetahuan</a>
                        <a href="'.route('guru.data_nilai_keterampilan',$datas->id).'" class="btn btn-xs btn-info" target="_blank"><i class="glyphicon glyphicon-edit"></i>Keterampilan</a>
                        <a href="'.route('guru.data_nilai_sikap',$datas->id).'" class="btn btn-xs btn-warning" target="_blank"><i class="glyphicon glyphicon-edit"></i>Sikap</a>
                        ';
                    })
                    ->addColumn('kd', function ($datas) {
                        return '
                        <a href="'.route('guru.data_kd_pengetahuan',$datas->id).'" class="btn btn-xs btn-success" target="_blank"><i class="glyphicon glyphicon-edit"></i>Pengetahuan</a>
                        <a href="'.route('guru.data_kd_keterampilan',$datas->id).'" class="btn btn-xs btn-info" target="_blank"><i class="glyphicon glyphicon-edit"></i>Keterampilan</a>
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
    public function data_mapel_ujian($tahun, $semester)
    {
        return view('guru.data_mapel_ujian',compact('tahun', 'semester'));
    }
   
    public function json_mapel_ujian($tahun, $semester)
    {
        
        $user_id=Auth::User()->id;
        $data=guru::where('user_id','=',$user_id)->first();
        $data=mapel::with(['jurusan','kelas','guru'])->withCount(['ujian'])->where('guru_id','=',$data->id)->where('tahun','=',$tahun)->where('semester', $semester)->get();
        // dd($data->toArray());
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('ujian', function ($datas) {
                        return '
                        <a href="'.route('ujian.data_ujian',$datas->id).'" class="btn btn-xs btn-success" target="_blank"><i class="glyphicon glyphicon-edit"></i>Ujian</a>
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
    public function data_kd_pengetahuan($id)
    {
        $mapel_id=$id;
        $mapel=mapel::find($mapel_id);
        return view('guru.data_kd_pengetahuan',compact('mapel_id','mapel'));
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
                                    <form action="'.route('guru.update_kd_mapel',$user->id).'" method="post" enctype="multipart/form-data">
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
                        <a href="'.route('guru.hapus_kd_mapel',$user->id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                        ';
                    })
                    ->escapeColumns([])
                    ->make(true);
    }
    public function data_kd_keterampilan($id)
    {
        $mapel_id=$id;
        $mapel=mapel::find($mapel_id);
        return view('guru.data_kd_keterampilan',compact('mapel_id','mapel'));
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
                                    <form action="'.route('guru.update_kd_mapel',$user->id).'" method="post" enctype="multipart/form-data">
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
                        <a href="'.route('guru.hapus_kd_mapel',$user->id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                        ';
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
    public function data_nilai_pengetahuan($id)
    {
        $mapel_id=$id;
        $data=mapel::find($mapel_id);
        $kelas_id=$data->kelas_id;
        return view('guru.data_nilai_pengetahuan',compact('mapel_id','data','kelas_id'));
    }
    public function data_siswa_pengetahuan($id)
    {
        $mapel_id=$id;
        $data=mapel::find($mapel_id);
        $kelas_id=$data->kelas_id;
        return view('guru.data_siswa_pengetahuan',compact('mapel_id','data','kelas_id'));
    }
    public function json_nilai_pengetahuan($id)
    {
        $mapel_id=$id;
        $mapel=mapel::find($mapel_id);
        $kelas_id=$mapel->kelas_id;
        $semester=$mapel->semester;
        $mapel=$mapel->id;
        $data=krs::with(['siswa','kelas','nilai_pengetahuan'=>function ($query) use ($mapel)
        {
            $query->where('mapel_id','=',$mapel);
            
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
                                    <form action="'.route('guru.input_nilai_pengetahuan').'" method="post" enctype="multipart/form-data">
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
                                    <label>Nilai PTS *</label>
                                    <input type="text" name="uts" value="" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>Nilai SAS *</label>
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
                                            <label>Nilai PTS *</label>
                                            <input type="text" name="uts" value="'.$nilai->uts.'" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label>Nilai SAS *</label>
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
    public function cetak_nilai_pengetahuan($id)
    {
        $mapel_id=$id;
        $mapel=mapel::find($mapel_id);
        $data=nilai_pengetahuan::with(['siswa','mapel'=>function($query){
            $query->with(['kd_mapel']);
        }])->where('mapel_id','=',$mapel_id)->get();
        $kd_mapel=kd_mapel::where('mapel_id','=',$mapel_id)->where('kriteria','=','PENGETAHUAN')->GET();
        $kelas=kelas::find($mapel->kelas_id);
        // dd($data->toArray());
            //$data=siswa::with(['krs'])->get();
        return view('guru.cetak_nilai_pengetahuan',compact('data','mapel','kelas','kd_mapel'));
    }
    public function data_nilai_keterampilan($id)
    {
        $mapel_id=$id;
        $data=mapel::find($mapel_id);
        $kelas_id=$data->kelas_id;
        return view('guru.data_nilai_keterampilan',compact('mapel_id','data','kelas_id'));
    }
    public function data_siswa_keterampilan($id)
    {
        $mapel_id=$id;
        $data=mapel::find($mapel_id);
        $kelas_id=$data->kelas_id;
        return view('guru.data_siswa_keterampilan',compact('mapel_id','data','kelas_id'));
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
        //dd($data->toArray());
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
                                    <form action="'.route('guru.input_nilai_keterampilan').'" method="post" enctype="multipart/form-data">
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
                                            <form action="'.route('guru.input_nilai_keterampilan').'" method="post" enctype="multipart/form-data">
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
        return view('guru.data_nilai_sikap',compact('mapel_id','data','kelas_id'));
    }
    public function data_siswa_sikap($id)
    {
        $mapel_id=$id;
        $data=mapel::find($mapel_id);
        $kelas_id=$data->kelas_id;
        return view('guru.data_siswa_sikap',compact('mapel_id','data','kelas_id'));
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
                                    <form action="'.route('guru.input_nilai_sikap').'" method="post" enctype="multipart/form-data">
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
                                            <form action="'.route('guru.input_nilai_sikap').'" method="post" enctype="multipart/form-data">
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
        return view('guru.cetak_nilai_keterampilan',compact('data','mapel','kelas','kd_mapel'));
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
        return view('guru.cetak_nilai_sikap',compact('data','mapel','kelas'));
    }
    
    public function data_kelas()
    {
        return view('guru.data_kelas');

    }public function json_kelas()
    {
        $user_id=Auth::User()->id;
        $guru=guru::where('user_id','=',$user_id)->first();
        $data=kelas::where('guru_id','=',$guru->id)->get();
        //dd($data->toArray());
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('siswa', function ($user) {
                        return'
                        <a href="'.route('guru.data_krs',[$user->id, "GANJIL"]).'" data-id="'.$user->id.'" data-sems="ganjil" class="btn btn-xs btn-primary" target="_blank"><i class="glyphicon glyphicon-edit"></i> Siswa Ganjil</a>
                        <a href="'.route('guru.data_krs',[$user->id, "GENAP"]).'" data-id="'.$user->id.'" data-sems="genap" class="btn btn-xs btn-primary" target="_blank"><i class="glyphicon glyphicon-edit"></i> Siswa Genap</a>
                        
                        ';
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
    public function pilih_siswa($id)
    {
        $kelas_id=$id;
        $data=kelas::find($kelas_id);
        return view('guru.data_pilih_siswa',compact('kelas_id','data'));
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
    public function data_krs($id, $semester)
    {
        $kelas_id=$id;
        $data=kelas::find($kelas_id);
        $krs=krs::where('kelas_id','=',$kelas_id)->where('semester', $semester)->get();
        // dd($krs);
        return view('guru.data_krs',compact('krs','kelas_id','data','semester'));
    }
    public function json_krs($id, $semester)
    {
        $data=krs::with(['siswa','kelas'])->where('kelas_id','=',$id)->where('semester', $semester)->orderBy('id', 'DESC')->get();
        //dd($data->toArray());
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($user) {
                        return '
                        <a href="'.route('hapus_krs',$user->id).'" data-id="'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                        ';
                    })
                    ->addColumn('cetak', function ($user) {
                        return '
                        <a href="'.route('guru.cetak_sampul',[$user->id]).'" target="_blank" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i>Sampul</a>
                        <a href="'.route('guru.cetak_data_sekolah',[$user->id]).'" target="_blank" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i>Data Sekolah</a>
                        <a href="'.route('guru.cetak_petunjuk',[$user->id]).'" target="_blank" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i>Petunjuk</a>
                        <a href="'.route('guru.cetak_data_diri',[$user->id]).'" target="_blank" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i>Keterangan Diri</a>
                        <a href="'.route('guru.cetak_raport',[$user->id]).'" target="_blank" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i>Pencapaian</a>
                        <a href="'.route('guru.cetak_deskripsi',[$user->id]).'" target="_blank" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i>Deskripsi</a>
                        ';
                    })
                    ->addColumn('deskripsi', function ($user) {
                        return '
                        <a href="'.route('guru.data_prakerin',[$user->id]).'" target="_blank" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i>Prakerin</a>
                        <a href="'.route('guru.data_eskul',[$user->id]).'" target="_blank" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-edit"></i>Ekstrakurikuler</a>
                        <a href="'.route('guru.data_prestasi',[$user->id]).'" target="_blank" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i>Prestasi</a>
                        <a href="'.route('guru.data_absen',[$user->id]).'" target="_blank" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-edit"></i>Presensi</a>
                        <a href="'.route('guru.data_catatan',[$user->id]).'" target="_blank" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i>Catatan</a>
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
        $tahun=date("Y", strtotime($request->input('tahun')));
        
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
        $data->kelas_id=$request->get('kelas_id');
        $data->save();
        return redirect()->back()->with('success', 'Berhasil diperbaharui');
    }
    public function hapus_krs($id)
    {
        $data=krs::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Berhasil Dihapus');
    }
    public function data_mapel_kelas($id)
    {
        $kelas=kelas::find($id);
        return view('guru.data_mapel_kelas',compact('kelas'));
    }
    public function form_update_mapel($id)
    {
        $mapel=mapel::find($id);
        return view('guru.form_update_mapel',compact('mapel'));
    }
   
    public function json_mapel_kelas($id)
    {
        $data=mapel::with(['jurusan','kelas','guru'])->where('kelas_id','=',$id)->get();
        //dd($data->toArray());
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($datas) {
                        return '
                        <a href="'.route('form_update_mapel',$datas->id).'" class="btn btn-xs btn-info" target="_blank"><i class="glyphicon glyphicon-edit"></i> Update</a>
                        <a href="'.route('hapus_mapel',$datas->id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                        ';
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
    public function data_prakerin($id)
    {
        $krs_id=$id;
        return view('guru.data_siswa_prakerin',compact('krs_id'));
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
                                    <form action="'.route('guru.update_prakerin',$user->id).'" method="post" enctype="multipart/form-data">
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
                        <a href="'.route('hapus_prakerin',$user->id).'" data-id="'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                        ';
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
        return view('guru.data_siswa_eskul',compact('krs_id'));
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
                                    <form action="'.route('guru.update_eskul',$user->id).'" method="post" enctype="multipart/form-data">
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
                        <a href="'.route('hapus_eskul',$user->id).'" data-id="'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                        ';
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
        return view('guru.data_siswa_prestasi',compact('krs_id'));
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
                                    <form action="'.route('guru.update_prestasi',$user->id).'" method="post" enctype="multipart/form-data">
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
                    <a href="'.route('hapus_prestasi',$user->id).'" data-id="'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                    ';
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
        return view('guru.data_siswa_absen',compact('krs_id'));
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
                                <form action="'.route('guru.update_absen',$user->id).'" method="post" enctype="multipart/form-data">
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
                    <a href="'.route('hapus_absen',$user->id).'" data-id="'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                    ';
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
    public function update_absen($id)
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
        return view('guru.data_siswa_catatan',compact('krs_id'));
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
                                <form action="'.route('guru.update_catatan',$user->id).'" method="post" enctype="multipart/form-data">
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
                    <a href="'.route('hapus_catatan',$user->id).'" data-id="'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                    ';
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
        return view('guru.cetak_sampul',compact('data'));
    }
    public function cetak_data_sekolah($id)
    {
        return view('guru.cetak_data_sekolah');
    }
    public function cetak_petunjuk($id)
    {
        return view('guru.cetak_petunjuk');
    }
    public function cetak_data_diri($id)
    {
        # code...
        $krs_id=$id;
        $krs=krs::find($krs_id);
        $siswa_id=$krs->siswa_id;
        $kelas_id=$krs->kelas_id;
        $data=siswa::find($siswa_id);
        return view('guru.cetak_data_diri',compact('data'));
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
                    }])->get();
                    $query->with(['kd_mapel'])->where('semester','=',$semester)->get();
                }])->get();
            }])->where('id','=',$krs_id)->get();
       // dd($data->toArray());
        return view('guru.cetak_raport',compact('data'));
    }
    public function cetak_deskripsi($id)
    {
        # code...
        $date=date('Y-m-d');
        $krs_id=$id;
        $krs=krs::find($krs_id);
        $siswa_id=$krs->siswa_id;
        $kelas_id=$krs->kelas_id;
        $siswa=siswa::find($siswa_id);
        $data=krs::with(['prakerin','eskul','prestasi','absen','catatan','kelas'=>function($query){
            $query->with(['guru'])->get();
        }])->where('id','=',$krs_id)->get();
        $semester=$krs->semester;
        $absen=krs::with(['nilai_sikap'])->where('id','=',$krs_id)->get();
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
        return view('guru.cetak_deskripsi',compact('data1','data','siswa','semester','absen','date'));
    }
    public function cetak_deskripsi_date($id,$date)
    {
        # code...
        $krs_id=$id;
        $krs=krs::find($krs_id);
        $siswa_id=$krs->siswa_id;
        $kelas_id=$krs->kelas_id;
        $siswa=siswa::find($siswa_id);
        $data=krs::with(['prakerin','eskul','prestasi','absen','catatan','kelas'=>function($query){
            $query->with(['guru'])->get();
        }])->where('id','=',$krs_id)->get();
        $semester=$krs->semester;
        $absen=krs::with(['nilai_sikap'])->where('id','=',$krs_id)->get();
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
        return view('guru.cetak_deskripsi',compact('data1','data','siswa','semester','absen','date'));
    }
    public function data_tahun_ajaran()
    {
        $id=2;
        $user_id=Auth::User()->id;
        $guru=guru::where('user_id','=',$user_id)->first();
        $data=mapel::where('guru_id','=', $guru->id)->get();
        //dd($data->toArray());
        // dd($guru->id);
        return view('guru.data_tahun_ajaran',compact('data','id'));
    }
    public function tahun_ajaran()
    {
        $id=2;
        $user_id=Auth::User()->id;
        $guru=guru::where('user_id','=',$user_id)->first();
        $data=mapel::where('guru_id','=', $guru->id)->get();
        //dd($data->toArray());
        // dd($guru->id);
        return view('guru.tahun_ajaran',compact('data','id'));
    }
    public function json_tahun_ajaran($id)
    {
        $data=tahun_ajaran::where('jurusan_id','=',$id)->get();
        //dd($data->toArray());
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($user) {
                        return '
                        <a href="'.route('guru.data_mapel',['tahun'=>$user->tahun, 'semester'=>'GANJIL']).'" data-id="'.$user->id.'" class="btn btn-xs btn-info" target="_blank"><i class="glyphicon glyphicon-edit"></i>Mapel Ganjil</a>
                        <a href="'.route('guru.data_mapel',['tahun'=>$user->tahun, 'semester'=>'GENAP']).'" data-id="'.$user->id.'" class="btn btn-xs btn-info" target="_blank"><i class="glyphicon glyphicon-edit"></i>Mapel Genap</a>
                        ';
                    })
                    ->make(true);
    }
    public function json_tahun_ajaran_ujian($id)
    {
        $data=tahun_ajaran::where('jurusan_id','=',$id)->get();
        //dd($data->toArray());
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($user) {
                        return '
                        <a href="'.route('guru.data_mapel_ujian',['tahun'=>$user->tahun, 'semester'=>'GANJIL']).'" data-id="'.$user->id.'" class="btn btn-xs btn-info" target="_blank"><i class="glyphicon glyphicon-edit"></i>Mapel Ganjil</a>
                        <a href="'.route('guru.data_mapel_ujian',['tahun'=>$user->tahun, 'semester'=>'GENAP']).'" data-id="'.$user->id.'" class="btn btn-xs btn-info" target="_blank"><i class="glyphicon glyphicon-edit"></i>Mapel Genap</a>
                        ';
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
    public function cetak_sampul_all($id)
    {
        $kelas_id=$id;
        $data=krs::with(['siswa'])->where('kelas_id','=',$kelas_id)->get();
        //dd($krs->toArray());
        return view('admin.siakad.cetak_sampul_all',compact('data'));
    }
    public function cetak_data_sekolah_all($id)
    {
        $kelas_id=$id;
        $data=krs::where('kelas_id','=',$kelas_id)->get();
        //dd($data->toArray());
        return view('admin.siakad.cetak_data_sekolah_all',compact('data'));
    }
    public function cetak_data_diri_all($id)
    {
        # code...
        $kelas_id=$id;
        $data=krs::with(['siswa'])->where('kelas_id','=',$kelas_id)->get();
        return view('admin.siakad.cetak_data_diri_all',compact('data'));
    }
    public function cetak_raport_all($id)
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
            // dd($datas);
        }
        // dd($datas);
        return view('admin.siakad.cetak_raport_all',compact('data','date'));
    }
}
