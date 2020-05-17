<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use App\sinhvien;
use App\detai;

use Closure;

class detaiMiddleware
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
        if(Auth::check()){
            $user = Auth::user();
            $iduser = $user->id;
            $sinhvien = sinhvien::where('idusers',$iduser)->first();
            $idsinhvien = $sinhvien->id;
            $dangkydetai = sinhvien::join('detais','detais.idsinhvien', 'sinhvien.id')
            ->where('idsinhvien',$idsinhvien)->first();
            if(isset($dangkydetai)){
                return $next($request);
            }else{
                return redirect()->route('getdkdetai');
            }
        }
    }
}