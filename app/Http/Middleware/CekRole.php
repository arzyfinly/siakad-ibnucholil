<?php

namespace App\Http\Middleware;

use Closure;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
         $roles = $this->CekRoute($request->route());
        $req_cek=$request->user();
        //dd($req_cek);
        if ($req_cek!=null) {
            if( $request->user()->hasRole($roles) || !$roles)
                {
                    return $next($request);
                }
        }
       
        return redirect('/login')->with('gagal', 'Silahkan login kembali');
    }
    private function CekRoute($route)
    {
        $actions = $route->getAction();
        return isset($actions['roles']) ? $actions['roles'] : null;
    }
}
