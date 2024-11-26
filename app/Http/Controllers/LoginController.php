<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
Use Auth;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
   public function masuk(Request $request)
    {

        // request()->validate([
        // 'g-recaptcha-response' => 'required|captcha',
        // ]);
        
        $request->validate([
            'username'=>['required'],
            'password'=>['required']
          ]);
         $username=$request->get('username');
         $password=$request->get('password');
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
                       if ($user->role_id==1) {
                          return redirect('/admin')->with('success', 'Berhasil Masuk');
                       }else if ($user->role_id==2) {
                        return redirect('/siswa')->with('success', 'Berhasil Masuk');
                     }else if ($user->role_id==3) {
                        return redirect('/pendaftar')->with('success', 'Berhasil Masuk');
                     }else if ($user->role_id==4) {
                        return redirect('/guru')->with('success', 'Berhasil Masuk');
                     }else if ($user->role_id==5) {
                        return redirect('/sarpras')->with('success', 'Berhasil Masuk');
                     }else if ($user->role_id==6) {
                        return redirect('/perpustakaan')->with('success', 'Berhasil Masuk');
                     }else if ($user->role_id==7) {
                        return redirect('/bendahara')->with('success', 'Berhasil Masuk');
                     }else{
                        return redirect('/login')->with('gagal', 'Anda Buka Siapa Siapa!');
                    }
                }else{
                    return redirect('/login')->with('gagal', 'Password Anda Salah');
                }
         }
    }
    public function keluar()
    {
        if (Auth::guard('web')->check()) {
            # code...
            Auth::guard('web','roles')->logout();
            return redirect('/login');
        }else{
            return redirect('/login');
        }
    }
}
