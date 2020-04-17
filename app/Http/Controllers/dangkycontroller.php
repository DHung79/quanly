<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Session;
use App\User;
use App\giangvien;
use App\sinhvien;
use App\khoa;
use App\lop;
use app\detai;

class dangkycontroller extends Controller
{
    function __construct() { 
        $lop = lop::get();
        $giangvien = giangvien::get();
        $khoa = khoa::get();
        view::share('lop',$lop);
        view::share('giangvien',$giangvien);
        view::share('khoa',$khoa);
    }
    public function getRegister(){
        return view('dangky');
    }

    public function Register(Request $request){
        $this->validate($request,[
            'ho'        => 'required',
            'ten'       => 'required',
            'email'     =>'required|email|unique:users,email',
            'password'  => 'required|min:6|max:32',
            'ngaysinh'  => 'required',
            'gioitinh'  => 'required',
            'lop'       => 'required',
            'sodt'      =>'numeric',
            'quequan'   => 'required',
            'diachi'    => 'required'
        ],[
            'ho.required'=>'Bạn chưa nhập họ',
            'ten.required'=>'Bạn chưa nhập tên',
            'email.required'=>'Bạn chưa nhập email',
            'email.email'=>'Email không đúng định dạng',
            'email.unique'=>'Email của bạn đã có người đăng ký',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min:6'=>'Mật khẩu phải chứa nhiều hơn 6 ký tự và ít hơn 32 ký tự',
            'password.max:32'=>'Mật khẩu phải chứa nhiều hơn 6 ký tự và ít hơn 32 ký tự',
            'ngaysinh.required'=>'Bạn chưa nhập ngày sinh',
            'gioitinh.required'=>'Bạn chưa nhập giới tính',
            'lop.required'=>'Bạn chưa nhập lớp',
            'sodt.numeric'=>'Số điện thoại phải là một dãy số',
            'quequan.required'=>'Bạn chưa nhập quê quán',
            'diachi.required'=>'Bạn chưa nhập địa chỉ',
        ]);
        $user = new User;
        $user->password = bcrypt($request->password);
        $user->email= $request->email;
        $user->level= 3;
        $user->save();
        $sv = new sinhvien;
        $sv->idusers = $user->id;
        $sv->idlop = $request->lop;
        $sv->ho = $request->ho;
        $sv->ten = $request->ten;
        $sv->gioitinh = $request->gioitinh;
        $sv->ngaysinh = $request->ngaysinh;
        $sv->quequan = $request->quequan;
        $sv->diachi = $request->diachi;
        $sv->sodt = $request->sodt;
        $sv->save();
        $email = $request->email;
        $password = $request->password;
        if(Auth::attempt(['email'=>$email,'password'=>$password])){
            return redirect()->route('home');
        }else {
            return redirect()->back()->with('status', 'Xãy ra lỗi trong quá trình đăng ký');
        }
    }

    public function getaddadmin(){
    	return view('addadmin');
    }

    public function addadmin(Request $request){
        $this->validate($request,[
            'email'=>'required|email|unique:users,email',
            'password'=> 'required|min:6|max:32',
            'level'=> 'required',
        ],[
            'email.required'=>'Chưa nhập email',
            'email.email'=>'Email không đúng định dạng',
            'email.unique'=>'Email đã có người đăng ký',
            'password.required'=>'Chưa nhập mật khẩu',
            'password.min:6'=>'Mật khẩu phải chứa nhiều hơn 6 ký tự và ít hơn 32 ký tự',
            'password.max:32'=>'Mật khẩu phải chứa nhiều hơn 6 ký tự và ít hơn 32 ký tự',
            'level.required'=>'Bạn chưa nhập cấp'
        ]);
        $user = new User;
        $user->email= $request->email;
        $user->password = bcrypt($request->password);
        $user->level= $request->level;
        $user->save();
        if($user->save()){
            return redirect()->back()->with('status','Đã thêm thành công');
        }else{
            return redirect()->back()->with('status', 'Xãy ra lỗi trong quá trình thêm người dùng');
        }
    }   
}
