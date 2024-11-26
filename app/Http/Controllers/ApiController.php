<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Auth;
use App\User;
use App\mapel;
use App\kelas;
use App\pp_buku;
class ApiController extends Controller
{
    public function alluser(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data=User::where('name','LIKE','%'.$cari.'%')->get();
            return response()->json($data);
        }
    
    }
    public function guru(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data=User::where('role_id','=',4)->where('name','LIKE','%'.$cari.'%')->get();
            return response()->json($data);
        }
    
    }
    public function siswa(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data=User::where('role_id','=',2)->where('name','LIKE','%'.$cari.'%')->get();
            return response()->json($data);
        }
    
    }
    public function allmapel(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data=mapel::where('nama_mapel','LIKE','%'.$cari.'%')->get();
            return response()->json($data);
        }
    
    }
    public function mapeljurusan(Request $request,$jurusan)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data=mapel::where('jurusan_id','=',$jurusan)->where('nama_mapel','LIKE','%'.$cari.'%')->get();
            return response()->json($data);
        }
    
    }
    public function mapelkelas(Request $request,$kelas)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data=mapel::where('kelas_id','=',$kelas)->where('nama_mapel','LIKE','%'.$cari.'%')->get();
            return response()->json($data);
        }
    
    }
    public function mapelguru(Request $request,$guru)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data=mapel::where('guru_id','=',$guru)->where('nama_mapel','LIKE','%'.$cari.'%')->get();
            return response()->json($data);
        }
    
    }
    public function allkelas(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data=kelas::where('kelas','LIKE','%'.$cari.'%')->get();
            return response()->json($data);
        }
    
    }
    
    public function kelasjurusan(Request $request,$jurusan)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data=kelas::where('jurusan_id','=',$jurusan)->where('kelas','LIKE','%'.$cari.'%')->get();
            return response()->json($data);
        }
    
    }

    public function kelasguru(Request $request,$guru)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data=kelas::where('guru_id','=',$guru)->where('kelas','LIKE','%'.$cari.'%')->get();
            return response()->json($data);
        }
    
    }

    public function buku(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data=pp_buku::where('judul','LIKE','%'.$cari.'%')->get();
            return response()->json($data);
        }
    
    }
}
