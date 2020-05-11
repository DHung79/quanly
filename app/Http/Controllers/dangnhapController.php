<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Session;
use Auth;
use App\User;
use App\giangvien;
use App\sinhvien;
use App\khoa;
use App\lop;
use App\detai;

class dangnhapController extends Controller
{
    function __construct() { 
        $lop = lop::get();
        $giangvien = giangvien::get();
        $khoa = khoa::get();
        view::share('lop',$lop);
        view::share('giangvien',$giangvien);
        view::share('khoa',$khoa);
    }

    public function getLogin(){
        return view('dangnhap');
    }

    public function login(Request $request){
        $this->validate($request,[
        'email' =>'required|email',
        'password' => 'required|min:6'
        ],[
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu chứa ít nhất 6 ký tự',
        ]);
        $email = $request->email;
        $password = $request->password;
        if(Auth::attempt(['email'=>$email,'password'=>$password])){
            if(Auth::user()->level == 1){
                return redirect()->route('quanly');
            }
            else{
                return redirect('home');
            }
        }else {
            return redirect()->back()->with('status', 'email hoặc password không chính xác');
        }
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('getlogin');
    }

}




