<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\log_ujian;
use App\ujian;
class PengawasController extends Controller
{
    public function ujian($id)
    {
        $ujian=log_ujian::with(['ujian','siswa'=>function ($query) use ($id)
        {
            $query->with(['nilai'=>function ($query) use ($id){
                $query->where('ujian_id','=',$id);
            }]);
        }])->where('ujian_id','=',$id)->get();
        $data=ujian::with(['mapel'])->find($id);
        // dd($ujian->toArray());
        return view('ujian',compact('ujian','data'));
    }
    public function ujian_view()
    {
        return view('cek_ujian');
    }
    public function cek_ujian(Request $request)
    {
        $request->validate([
            'kode'=>['required'],
          ]);
          $kode=$request->get('kode');
          return redirect()->route('ujian',$kode)->with('success', '');
    }
}
