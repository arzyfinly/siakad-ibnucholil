<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Auth;
use DataTables;
use QrCode;
use App\User;
use App\sarpras;
use App\ruang_sarpras;
use App\perawatan_sarpras;
class SarprasController extends Controller
{
      /*
    === Sarana Dan Prasarana ===
    - Admin Sarpras
    - data barang
    - cetak qr
    - cek Qr
    */

    public function sarpras()
    {
        # code...
    }
    public function index()
    {
        return view ('sarpras.index');
    }
    public function data_admin()
    {
        //
        return view('sarpras.data_admin');
    }
    public function json_admin()
    {
        //
        $data=User::where('role_id','=',5)
                ->orderBy('id', 'DESC')
                ->get();
        //dd($data->toArray());
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($user) {
                    return '
                    <button onclick="confirmDelete('.$user->id.')" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</button>
                    ';
                    // <a href="'.route('sarpras.hapus_admin',$user->id).'" data-id="'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                })
                ->make(true);
    }

    public function input_admin(Request $request)
    {
        //
        $request->validate([
            'name'=>['required'],
            'username'=>['required'],
          ]);
          if ($request->hasFile('pic')) {
            $foto = $request->file('pic');
            $path = $foto->store('public/profile');
            User::create([
                'name' => $request->get('name'), 
                'username' =>$request->get('username'), 
                'password'=>$request->get('username'), 
                'role_id'=> 5, 
                'pic'=> $path,
                'status'=> $request->get('username'),
            ]);
          }
        return redirect()->back()->with('success', 'Berhasil ditambahkan');

    }
    public function update_admin(Request $request, $id)
    {
        //
        $request->validate([
            'name'=>['required'],
            'username'=>['required'],
          ]);

          $data=User::find($id);
          if ($request->hasFile('pic')) {
            $path = $foto->store('public/profile');
            Storage::delete($data->pic);
            $data->pic=$path;
            $data->name=$request->get('name');
            $data->username=$request->get('username');
            $data->save();
          }else{
            $data->name=$request->get('name');
            $data->username=$request->get('username');
            $data->save();
          }
        return redirect()->back()->with('success', 'Berhasil diganti');
    }

    public function hapus_admin($id)
    {
        //
        $data=User::find($id);
        Storage::delete($data->pic);
        $data->delete();
        return redirect()->back()->with('success', 'Berhasil dihapus');
    }

    public function data_barang()
    {
        $ruangan = ruang_sarpras::all();
        return view('sarpras.data_barang', compact('ruangan'));
    }
    public function json_barang()
    {
        $ruangan = ruang_sarpras::all();
        $ruang_update = '<option value=""> Pilih Ruangan</option>';
        foreach ($ruangan as $key) {
            $ruang_update.='<option value="'.$key->id.'">'.$key->nama_ruang.'</option>';
        }
        $data=sarpras::orderBy('id', 'DESC')->get();
        // dd($data->toArray());
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('nominal', function ($user) {
                    $hasil_rupiah = "Rp " . number_format($user->nominal,2,',','.');
                    return $hasil_rupiah;
                })
                ->addColumn('letak', function ($user) {
                    return $user->ruangan->nama_ruang;
                })
                ->addColumn('action', function ($user) {
                    $ruangan = ruang_sarpras::all();
                    $ruang_update = '<option value=""> Pilih Ruangan</option>';
                    foreach ($ruangan as $key) {
                        if ($key->id == $user->letak) {
                            $ruang_update.='<option selected value="'.$key->id.'">'.$key->nama_ruang.'</option>';
                        } else {
                            $ruang_update.='<option value="'.$key->id.'">'.$key->nama_ruang.'</option>';
                        }
                    }
                    return '
                    <a href="'.route('sarpras.cetak_unit',$user->id).'" target="_blank" data-id="'.$user->id.'" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i>Cetak Laporan</a>
                    <button type="button" data-toggle="modal" data-target="#update'.$user->id.'" class="btn btn-primary">Update</button>
                        <div id="update'.$user->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 id="exampleModalLabel" class="modal-title">Gambar Ruangan</h4>
                                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="'.route('sarpras.update_barang',$user->id).'" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                        <div class="form-group">
                                            <label>Inventari Barang *</label>
                                            <input type="text" name="inventaris_barang" value="'.$user->inventaris_barang.'" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nomor Barang *</label>
                                            <input type="text" value="'.$user->nomor_barang.'" name="nomor_barang" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Letak Barang *</label>
                                            <select class="form-control" name="letak" id="letak" required>
                                            '.$ruang_update.'
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Barang *</label>
                                            <input type="text" value="'.$user->nama_barang.'" name="nama_barang" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Merek *</label>
                                            <input type="text" value="'.$user->merek.'" name="merek" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Perolehan</label>
                                            <input type="date" value="'.$user->tahun.'" name="tahun" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Anggaran Dari *</label>
                                            <input type="text" value="'.$user->anggaran.'" name="anggaran" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>nominal *</label>
                                            <input type="number" value="'.$user->nominal.'" name="nominal" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah *</label>
                                            <input type="number" value="'.$user->jumlah.'" name="jumlah" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Spesifikasi *</label>
                                            <input type="text" value="'.$user->spesifikasi.'" name="spesifikasi" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Fungsi *</label>
                                            <input type="text" value="'.$user->fungsi.'" name="fungsi" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Foto *</label>
                                            <input type="file" name="pic" class="form-control">
                                        </div>
                                        <div class="form-group">       
                                            <input type="submit" value="Tambahkan" class="btn btn-primary">
                                        </div>
                                        </form>
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button onclick="confirmDelete('.$user->id.')" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</button>
                        ';
                        // <a href="'.route('sarpras.hapus_barang',$user->id).'" data-id="'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                })
                ->addColumn('qrcode', function ($user) {
                    return QrCode::margin(1)
                                    ->errorCorrection('H')
                                    ->encoding('UTF-8')
                                    ->size(100)
                                    ->generate($user->nomor_barang);
                })
                ->addColumn('cetak', function ($user) {
                    return'
                    <a href="'.route('sarpras.cetakqr',$user->id).'" target="_blank" data-id="'.$user->id.'" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i>Cetak QR</a>
                    ';
                })
                ->addColumn('perawatan', function ($user) {
                    return'
                    <a href="'.route('sarpras.data_perawatan',$user->id).'" target="_blank" data-id="'.$user->id.'" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i>Perawatan</a>
                    ';
                })
                ->addColumn('gambar', function ($user) {
                    return '
                        <button type="button" data-toggle="modal" data-target="#gambar'.$user->id.'" class="btn btn-primary">Lihat</button>
                        <div id="gambar'.$user->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 id="exampleModalLabel" class="modal-title">Gambar Barang</h4>
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

    public function input_barang(Request $request)
    {
        //
        $request->validate([
            'inventaris_barang'=>['required'],
            'nomor_barang'=>['required'],
            'letak'=>['required'],
            'nama_barang'=>['required'],
            'merek'=>['required'],
            'tahun'=>['required'],
            'anggaran'=>['required'],
            'nominal'=>['required'],
            'jumlah'=>['required'],
            'spesifikasi'=>['required'],
            'fungsi'=>['required'],
            'pic'=>['required'],
          ]);
          if ($request->hasFile('pic')) {
            $foto = $request->file('pic');
            $path = $foto->store('public/sarpras');
            sarpras::create([
                'inventaris_barang'=>$request->get('inventaris_barang'),
                'nomor_barang'=>$request->get('nomor_barang'),
                'letak'=>$request->get('letak'),
                'nama_barang'=>$request->get('nama_barang'),
                'merek'=>$request->get('merek'),
                'tahun'=>$request->get('tahun'),
                'anggaran'=>$request->get('anggaran'),
                'nominal'=>$request->get('nominal'),
                'jumlah'=>$request->get('jumlah'),
                'spesifikasi'=>$request->get('spesifikasi'),
                'fungsi'=>$request->get('fungsi'),
                'pic'=>$path,
            ]);
          }
        return redirect()->back()->with('success', 'Berhasil ditambahkan');
    }

    public function update_barang(Request $request, $id)
    {
        //
        //
        $data=sarpras::find($id);
        if ($request->hasFile('pic')) {
            $foto = $request->file('pic');
            $path = $foto->store('public/sarpras');
                 $data->inventaris_barang=$request->get('inventaris_barang');
                 $data->nomor_barang=$request->get('nomor_barang');
                 $data->letak=$request->get('letak');
                 $data->nama_barang=$request->get('nama_barang');
                 $data->merek=$request->get('merek');
                 $data->tahun=$request->get('tahun');
                 $data->anggaran=$request->get('anggaran');
                 $data->nominal=$request->get('nominal');
                 $data->jumlah=$request->get('jumlah');
                 $data->spesifikasi=$request->get('spesifikasi');
                 $data->fungsi=$request->get('fungsi');
                 $data->pic=$path;
                 $data->save();
          }else{
                 $data->inventaris_barang=$request->get('inventaris_barang');
                 $data->nomor_barang=$request->get('nomor_barang');
                 $data->letak=$request->get('letak');
                 $data->nama_barang=$request->get('nama_barang');
                 $data->merek=$request->get('merek');
                 $data->tahun=$request->get('tahun');
                 $data->anggaran=$request->get('anggaran');
                 $data->nominal=$request->get('nominal');
                 $data->jumlah=$request->get('jumlah');
                 $data->spesifikasi=$request->get('spesifikasi');
                 $data->fungsi=$request->get('fungsi');
                 $data->save();
          }
        return redirect()->back()->with('success', 'Berhasil Diubah');
    }

    public function hapus_barang($id)
    {
        //
        $data=sarpras::find($id);
        storage::delete($data->pic);
        $data->delete();
        return redirect()->back()->with('success', 'Berhasil Dihapus');
    }

    public function data_ruang()
    {
        //
        return view('sarpras.data_ruang');
    }
    public function json_ruang()
    {
        //
        $data=ruang_sarpras::orderBy('id', 'DESC')->get();
        //dd($data->toArray());
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('panjang', function($user){
                    if(isset($user->panjang)){
                        return $user->panjang.' cm';
                    } else {
                        return '0'.' cm';
                    }
                })
                ->addColumn('lebar', function($user){
                    if(isset($user->lebar)){
                        return $user->lebar.' cm';
                    } else {
                        return '0'.' cm';
                    }
                })
                ->addColumn('luas', function($user){
                    if(isset($user->lebar) && isset($user->panjang)){
                        return $user->lebar*$user->panjang.' cm<sup>2</sup>';
                    } else {
                        return '-';
                    }
                })
                ->addColumn('nominal', function($user){
                    if(isset($user->nominal)){
                        return "Rp " . number_format($user->nominal,2,',','.');
                    } else {
                        return '-';
                    }
                })
                ->addColumn('foto_gedung', function($user){
                    if(isset($user->foto_gedung)){
                        $photo = url('/').Storage::url($user->foto_gedung);
                        $img = '<img src="'.$photo.'" width="60px">';
                    } else {
                        $img = '-';
                    }
                    return $img;
                })
                ->addColumn('keterangan', function($user){
                    if(isset($user->keterangan)){
                        return $user->keterangan;
                    } else {
                        return '-';
                    }
                })
                ->addColumn('action', function ($user) {
                    return '
                    <button type="button" data-toggle="modal" data-target="#update'.$user->id.'" class="btn btn-primary">Update</button>
                        <div id="update'.$user->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 id="exampleModalLabel" class="modal-title">Gambar Ruangan</h4>
                                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="'.route('sarpras.update_ruang',$user->id).'" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                        <div class="form-group">
                                            <label>Nama Ruang *</label>
                                            <input type="text" value="'.$user->nama_ruang.'" name="nama_ruang" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Kode Ruang *</label>
                                            <input type="text" value="'.$user->kode_ruang.'" name="kode_ruang" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Panjang *</label>
                                            <input type="text" value="'.$user->panjang.'" name="panjang" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Lebar *</label>
                                            <input type="text" value="'.$user->lebar.'" name="lebar" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nominal *</label>
                                            <input type="text" value="'.$user->nominal.'" name="nominal" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Foto Gedung *</label>
                                            <input type="file" value="" name="foto_gedung" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>keterangan *</label>
                                            <input type="text" value="'.$user->keterangan.'" name="keterangan" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Perolehan *</label>
                                            <input type="text" value="'.$user->perolehan.'" name="perolehan" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun Perolehan *</label>
                                            <input type="text" value="'.$user->tahun.'" name="tahun" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Kepemilikan</label>
                                            <input type="text" value="'.$user->milik.'" name="milik" class="form-control" required>
                                        </div>
                                        <div class="form-group">       
                                            <input type="submit" value="Kirim" class="btn btn-primary">
                                        </div>
                                        </form>
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button onclick="confirmDelete('.$user->id.')" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</button>
                        ';
                        // <a href="'.route('sarpras.hapus_ruang',$user->id).'" data-id="'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                })
                
                ->escapeColumns([])
                ->make(true);
    }

    public function input_ruang(Request $request)
    {
        //
        $request->validate([
            'nama_ruang'=>['required'],
            'kode_ruang'=>['required'],
            'panjang'=>['required'],
            'lebar'=>['required'],
            'nominal'=>['required'],
            'keterangan'=>['required'],
            'perolehan'=>['required'],
            'tahun'=>['required'],
            'milik'=>['required'],
          ]);

          if ($request->hasFile('foto_gedung')) {
            $request->validate([
                'foto_gedung' => ['image','mimes:jpeg,png,jpg,gif,svg']
            ]);
            $foto = $request->file('foto_gedung');
            $path = $foto->store('public/sarpras');
            $foto_gedung = $path;
            } else {
                $foto_gedung = "";
            }
            ruang_sarpras::create([
                'nama_ruang'=>$request->get('nama_ruang'),
                'kode_ruang'=>$request->get('kode_ruang'),
                'panjang'=>$request->get('panjang'),
                'lebar'=>$request->get('lebar'),
                'nominal'=>$request->get('nominal'),
                'foto_gedung'=>$foto_gedung,
                'keterangan'=>$request->get('keterangan'),
                'perolehan'=>$request->get('perolehan'),
                'tahun'=>$request->get('tahun'),
                'milik'=>$request->get('milik'),
            ]);
        return redirect()->back()->with('success', 'Berhasil ditambahkan');
    }

    public function update_ruang(Request $request, $id)
    {
        $data=ruang_sarpras::find($id);
            if ($request->hasFile('foto_gedung')) {
                $request->validate([
                    'foto_gedung' => ['image','mimes:jpeg,png,jpg,gif,svg']
                ]);
                if(isset($data->foto_gedung)){
                    Storage::delete($data->foto_gedung);
                }
                $foto = $request->file('foto_gedung');
                $path = $foto->store('public/sarpras');
                $foto_gedung = $path;
            } else {
                if(isset($data->foto_gedung)){
                    $foto_gedung = $data->foto_gedung;
                } else {
                    $foto_gedung = "";
                }
            }

                $data->nama_ruang=$request->get('nama_ruang');
                $data->kode_ruang=$request->get('kode_ruang');
                $data->panjang=$request->get('panjang');
                $data->lebar=$request->get('lebar');
                $data->nominal=$request->get('nominal');
                $data->foto_gedung=$foto_gedung;
                $data->keterangan=$request->get('keterangan');
                $data->perolehan=$request->get('perolehan');
                $data->tahun=$request->get('tahun');
                $data->milik=$request->get('milik');
                $data->save();
       
        return redirect()->back()->with('success', 'Berhasil Diubah');
    }

    public function hapus_ruang($id)
    {
        //
        $data=ruang_sarpras::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Berhasil Dihapus');
    }
    public function data_perawatan($id)
    {
        //
        return view('sarpras.data_perawatan',compact('id'));
    }
    public function json_perawatan($id)
    {
        //
        $data=perawatan_sarpras::where('sarpras_id','=',$id)->orderBy('id', 'DESC')->get();
        //dd($data->toArray());
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($user) {
                    return '
                    <button type="button" data-toggle="modal" data-target="#update'.$user->id.'" class="btn btn-primary">Update</button>
                        <div id="update'.$user->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 id="exampleModalLabel" class="modal-title">Perbaharui Data</h4>
                                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="'.route('sarpras.update_perawatan',$user->id).'" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                       
                                        <div class="form-group">
                                            <label>Tanggal *</label>
                                            <input type="date" value="'.$user->tanggal.'" name="tanggal" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan *</label>
                                            <input type="text" value="'.$user->ket.'" name="ket" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nominal *</label>
                                            <input type="number" value="'.$user->nominal.'" name="nominal" class="form-control" required>
                                        </div>
                                        <div class="form-group">       
                                            <input type="submit" value="Kirim" class="btn btn-primary">
                                        </div>
                                        </form>
                                    </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <button onclick="confirmDelete('.$user->id.')" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</button>
                        ';
                        // <a href="'.route('sarpras.hapus_ruang',$user->id).'" data-id="'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                })
                
                ->escapeColumns([])
                ->make(true);
    }

    public function input_perawatan(Request $request)
    {
        //
        $request->validate([
            'sarpras_id'=>['required'],
            'tanggal'=>['required'],
            'ket'=>['required'],
            'nominal'=>['required'],
          ]);
            perawatan_sarpras::create([
                'sarpras_id'=>$request->get('sarpras_id'),
                'tanggal'=>$request->get('tanggal'),
                'ket'=>$request->get('ket'),
                'nominal'=>$request->get('nominal'),
                'ttd1'=>$request->get('ttd1'),
                'ttd2'=>$request->get('ttd2'),
            ]);
        return redirect()->back()->with('success', 'Berhasil ditambahkan');
    }

    public function update_perawatan(Request $request, $id)
    {
            $data=perawatan_sarpras::find($id);
                $data->tanggal=$request->get('tanggal');
                $data->ket=$request->get('ket');
                $data->nominal=$request->get('nominal');
                $data->ttd1=$request->get('ttd1');
                $data->ttd2=$request->get('ttd2');
                $data->save();
       
        return redirect()->back()->with('success', 'Berhasil Diubah');
    }

    public function hapus_perawatan($id)
    {
        //
        $data=perawatan_sarpras::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Berhasil Dihapus');
    }
    
    public function scan_qr_code()
    {
        return view('sarpras.scanqrcode');
    }
    public function cek_barang(Request $request)
    {
        $qr=$request->get('qr');
        $cek=sarpras::where('kode_barang','=',$qr)->count();
        if ($cek!=0) {
            $data=sarpras::where('kode_barang','=',$qr)->first();
            return $data->toJson();
        }else{
            echo "QR tidak terdaftar";
        }
       
          exit;
    }
    public function cetak_all_unit()
    {
        # code...
        $data=sarpras::all();

        return view('sarpras.cetak_all_unit',compact('data'));
    }
    public function cetak_per_inputan($ruangan)
    {
        $data=sarpras::where('letak', $ruangan)->get();
        $ruangan_atas=sarpras::where('letak', $ruangan)->first();

        return view('sarpras.cetak_all_unit',compact('data','ruangan_atas'));
    }
    public function cetak_unit($id)
    {
        # code...
        $data=sarpras::with(['perawatan'])->where('id','=',$id)->find($id);
       //dd( $data->toArray());
        return view('sarpras.cetak_unit',compact('data'));
    }
    public function cetakqr($id)
    {
        $data=sarpras::find($id);
        return view ('qrCode',compact('data')); 
    }
}
