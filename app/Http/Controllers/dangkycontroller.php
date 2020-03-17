<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;
use App\User;
use App\giangvien;
use App\bangcaps;
use App\sinhvien;
use App\khoa;
use App\lop;
use app\detai;

class dangkycontroller extends Controller
{
    public function getRegister(){
        $lop = lop::get();
        $giangvien = giangvien::get();
    	return view('dangky',['lop'=>$lop,'giangvien'=>$giangvien]);
    }

    public function Register(Request $request){
        $this->validate($request,[
            'ho'=> 'required',
            'ten'=> 'required',
            'sodt'=>'numeric',
            'password'=> 'required|min:6|max:32',
            'email'=>'required|email|unique:users,email'
        ],[
            'ho.required'=>'Bạn chưa nhập họ',
            'ten.required'=>'Bạn chưa nhập tên',
            'sodt.numeric'=>'Số điện thoại phải là một dãy số',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min:6'=>'Mật khẩu phải chứa nhiều hơn 6 ký tự và ít hơn 32 ký tự',
            'password.max:32'=>'Mật khẩu phải chứa nhiều hơn 6 ký tự và ít hơn 32 ký tự',
            'email.required'=>'Bạn chưa nhập email',
            'email.email'=>'Email không đúng định dạng',
            'email.unique'=>'Email của bạn đã có người đăng ký'
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
        $sv->gioitinh = $request->giotinh;
        $sv->ngaysinh = $request->ngaysinh;
        $sv->quequan = $request->quequan;
        $sv->diachi = $request->diachi;
        $sv->sodt = $request->sodt;
        $sv->save();
        $email = $request->email;
        $password = $request->password;
        if(Auth::attempt(['email'=>$email,'password'=>$password])){
            return redirect('admin');
        }else {
            return redirect()->back()->with('status', 'Xãy ra lỗi trong quá trình đăng ký');
        }
    }

    public function getaddadmin(){
        $bangcap = bangcaps::get();
        $khoa = khoa::get();
    	return view('addadmin',['khoa'=>$khoa,'bangcap'=>$bangcap]);
    }

    public function addadmin(Request $request){
        $this->validate($request,[
            'ho'=> 'required',
            'ten'=> 'required',
            'password'=> 'required|min:6|max:32',
            'email'=>'required|email|unique:users,email',
            // 'idkhoa'=>'required',
            // 'level'=>'required'
        ],[
            'ho.required'=>'Bạn chưa nhập họ',
            'ten.required'=>'Bạn chưa nhập tên',
            'password.required'=>'Chưa nhập mật khẩu',
            'password.min:6'=>'Mật khẩu phải chứa nhiều hơn 6 ký tự và ít hơn 32 ký tự',
            'password.max:32'=>'Mật khẩu phải chứa nhiều hơn 6 ký tự và ít hơn 32 ký tự',
            'email.required'=>'Chưa nhập email',
            'email.email'=>'Email không đúng định dạng',
            'email.unique'=>'Email đã có người đăng ký',
            // 'idkhoa.required'=>'Chưa chọn khoa ',
            // 'level.required'=>'Chưa chọn cấp'
        ]);
        $user = new User;
        $user->password = bcrypt($request->password);
        $user->email= $request->email;
        $user->level= 2;
        $user->save();
        $gv = new giangvien;
        $gv->ho = $request->ho;
        $gv->ten = $request->ten;
        $gv->idusers = $user->id;
        $gv->gioitinh = $request->giotinh;
        $gv->idkhoa = $request->khoa;
        $gv->idcap = $request->cap;
        $gv->ngaysinh = $request->ngaysinh;
        $gv->quequan = $request->quequan;
        $gv->diachi = $request->diachi;
        $gv->sodt = $request->sodt;
        $gv->save();

        return redirect('addadmin')->with('status','Thêm admin Thành Công');
    }
    
}
