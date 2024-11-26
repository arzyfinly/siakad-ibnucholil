<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\krs;
use App\mapel;
use App\ujian;
use App\soal;
use App\siswa;
use Auth;
use DataTables;
use App\nilai_pengetahuan;
use App\nilai_keterampilan;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Generator;
class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id=Auth::User()->id;
        $data=siswa::where('user_id','=',$user_id)->first();
        return view('siswa.index',compact('data'));
    }
    public function data_pribadi()
    {
        $user_id=Auth::User()->id;
        $data=siswa::where('user_id','=',$user_id)->first();
        return view('siswa.data_pribadi',compact('data'));
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
    public function update_foto(Request $request, $id)
    {
        $request->validate([
            'pic' => ['image','mimes:jpeg,png,jpg,gif,svg']
          ]);
        $data=siswa::find($id);
        if ($request->hasFile('pic')) {
            $foto = $request->file('pic');
            $path = $foto->store('public/profile');
            Storage::delete($data->pic);
            $data->pic=$path;
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
    public function data_sekolah()
    {
        $user_id=Auth::User()->id;
        $data=siswa::where('user_id','=',$user_id)->first();
        return view('siswa.data_sekolah',compact('data'));
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
    public function data_jurusan_siswa()
    {
        $user_id=Auth::User()->id;
        $data=siswa::where('user_id','=',$user_id)->first();
        return view('siswa.data_jurusan',compact('data'));
    }
    public function update_pilihan_jurusan(Request $request, $id)
    {
        $data=siswa::find($id); 
        $data->pilihan_jurusan = $request->get('pilihan_jurusan');
        $data->ukuran_baju = $request->get('ukuran_baju');
        $data->save();
        return redirect()->back()->with('success', 'Berhasil pilih jurusan');
    }
    public function data_ayah()
    {
        $user_id=Auth::User()->id;
        $data=siswa::where('user_id','=',$user_id)->first();
        return view('siswa.data_ayah',compact('data'));
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
    public function data_ibu()
    {
        $user_id=Auth::User()->id;
        $data=siswa::where('user_id','=',$user_id)->first();
        return view('siswa.data_ibu',compact('data'));
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
    public function data_wali()
    {
        $user_id=Auth::User()->id;
        $data=siswa::where('user_id','=',$user_id)->first();
        return view('siswa.data_wali',compact('data'));
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
    
    
    public function ganti_password(Request $request, $id)
    {
        $id=Auth::User()->id;
        $data=User::find($id);
             $data->password = $request->get('password');
             $data->status = $request->get('password');
             $data->save();
            return redirect()->back()->with('success', 'Berhasil ganti password');
    }
    public function form_password()
    {
        return view('admin.ganti_password');
    }
    public function form_password_siswa()
    {
        return view('siswa.ganti_password');
    }

    public function nilai_pengetahuan()
    {
        return view('siswa.nilai_pengetahuan');
    }
    public function json_nilai_pengetahuan()
    {
        $user_id=Auth::User()->id;
        $siswa=siswa::where('user_id','=',$user_id)->first();
        //dd($data->toArray());
        $data=nilai_pengetahuan::with(['kelas','mapel'])->where('siswa_id','=',$siswa->id)->get();
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('mapel', function ($user) {
                        return $user->mapel->nama_mapel;
                        
                    })
                    ->addColumn('kelas', function ($user) {
                        return $user->kelas->kelas;
                    })
                    ->escapeColumns([])
                    ->make(true);
    }
    public function nilai_keterampilan()
    {
        # code...
        return view('siswa.nilai_keterampilan');
    }
    public function json_nilai_keterampilan()
    {
        
        $user_id=Auth::User()->id;
        $siswa=siswa::where('user_id','=',$user_id)->first();
        //dd($data->toArray());
        $data=nilai_keterampilan::with(['kelas','mapel'])->where('siswa_id','=',$siswa->id)->get();
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('mapel', function ($user) {
                        return $user->mapel->nama_mapel;
                        
                    })
                    ->addColumn('kelas', function ($user) {
                        return $user->kelas->kelas;
                    })
                    ->escapeColumns([])
                    ->make(true);
    }
    public function data_kelas()
    {
        return view('siswa.data_kelas');
    }
    public function json_kelas()
    {
        $user_id=Auth::User()->id;
        $siswa=siswa::where('user_id','=',$user_id)->first();
        $data=krs::with(['kelas'])->where('siswa_id','=',$siswa->id)->groupBy('tahun')->get();
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('kelas', function ($user) {
                        return $user->kelas->kelas;
                    })
                    ->addColumn('mapel', function ($user) {
                        return '
                        <a href="'.route('siswa.data_mapel',[$user->kelas_id, "GANJIL"]).'" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i>Mapel Ganjil</a>
                        <a href="'.route('siswa.data_mapel',[$user->kelas_id, "GENAP"]).'" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i>Mapel Genap</a>
                        ';
                    })
                    ->escapeColumns([])
                    ->make(true);
    }
    public function data_mapel($id, $semester)
    {
        return view('siswa.data_mapel',compact('id','semester'));
    }
    public function json_mapel($id, $semester)
    {
        $data=mapel::where('kelas_id','=',$id)->where('semester',$semester)->get();
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('ujian', function ($user) {
                        return '
                        <a href="'.route('ujian.data_ujian_siswa',$user->id).'" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i>Ujian</a>
                        ';
                    })
                    ->escapeColumns([])
                    ->make(true);
    }
    public function cetak_all_idcard()
    {
        $data=siswa::select('nama_lengkap','tempat_lahir','tanggal_lahir','alamat','pilihan_jurusan','nis','nisn','pic')
                    ->get();
        // dd($data->toArray());
        return view('siswa.cetak_idcard',compact('data'));
    }
    public function cetak_idcard_multi(Request $request)
    {
        # code...
        $data=siswa::select('nama_lengkap','tempat_lahir','tanggal_lahir','alamat','pilihan_jurusan','nis','nisn','pic')
                    ->limit('3')
                    ->get();
        return view('siswa.cetak_idcard',compact('data'));
    }
    public function cetak_idcard($id)
    {
        # code...
        $data=siswa::select('nama_lengkap','tempat_lahir','tanggal_lahir','alamat','pilihan_jurusan','nis','nisn','pic')
                        ->where('id','=',$id)
                        ->get();
        return view('siswa.cetak_idcard',compact('data'));
    }
    public function data_skl_siswa()
    {
        $user_id=Auth::User()->id;
        $data=siswa::where('user_id', $user_id)->first();
        return view('siswa.skl_siswa',compact('data'));
    }
    
}
