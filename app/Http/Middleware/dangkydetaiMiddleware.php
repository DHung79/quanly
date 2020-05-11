<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use App\sinhvien;
use App\detai;

use Closure;

class dangkydetaiMiddleware
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
        if(Auth::check())
        {
            $user = Auth::user();
            $iduser = $user->id;
            
            if($user->level == 1||$user->level == 2){
                return $next($request);
            }if($user->level == 3){
                $sinhvien = sinhvien::where('idusers',$iduser)->first();
                $idsinhvien = $sinhvien->id;
                $daduyet = sinhvien::join('detais','detais.idsinhvien', 'sinhvien.id')
                ->where('idsinhvien',$idsinhvien)->first();
                if(!isset($daduyet)){
                    return $next($request);
                }else{
                    if($daduyet->daduyet == 0){
                        return $next($request);
                    }if($daduyet->daduyet == 1){
                        return redirect()->route('userdetai',['id'=>$sinhvien->id]);
                    }
                }
                
            }
        }else
            {
                return redirect('login');
            }
    }
}
