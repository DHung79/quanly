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
            if($user->level == 1||$user->level == 2){
                return $next($request);
            }if($user->level == 3){
                $iduser = $user->id;
                $dangkydetai = detai::join('users','users.id', 'detais.idtacgia')
                ->where('idtacgia',$iduser)->first();
                if(isset($dangkydetai)){
                    return $next($request);
                }else{
                    return redirect()->route('getdkdetai');
                }
            }
        }
    }
}