<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
Use App\siswa;
use App\User;
use App\jurusan;
use App\p_bukti_tf;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Nexmo\Laravel\Facade\Nexmo;
class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('registrasi');
    }
    public function kirim()
    {
        Nexmo::message()->send([
            'to'   => '6285204945545',
            'from' => 'saya',
            'text' => 'Cobae.'
        ]);
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
    public function store(Request $request)
    {
        //
        $nisn=$request->get('username');
        $no=$request->get('no_hp');
        $isi_pesan="Terimaksih Sudah Mendaftar Di SMKS IBNU CHOLIL Username : ".$nisn." Password : ibnucholil";
        $no_hp="62".($no+0);
        //dd($no_hp);
        $tahun=date('Y');
        $request->validate([
            'username'=>['required','unique:users'],
            'no_hp'=>['required','unique:siswas'],
          ]);
          
            $path = "belum";
            $role_id=3;
            $user_id = User::insertGetId([
                'name' => $request->get('nama'), 
                'username' => $request->get('username'), 
                'password'=>Hash::make("ibnucholil"), 
                'role_id'=> $role_id, 
                'pic'=> $path,
                'status'=> "ibnucholil",
            ]);
            siswa::create([
                    'nisn' => $request->get('username'), 
                    'nama_lengkap' => $request->get('nama'), 
                    'pic'=>$path,
                    'jk'=> $request->get('jk'), 
                    'no_hp'=> $request->get('no_hp'),
                    'user_id'=> $user_id,
                ]);
                
                
                // Nexmo::message()->send([
                //     'to'   => $no_hp,
                //     'from' => 'saya',
                //     'text' => $isi_pesan
                // ]);
                $username=$request->get('username');
                $password="ibnucholil";
                $user_cek=User::where('username','=',$username)->count();
                if ($user_cek==0) {
                   return redirect('/login')->with('gagal', 'username Anda Tidak Terdaftar');
                }else{
                   $user=User::where('username','=',$username)->first();
                   $p_asli=$password;
                   $p_hash=$user->password;
                   //dd(Hash::check($p_asli, $p_hash));
                   $cek=Hash::check($p_asli, $p_hash);
                       if ($cek) {
                           Auth::guard('web')->loginUsingId($user->id);
                               //dd($role->role);
                              if ($user->role_id==3) {
                                 return redirect('/pendaftar')->with('success', 'Berhasil Mendaftar');
                              }else{
                               return redirect('/login')->with('gagal', 'Akun Belum siap!');
                           }
                       }else{
                           return redirect('/login')->with('gagal', 'Password Anda Salah');
                       }
                }
          
    }
    public function form_password()
    {
        return view('pendaftar.ganti_password');
    }
    public function pendaftar_beranda()
    {
        $user_id=Auth::User()->id;
        $data=siswa::where('user_id','=',$user_id)->first();
        return view('pendaftar.index',compact('data'));
    }
    public function bukti_tf(Request $request)
    {
        if ($request->hasFile('pic')) {
            $request->validate([
                'pic' => ['image','mimes:jpeg,png,jpg,gif,svg']
              ]);
            $foto = $request->file('pic');
            $path = $foto->store('public/buti_tf');
            $user_id=Auth::User()->id;
            p_bukti_tf::create([
                'user_id' => $user_id,
                'jumlah_tf' => $request->get('jumlah_tf'),
                'pic'=> $path,
                'v_status'=> "Pending",
            ]);
            return redirect()->back()->with('success', 'Berhasil kirim bukti tranfer');
        }
    }
}
