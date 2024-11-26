<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\mapel;
use App\ujian;
use App\log_ujian;
use App\krs;
use App\siswa;
use App\soal;
use App\User;
use App\Imports\SoalImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Auth;
class SoalController extends Controller
{
    public function data_soal($id)
    {
        $data=ujian::find($id);
        return view('guru.soal.data_soal',compact('id','data'));
    }
    public function json_soal($id)
    {
        $data=soal::with(['mapel','ujian'])->where('ujian_id','=',$id)->get();
        //dd($data->toArray());
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('soal_gambar', function ($user) {
                        $soal_gambar = "-";
                        if (isset($user->soal_gambar)) {
                            $soal_gambar = url('/').Storage::url($user->soal_gambar);
                            return ' <img src="'.$soal_gambar.'" style="max-width: 370px; max-height: 200px" alt="Preview Gambar">';
                        }
                        return '-';
                    })
                    ->addColumn('action', function ($user) {
                        $soal_gambar = "-";
                        if (isset($user->soal_gambar)) {
                            $soal_gambar = url('/').Storage::url($user->soal_gambar);
                        }
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
                                    <form action="'.route('soal.update_soal',$user->id).'" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                    <div class="form-group">
                                        <label>Soal*</label>
                                        <input type="hidden" name="mapel_id" value="{{$data->mapel_id}}" class="form-control" required>
                                        <input type="hidden" name="ujian_id" value="{{$data->id}}" class="form-control" required>
                                    <textarea name="soal_text" id="" cols="30" rows="10" class="form-control" required>'.$user->soal_text.'</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Soal Gambar</label><br>
                                        <input type="file" name="soal_gambar" id="gambar'.$user->id.'" accept="image/*">
                                        <div id="preview-container">
                                            <img id="preview-image'.$user->id.'" src="'.$soal_gambar.'" style="max-width: 370px; max-height: 200px" alt="Preview Gambar">
                                        </div>
                                    </div>
                                    <script>
                                            $(document).ready(function () {
                                                $("#gambar'.$user->id.'").change(function () {
                                                    previewImage'.$user->id.'(this);
                                                });
                                            });

                                            function previewImage'.$user->id.'(input) {
                                                var file'.$user->id.' = input.files[0];

                                                if (file'.$user->id.') {
                                                    // Tampilkan preview gambar
                                                    var reader'.$user->id.' = new FileReader();
                                                    reader'.$user->id.'.onload = function (e) {
                                                        $("#preview-image'.$user->id.'").attr("src", e.target.result);
                                                        $("#preview-image'.$user->id.'").show();
                                                    };
                                                    reader'.$user->id.'.readAsDataURL(file'.$user->id.');
                                                } else {
                                                    // Sembunyikan preview jika tidak ada gambar yang dipilih
                                                    $("#preview-image'.$user->id.'").hide();
                                                }
                                            }
                                        </script>
                                    <div class="form-group">
                                        <label>Jawaban A*</label>
                                        <input type="text" name="text_a" value="'.$user->text_a.'" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jawaban B*</label>
                                        <input type="text" name="text_b" value="'.$user->text_b.'" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jawaban C*</label>
                                        <input type="text" name="text_c" value="'.$user->text_c.'" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jawaban D*</label>
                                        <input type="text" name="text_d" value="'.$user->text_d.'" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jawaban E*</label>
                                        <input type="text" name="text_e" value="'.$user->text_e.'" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Skor*</label>
                                        <input type="text" name="skor" value="'.$user->skor.'" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Kunci Jawaban *</label>
                                        <select class="form-control" name="kunci" required>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
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
                        <a href="'.route('soal.delete_soal',$user->id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                        ';
                    })
                    
                    ->escapeColumns([])
                    ->make(true);
    }
    public function input_soal(Request $request)
    {
        $request->validate([
            'mapel_id'=>['required'],
          ]);
          if ($request->hasFile('soal_gambar')) {
            $soal_gambar = $request->file('soal_gambar');
            $path_soal_gambar = $soal_gambar->store('public/gambar_soal');
            // $data->soal_gambar=$path_soal_gambar;
            // Storage::delete($data->soal_gambar);
            soal::create([
                  'mapel_id'=> $request->get('mapel_id'),
                  'ujian_id'=> $request->get('ujian_id'),
                  'soal_text'=> $request->get('soal_text'),
                  'soal_gambar'=> $path_soal_gambar,
                  'text_a'=> $request->get('text_a'),
                  'text_b'=> $request->get('text_b'),
                  'text_c'=> $request->get('text_c'),
                  'text_d'=> $request->get('text_d'),
                  'text_e'=> $request->get('text_e'),
                  'kunci'=> $request->get('kunci'),
                  'tipe'=> $request->get('tipe'),
                  'skor'=> $request->get('skor'),
            ]);
            } else {
            soal::create([
                'mapel_id'=> $request->get('mapel_id'),
                'ujian_id'=> $request->get('ujian_id'),
                'soal_text'=> $request->get('soal_text'),
                'text_a'=> $request->get('text_a'),
                'text_b'=> $request->get('text_b'),
                'text_c'=> $request->get('text_c'),
                'text_d'=> $request->get('text_d'),
                'text_e'=> $request->get('text_e'),
                'kunci'=> $request->get('kunci'),
                'tipe'=> $request->get('tipe'),
                'skor'=> $request->get('skor'),
                ]);
            }

        return redirect()->back()->with('success', 'Berhasil ditambah');
    }
    public function update_soal(Request $request, $id)
    {
        $data=soal::find($id);
        if ($request->hasFile('soal_gambar')) {
            $soal_gambar = $request->file('soal_gambar');
            $path_soal_gambar = $soal_gambar->store('public/gambar_soal');
            Storage::delete($data->soal_gambar);
            $data->soal_gambar=$path_soal_gambar;
            }
        $data->soal_text = $request->get('soal_text');
        $data->text_a = $request->get('text_a');
        $data->text_b = $request->get('text_b');
        $data->text_c = $request->get('text_c');
        $data->text_d = $request->get('text_d');
        $data->text_e = $request->get('text_e');
        $data->kunci = $request->get('kunci');
        $data->skor = $request->get('skor');
        $data->save();
        return redirect()->back()->with('success', 'Berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_soal($id)
    {
        $data=soal::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Berhasil dihapus');
    }
    public function delete_soalbyujian($id)
    {
        $data=soal::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Berhasil dihapus');
    }
    public function import_soal(Request $request)
    {
        $this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
            $ujian_id=$request->get('ujian_id');
            $mapel_id=$request->get('mapel_id');
        // menangkap file excel
        // dd($mapel_id);
        $uploaded = $request->file('file');
            $nama_file=$uploaded->getClientOriginalName();
            $path = $uploaded->store('public/soal');
		//dd($path);
 
		// import data
		Excel::import(new Soalimport($ujian_id,$mapel_id), $path);
 
		return redirect()->back()->with('success', 'Berhasil Menambahkan');
    }
    public function data_soal_siswa($id)
    {
        $data=ujian::find($id);
        return view('siswa.soal.data_soal',compact('id','data'));
    }
    public function json_soal_siswa($id)
    {
        $data=soal::with(['mapel','ujian'])->where('ujian_id','=',$id)->get();
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
                                    <form action="'.route('soal.update_soal',$user->id).'" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                    <div class="form-group">
                                        <label>Soal*</label>
                                        <input type="hidden" name="mapel_id" value="{{$data->mapel_id}}" class="form-control" required>
                                        <input type="hidden" name="ujian_id" value="{{$data->id}}" class="form-control" required>
                                    <textarea name="soal_text" id="" cols="30" rows="10" class="form-control" required>'.$user->soal_text.'</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Jawaban A*</label>
                                        <input type="text" name="text_a" value="'.$user->text_a.'" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jawaban B*</label>
                                        <input type="text" name="text_b" value="'.$user->text_b.'" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jawaban C*</label>
                                        <input type="text" name="text_c" value="'.$user->text_c.'" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jawaban D*</label>
                                        <input type="text" name="text_d" value="'.$user->text_d.'" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jawaban E*</label>
                                        <input type="text" name="text_e" value="'.$user->text_e.'" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Kunci Jawaban *</label>
                                        <select class="form-control" name="kunci" required>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
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
                        <a href="'.route('soal.delete_soal',$user->id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                        ';
                    })
                    
                    ->escapeColumns([])
                    ->make(true);
    }
    public function soal_ujian($id)
    {
        date_default_timezone_set("Asia/Bangkok");
      
        $ujian_id=$id;
        $ujian=ujian::with(['mapel'])->find($ujian_id);
        $kelas_id=$ujian->mapel->kelas_id;
        $mapel_id=$ujian->mapel->id;
        $waktu_mulai=date('Y-m-d H:i:s');
        $waktu_berakhir=date('Y-m-d H:i:s',strtotime('+00 hour +'.$ujian->durasi.' minutes +00 seconds'));
        //  dd($waktu_mulai."-".$waktu_berakhir);
        $user_id=Auth::User()->id;
        $siswa_id=siswa::where('user_id','=',$user_id)->first();
        $krs=krs::where('kelas_id','=',$kelas_id)->where('siswa_id','=',$siswa_id->id)->first();
        $krs_id=$krs->id;
        $soal_ganda=soal::where('ujian_id','=',$id)->where('tipe','=','GANDA')->inRandomOrder()->get();
        $soal_uraian=soal::where('ujian_id','=',$id)->where('tipe','=','URAIAN')->inRandomOrder()->get();
        //dd($data->toArray());
        $log=log_ujian::where('siswa_id','=',$siswa_id->id)->where('ujian_id','=',$id)->count();
        // dd($log);
        if ($ujian->status=="AKTIF") {
            if ($log!=0) {
                return redirect()->back()->with('gagal', 'Anda Telah Selesai Mengerjakan');
            }else{
                return view('siswa.soal.soal_ujian',compact('soal_ganda','soal_uraian','ujian_id','siswa_id','ujian','waktu_mulai','waktu_berakhir','kelas_id','mapel_id','krs_id'));
            }
        }else{
		return redirect()->back()->with('gagal', 'Ujian Tidak Aktif');
        }
    }
    public function selesai_ujian($ujian_id,$siswa_id,$waktu_mulai)
    {
        date_default_timezone_set("Asia/Bangkok");
        $cek=log_ujian::where('siswa_id','=',$siswa_id)->where('ujian_id','=',$ujian_id)->count();
        $tanggal=date($waktu_mulai);
        $sekarang=date('Y-m-d H:i:s');
        $to = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $sekarang);
        $from = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $tanggal);
        $durasi = $to->diff($from)->format('%H:%I:%S');;
        // $durasi=$sekarang->diffInDays($tanggal);
        // dd($durasi);
        if ($cek==0) {
            log_ujian::create([
                'siswa_id' => $siswa_id,
                'ujian_id' => $ujian_id,
                'status' => $durasi,
            ]);
        }
        return redirect()->route('siswa')->with('success', 'Terimakasih');
    }
}
