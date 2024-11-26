<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Auth;
use App\User;
use App\pp_buku;
use App\pp_peminjam;
use App\pp_pengunjung;
use App\pp_denda;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use DB;
class PerpustakaanController extends Controller
{
public function index(Request $request)
{
    $j_buku=pp_buku::all()->count();
    $j_pinjam=pp_peminjam::where('status','=','Dipinjam')->count();
    $j_trx=pp_peminjam::all()->count();
    if ($request->get('from')==null&&$request->get('to')==null) {
        $data=pp_peminjam::with(['user'])->whereMonth('tgl_pinjam', date('m'))
                        ->select('user_id', DB::raw('count(*) as data'))
                        ->groupBy('user_id')
                        ->orderBy('data','DESC')
                        ->limit(5)
                        ->get();
        return view('perpustakaan.index',compact('data','j_buku','j_pinjam','j_trx'));
    }else{
        $from=$request->get('from');
        $to=$request->get('to');
        $data=pp_peminjam::with(['user'])->whereBetween('tgl_pinjam', [$from, $to])
                        ->select('user_id', DB::raw('count(*) as data'))
                        ->groupBy('user_id')
                        ->orderBy('data','DESC')
                        ->limit(5)
                        ->get();
        // dd($data->toArray());
        return view('perpustakaan.index',compact('data','j_buku','j_pinjam','j_trx'));

    }
    
    return view('perpustakaan.index');
}
public function data_admin()
{
    return view('perpustakaan.data_admin');
}
public function json_admin()
{
    $data=User::where('role_id','=',6)->get();
    //dd($data->toArray());
    return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($user) {
                    return '
                    <button type="button" data-toggle="modal" data-target="#update'.$user->id.'" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i>Update</button>
                    <!-- Modal-->
                    <div id="update'.$user->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                            <div class="modal-content">
                            
                            <div class="modal-body">
                            <form class="form-horizontal" action="'.route('perpustakaan.update_admin',$user->id).'" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="'.csrf_token().'">
                             <div class="row">
                                 <div class="col-md-6">
                                     <label><b>Nama Lengkap*</b></label>
                                     <fieldset class="form-group position-relative has-icon-left">
                                         <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" value="'.$user->name.'">
                                         <div class="form-control-position">
                                         <i class="fa fa-user-o" aria-hidden="true"></i>
                                         </div>
                                     </fieldset>
                                 </div>
                                 <div class="col-md-6">
                                     <label><b>Username*</b></label>
                                     <fieldset class="form-group position-relative has-icon-left">
                                         <input type="text" class="form-control" name="username" placeholder="Username" required value="'.$user->username.'">
                                         <div class="form-control-position">
                                         <i class="fa fa-address-book-o" aria-hidden="true"></i>
                                         </div>
                                     </fieldset>
                                 </div>
                                 <div class="col-md-6">
                                     <label><b>Status*</b></label>
                                     <fieldset class="form-group position-relative has-icon-left">
                                     <select class="form-control" name="status"  required>
                                     <option value="Aktif" >Aktif</option>
                                     <option value="Nonaktif" >Nonaktif</option>
                                     </select>
                                     </fieldset>
                                 </div>
                                 <div class="col-md-6">
                                     <label><b>Foto Profil*</b></label>
                                     <fieldset class="form-group position-relative has-icon-left">
                                         <input type="file" class="form-control" name="pic">
                                         <div class="form-control-position">
                                         <i class="fa fa-picture-o" aria-hidden="true"></i>
                                         </div>
                                     </fieldset>
                                 </div>
                                <div class="col-md-12 pt-2">
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <button type="submit" class="btn btn-outline-primary btn-block"><i class="far fa-check-square"></i> Verifikasi</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn btn-xs btn-info">Batal</button>
                            </div>
                            </div>
                        </div>
                        </div>
                        <!-- end of modal -->
                <button type="button" data-toggle="modal" data-target="#hapus'.$user->id.'" class="btn btn-warning"><i class="fa fa-trash" aria-hidden="true"></i>Hapus</button>
                <!-- Modal-->
                <div id="hapus'.$user->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                        <div class="modal-content">
                        
                        <div class="modal-body">
                            <h4>
                            Yakin Akan Mengapus <b>'.$user->nama_lengkap.'</b>?
                            </h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-xs btn-info">Batal</button>
                                <button onclick="confirmDelete('.$user->id.')" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</button>                            
                            </div>
                            </div>
                            </div>
                            </div>
                            <!-- end of modal -->
                            ';
                            // <a href="'.route('perpustakaan.delete_admin',$user->id).'" data-id="'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                })
                ->addColumn('pic', function ($user) {
                    $pic=url('/').Storage::url($user->pic);
                    return'
                    <img src="'.$pic.'" alt="" width="100">
                    ';
                })
                
                ->escapeColumns([])
                ->make(true);
}

public function input_admin(Request $request)
{
    $request->validate([
        'name'=>['required'],
        'username'=>['required'],
        'password'=>['required'],
    ]);
    User::create([
        'name' => $request->get('name'), 
        'username' => $request->get('username'), 
        'password' => $request->get('password'),
        'role_id' => 6, 
        'status' => 'aktif', 
        'pic' => "belum", 
        ]);
        
    return redirect()->back()->with('success', 'Akun Berhasil Dibuat');
}
public function update_admin(Request $request, $id)
    {
        $foto = $request->file('pic');
        if ($foto==null) {
            $data=User::find($id);
            $data->name=$request->get('name');
            $data->username=$request->get('username');
            $data->status=$request->get('status');
            $data->save();
            return redirect()->back()->with('success', 'Akun Berhasil Update');
        }else{
            $path = $foto->store('public/profil');
            $data=User::find($id);
            $data->name=$request->get('name');
            $data->username=$request->get('username');
            $data->status=$request->get('status');
            $data->pic=$path;
            $data->save();
            return redirect()->back()->with('success', 'Akun Berhasil Update');
        }
    }
public function delete_admin($id)
{
    $data=User::find($id);
    Storage::delete($data->pic);
    $data->delete();
    return redirect()->back()->with('success', 'Berhasil dihapus');
}
public function api(Request $request)
{
    if ($request->has('q')) {
        $cari = $request->q;
        $data=User::where('role_id','=',6)->where('name','LIKE','%'.$cari.'%')->get();
        return response()->json($data);
    }
    
}
public function data_buku()
    {
        # code...
        return view('perpustakaan.data_buku');
    }
    public function json_buku()
    {
        $data=pp_buku::orderBy('id', 'asc')->get();
        //dd($data->toArray());
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($user) {
                        return '
                        <button type="button" data-toggle="modal" data-target="#myModal'.$user->id.'" class="btn btn-primary">Ubah</button>
                        <!-- Modal-->
                        <div id="myModal'.$user->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 id="exampleModalLabel" class="modal-title">Buku</h4>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <p>Silahkan tambahkan .</p>
                                    <form action="'.route('perpustakaan.update_buku',$user->id).'" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                    
                                    <div class="form-group">
                                        <label>Tanggal Terima *</label>
                                        <input type="date" name="tanggal_terima" class="form-control" value="'.$user->tanggal_terima.'" required>
                                    </div>
                                    <div class="form-group">
                                        <label>No.Klasifikasi *</label>
                                        <input type="text" name="no_klasifikasi" class="form-control" value="'.$user->no_klasifikasi.'" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Pengarang *</label>
                                        <input type="text" name="pengarang" class="form-control" value="'.$user->pengarang.'" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Judul *</label>
                                        <input type="text" name="judul" class="form-control" value="'.$user->judul.'" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Perolehan *</label>
                                        <input type="text" name="perolehan" class="form-control" value="'.$user->perolehan.'" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Penerbit *</label>
                                        <input type="text" name="penerbit" class="form-control" value="'.$user->penerbit.'" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tahun Terbit *</label>
                                        <input type="number" name="tahun_terbit" class="form-control" value="'.$user->tahun_terbit.'" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Harga *</label>
                                        <input type="number" name="harga" class="form-control" value="'.$user->harga.'" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Halaman *</label>
                                        <input type="number" name="jumlah_halaman" class="form-control" value="'.$user->jumlah_halaman.'" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Buku *</label>
                                        <input type="number" name="jumlah_buku" class="form-control" value="'.$user->jumlah_buku.'" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Gambar *</label>
                                        <input type="file" name="pic" class="form-control">
                                    </div>
                                    <div class="form-group">       
                                        <input type="submit" value="Ubah" class="btn btn-primary">
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
                            // <a href="'.route('perpustakaan.delete_buku',$user->id).'" data-id="'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                    })
                    ->addColumn('pic', function ($user) {
                        return '<img height="80px" width="80px" src="'.url('/').Storage::url($user->pic).'">';
                    })
                    ->escapeColumns([])
                    ->make(true);
    }
    public function input_buku(Request $request)
    {
        $request->validate([
            'tanggal_terima'=>['required'],
            'no_klasifikasi'=>['required'],
            'pengarang'=>['required'],
            'judul'=>['required'],
            'perolehan'=>['required'],
            'penerbit'=>['required'],
            'tahun_terbit'=>['required'],
            'harga'=>['required'],
            'jumlah_halaman'=>['required'],
            'jumlah_buku'=>['required'],  
            'pic'=>['required'],
          ]);
          $uploaded = $request->file('pic');
          $nama_file=$uploaded->getClientOriginalName();
          $namafix = rand(999,99999). $nama_file;
          $path = $uploaded->store('public/buku');
          pp_buku::create([
            'tanggal_terima' => $request->get('tanggal_terima'),
            'no_klasifikasi' => $request->get('no_klasifikasi'),
            'pengarang' => $request->get('pengarang'),
            'judul' => $request->get('judul'),
            'perolehan' => $request->get('perolehan'),
            'penerbit' => $request->get('penerbit'),
            'tahun_terbit' => $request->get('tahun_terbit'),
            'harga' => $request->get('harga'),
            'jumlah_halaman' => $request->get('jumlah_halaman'),
            'jumlah_buku' => $request->get('jumlah_buku'),  
            'deskripsi' => $request->get('deskripsi'),  
            'pic' => $path,
          ]);
        return redirect()->back()->with('success', 'Berhasil ditambahkan');
    }
    public function update_buku(Request $request,$id)
    {
        $request->validate([
            'tanggal_terima'=>['required'],
            'no_klasifikasi'=>['required'],
            'pengarang'=>['required'],
            'judul'=>['required'],
            'perolehan'=>['required'],
            'penerbit'=>['required'],
            'tahun_terbit'=>['required'],
            'harga'=>['required'],
            'jumlah_halaman'=>['required'],
            'jumlah_buku'=>['required'],
          ]);
          if ($request->hasFile('pic')) {
            $data=pp_buku::find($id);
            $foto = $request->file('pic');
            $path = $foto->store('public/buku');
            Storage::delete($data->pic);
            $data->tanggal_terima = $request->get('tanggal_terima');
            $data->no_klasifikasi = $request->get('no_klasifikasi');
            $data->pengarang = $request->get('pengarang');
            $data->judul = $request->get('judul');
            $data->perolehan = $request->get('perolehan');
            $data->penerbit = $request->get('penerbit');
            $data->tahun_terbit = $request->get('tahun_terbit');
            $data->harga = $request->get('harga');
            $data->jumlah_halaman = $request->get('jumlah_halaman');
            $data->jumlah_buku = $request->get('jumlah_buku');  
            $data->pic = $path;
            $data->save();
          }else {
            $data=pp_buku::find($id);
            $data->tanggal_terima = $request->get('tanggal_terima');
            $data->no_klasifikasi = $request->get('no_klasifikasi');
            $data->pengarang = $request->get('pengarang');
            $data->judul = $request->get('judul');
            $data->perolehan = $request->get('perolehan');
            $data->penerbit = $request->get('penerbit');
            $data->tahun_terbit = $request->get('tahun_terbit');
            $data->harga = $request->get('harga');
            $data->jumlah_halaman = $request->get('jumlah_halaman');
            $data->jumlah_buku = $request->get('jumlah_buku'); 
            $data->save();
          }
            return redirect()->back()->with('success', 'Berhasil Diperbaharui');
    }
    public function delete_buku($id)
    {
        $data=pp_buku::find($id);
        Storage::delete($data->pic);
        $data->delete();
        return redirect()->back()->with('success', 'Berhasil Dihapus');
    }
    public function data_pengunjung()
    {
        # code...
        return view('perpustakaan.data_pengunjung');
    }
    public function json_pengunjung()
    {
        $data=pengunjung::with(['user'])->orderBy('id', 'asc')->get();
        //dd($data->toArray());
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($user) {
                        return '
                        <button type="button" data-toggle="modal" data-target="#myModal'.$user->id.'" class="btn btn-primary">Ubah</button>
                        <!-- Modal-->
                        <div id="myModal'.$user->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 id="exampleModalLabel" class="modal-title">Data Pengunjung</h4>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <p>Silahkan tambahkan .</p>
                                    <form action="'.route('perpustakaan.update_pengunjung',$user->id).'" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                    <div class="form-group">
                                        <label>Keperluan *</label>
                                        <input type="text" name="keperluan" class="form-control" value="'.$user->keperluan.'" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal kunjungan *</label>
                                        <input type="date" name="tanggal_kunjungan" class="form-control" value="'.$user->tanggal_kunjungan.'" required>
                                    </div>
                                    <div class="form-group">       
                                        <input type="submit" value="Ubah" class="btn btn-primary">
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
                            // <a href="'.route('perpustakaan.delete_pengunjung',$user->id).'" data-id="'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                    })
                    ->addColumn('pic', function ($user) {
                        return '<img height="80px" width="80px" src="'.Storage::url($user->user->pic).'">'; 
                    })
                    ->addColumn('siswa', function ($user) {

                        return $user->user->nama;
                    })
                    ->addColumn('nis', function ($user) {

                        return $user->user->nis; 
                    })   
                    ->addColumn('jurusan', function ($user) {

                        return $user->user->jurusan;
                    })
                     ->addColumn('alamat', function ($user) {

                        return $user->user->alamat;   
                    })
                    ->escapeColumns([])
                    ->make(true);
    }
    public function input_pengunjung(Request $request)
    {
        $request->validate([
            'nis' =>['required','numeric'],
            'keperluan' =>['required','min:5'],
            'tanggal_kunjungan' =>['required'],
          ]);
            $nis=$request->get('nis');
            $user=User::where('nis','=',$nis)->first();
            if ($user!=null) {
                pengunjung::create([
                    'user_id' => $user->id,
                    'keperluan' => $request->get('keperluan'),
                    'tanggal_kunjungan' => $request->get('tanggal_kunjungan'),
                ]);
                return redirect()->back()->with('success', 'Berhasil ditambahkan');
            }else{
                return redirect()->back()->with('gagal', 'Nis Salah');
            }
         
    }
    public function update_pengunjung(Request $request,$id)
    {
        $request->validate([
            'keperluan' =>['required'],
            'tanggal_kunjungan' =>['required'],
          ]);

            $data=pengunjung::find($id);
            $data->keperluan = $request->get('keperluan');
            $data->tanggal_kunjungan = $request->get('tanggal_kunjungan');
            $data->save();
            return redirect()->back()->with('success', 'Berhasil Diperbaharui');
    }
    public function delete_pengunjung($id)
    {
        $data=pengunjung::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Berhasil Dihapus');
    }
    public function scan_user()
    {
        return view('perpustakaan.scan_user');
    }
    public function scan_buku($id)
    {

        $cek=User::where('username','=',$id)->first();
        if ($cek==null) {
            return redirect()->back()->with('gagal', 'ID Kartu Tidak Terdaftar');
        }else{
            $user_id=$cek->id;
            return view('perpustakaan.scan_buku',compact('user_id'));
        }
    }
    public function json_peminjam_user($id)
    {
        $data=pp_peminjam::with(['user','buku','pp_denda'])
                            ->where('status','=','Dipinjam')
                            ->where('user_id','=',$id)
                            ->orderBy('id', 'DESC')
                            ->get();
        //dd($data->toArray());
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('pic', function ($user) {
                        
                        return '<img height="80px" width="80px" src="'.url('/').Storage::url($user->buku->pic).'">';    
                    })
                    ->addColumn('buku', function ($user) {

                        return $user->buku->judul;
                    })
                    ->addColumn('no_klasifikasi', function ($user) {

                        return $user->buku->no_klasifikasi;
                    })
                    ->escapeColumns([])
                    ->make(true);
    }
    public function input_peminjam_user($user_id,$buku_id)
    {
            $user=User::find($user_id);
            $buku=pp_buku::where('no_klasifikasi','=',$buku_id)->first();
            $jum_peminjam=pp_peminjam::where('pp_buku_id','=',$buku_id)->where('status','=','Dipinjam')->count();
            // dd($jum_peminjam);
            if ($jum_peminjam<$buku->jumlah_buku) {
                if ($user!=null && $buku!=null) {
                    pp_peminjam::create([
                        'user_id'=>$user->id,
                        'pp_buku_id'=>$buku->id,
                        'tgl_pinjam'=>date("Y-m-d"), 
                        'status'=>'Dipinjam', 
                    ]);
                    return redirect()->back()->with('success', 'Berhasil ditambahkan');
                }else{
                    return redirect()->back()->with('gagal', 'Siswa / Buku Tidak Terdaftar');
                }
            }else{

                return redirect()->back()->with('gagal', 'Stok Buku Habis Silahkan Perikasa Kembali!');
            }
            
          
    }
    public function data_peminjam()
    {
        # code...
        $daftarBuku= pp_buku::where('jumlah_buku','>',0)->get();
        return view('perpustakaan.data_peminjam',compact('daftarBuku'));
    }
    public function json_peminjam()
    {
        $data=pp_peminjam::with(['user','buku','pp_denda'])->orderBy('id', 'asc')->get();
        //dd($data->toArray());
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($user) {
                        return '
                        <button type="button" data-toggle="modal" data-target="#myModal'.$user->id.'" class="btn btn-primary">Ubah</button>
                        <!-- Modal-->
                        <div id="myModal'.$user->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 id="exampleModalLabel" class="modal-title">peminjam</h4>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <p>Silahkan tambahkan .</p>
                                    <form action="'.route('perpustakaan.update_peminjam',$user->id).'" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                    <div class="form-group">
                                        <label>Tanggal peminjam*</label>
                                        <input type="date" name="tanggal_pinjam" class="form-control" value="'.$user->tanggal_pinjam.'" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal kembali*</label>
                                        <input type="date" name="tanggal_kembali" class="form-control" value="'.$user->tanggal_kembali.'" required>
                                    </div>
                                    <div class="form-group">       
                                        <input type="submit" value="Ubah" class="btn btn-primary">
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
                            // <a href="'.route('perpustakaan.delete_peminjam',$user->id).'" data-id="'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                    })
                    ->addColumn('kembali', function ($user) {
                        if ($user->status=='Kembali') {
                            return'Buku Sudah Kembali';
                        }else{
                            return '
                        <button type="button" data-toggle="modal" data-target="#kembali'.$user->id.'" class="btn btn-primary">Kembalikan</button>
                        <!-- Modal-->
                        <div id="kembali'.$user->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 id="exampleModalLabel" class="modal-title">peminjam</h4>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <p>Silahkan tambahkan .</p>
                                    <form action="'.route('perpustakaan.buku_kembali',$user->id).'" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                   
                                    <div class="form-group">
                                        <label>Tanggal kembali*</label>
                                        <input type="date" name="tanggal_kembali" class="form-control" value="'.$user->tanggal_kembali.'" required>
                                    </div>
                                    <div class="form-group">       
                                        <input type="submit" value="Kembalikan" class="btn btn-primary">
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
                    })
                    ->addColumn('siswa', function ($user) {

                        return $user->user->name;
                    })
                    ->addColumn('nisn', function ($user) {

                        return $user->user->username; 
                    })   
                    
                    ->addColumn('pic', function ($user) {
                        
                        return '<img height="80px" width="80px" src="'.url('/').Storage::url($user->buku->pic).'">';    
                    })
                    ->addColumn('buku', function ($user) {

                        return $user->buku->judul;
                    })
                    ->addColumn('denda', function ($user) {
                        if(isset($user->pp_denda->denda)){
                            return $user->pp_denda->denda;
                        }else{
                            if ($user->status=="Dipinjam") {
                                return "Menunggu";
                            }else {
                                return "TANPA DENDA";

                            }
                        }
                        
                    })
                    ->escapeColumns([])
                    ->make(true);
    }
    public function input_peminjam(Request $request)
    {
        $request->validate([
            'user_id'=>['required'],
            'buku_id'=>['required'],
            'tanggal_pinjam'=>['required'],
          ]);

            $user_id= $request->get('user_id');
            $buku_id= $request->get('buku_id');
            $user=User::find($user_id);
            $buku=pp_buku::find($buku_id);
            $jum_peminjam=pp_peminjam::where('pp_buku_id','=',$buku_id)->where('status','=','Dipinjam')->count();
            // dd($jum_peminjam);
            if ($jum_peminjam<$buku->jumlah_buku) {
                if ($user!=null && $buku!=null) {
                    pp_peminjam::create([
                        'user_id'=>$user->id,
                        'pp_buku_id'=>$request->get('buku_id'),
                        'tgl_pinjam'=>$request->get('tanggal_pinjam'), 
                        'status'=>'Dipinjam', 
                    ]);
                    return redirect()->back()->with('success', 'Berhasil ditambahkan');
                }else{
                    return redirect()->back()->with('gagal', 'Siswa / Buku Tidak Terdaftar');
                }
            }else{

                return redirect()->back()->with('gagal', 'Stok Buku Habis Silahkan Perikasa Kembali!');
            }
            
          
    }
    public function update_peminjam(Request $request,$id)
    {
        $request->validate([
            'tanggal_pinjam'=>['required'], 
            'tanggal_kembali'=>['required'], 
          ]);
            $data=pp_peminjam::find($id);
            $data->tgl_pinjam=$request->get('tanggal_pinjam');
            $data->tgl_kembali=$request->get('tanggal_kembali');
            $data->save();
            return redirect()->back()->with('success', 'Berhasil Diperbaharui');
    }
    public function buku_kembali(Request $request,$id)
    {
        $request->validate([
            'tanggal_kembali'=>['required'], 
          ]);
            $tgl_kembali=$request->get('tanggal_kembali');
            $created = new Carbon($tgl_kembali);
            // dd($created->diffInDays());
            $data=pp_peminjam::find($id);
            $perbedaan = $created->diffInDays($data->tgl_pinjam);
            // dd( $perbedaan);
            if ($perbedaan>7) {
                $denda=($perbedaan-7)*500;
                pp_denda::create([
                    'pp_peminjam_id'=>$data->id,
                    'denda'=>$denda,
                ]);
            }
            $data->tgl_kembali=$request->get('tanggal_kembali');
            $data->status='Kembali';
            $data->save();
            return redirect()->back()->with('success', 'Berhasil Dikembalikan');
    }
    public function delete_peminjam($id)
    {
        $data=pp_peminjam::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Berhasil Dihapus');
    }
    public function data_denda()
    {
        # code...
        return view('perpustakaan.data_denda');
    }
    public function json_denda()
    {
        $data=denda::all();
        //dd($data->toArray());
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($user) {
                        return '
                        <button type="button" data-toggle="modal" data-target="#myModal'.$user->id.'" class="btn btn-primary">Ubah</button>
                        <!-- Modal-->
                        <div id="myModal'.$user->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 id="exampleModalLabel" class="modal-title">denda</h4>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <p>Silahkan tambahkan .</p>
                                    <form action="'.route('perpustakaan.update_denda',$user->id).'" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                    <div class="form-group">
                                        <label>Nama denda *</label>
                                        <input type="text" name="denda" class="form-control" required value="'.$user->denda.'">
                                    </div>
                                    <div class="form-group">       
                                        <input type="submit" value="Ubah" class="btn btn-primary">
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
                            // <a href="'.route('perpustakaan.delete_denda',$user->id).'" data-id="'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                    })
                    
                    ->make(true);
    }
    public function input_denda(Request $request)
    {
        $request->validate([
            'nama'=>['required'],
          ]);

          denda::create([
            'nama' => $request->get('nama'), 
            
        ]);
        return redirect()->back()->with('success', 'Berhasil ditambahkan');
    }
    public function update_denda(Request $request,$id)
    {
        $request->validate([
            'nama'=>['required'],
          ]);

            $data=denda::find($id);
            $data->nama=$request->get('nama');
            $data->save();
            return redirect()->back()->with('success', 'Berhasil Diperbaharui');
    }
    public function delete_denda($id)
    {
        $data=denda::find($id);
        Storage::delete($data->pic);
        $data->delete();
        return redirect()->back()->with('success', 'Berhasil Dihapus');
    }
    public function pilih_cetak_idbuku ()
    {
        $krs=pp_buku::all();
        return view('perpustakaan.pilih_cetak',compact('krs'));
    }
    public function json_pilih_cetak_idbuku()
    {
        $data=pp_buku::select('id','no_klasifikasi','judul','tahun_terbit')->get();
        //dd($cek->toArray());
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('pilih', function ($user) {
                        return '
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="buku[]" value="'.$user->id.'">
                        </div>
                        ';
                    })
                    ->escapeColumns([])
                    ->make(true);
    }
    public function cetak_all_idbuku()
    {
        $data=pp_buku::all();
        return view('perpustakaan.cetak_idbuku',compact('data'));
        // dd($data->toArray());
    }
    public function cetak_idbuku(Request $request)
    {
        $buku = $request->input('buku');
        if ($buku==null) {
            return redirect()->back()->with('gagal', 'Tidak ada siswa yang dipilih');
           
        }else{
           
                    $data=pp_buku::whereIn('id',$buku)->get();
            
        }
        return view('perpustakaan.cetak_idbuku',compact('data'));
        // dd($data->toArray());
    }
    public function cetak_buku(Request $request)
    {
        $start = $request->input('start');
        $end = $request->input('end');
        $data = pp_buku::orderBy('tanggal_terima','ASC')->whereBetween('tanggal_terima', [$start, $end])->get();
        return view('perpustakaan.cetak_buku',compact('data','start','end'));
        // dd($data->toArray());
    }
}
