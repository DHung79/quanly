<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use App\sinhvien;
use App\giangvien;
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
            
            if($user->level == 1){
                return $next($request);
            }
            if($user->level == 3 || $user->level == 2){
                if($user->level == 3){
                    $sinhvien = sinhvien::where('idusers',$iduser)->first();
                    $daduyet = detai::join('users','users.id', 'detais.idtacgia')
                    ->where('idtacgia',$iduser)->first();
                }
                if($user->level == 2){
                    $giangvien = giangvien::where('idusers',$iduser)->first();
                    $daduyet = detai::join('users','users.id', 'detais.idtacgia')
                    ->where('idtacgia',$iduser)->first();
                }
                if(!isset($daduyet)){
                    return $next($request);
                }else{
                    if($daduyet->daduyet == 0){
                        return $next($request);
                    }if($daduyet->daduyet == 1){
                        return redirect()->route('userdetai',['id'=>$iduser]);
                    }
                }
            }
        }else
            {
                return redirect('login');
            }
    }
}
