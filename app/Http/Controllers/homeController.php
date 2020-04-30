<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Routing\Controller;
use App\Repositories\UserRepository;
use Session;
use Auth;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\giangvien;
use App\sinhvien;
use App\khoa;
use App\lop;
use App\detai;
class homeController extends sharecontroller
{
    function __construct() { 
        view::share('stt','1');

        $detai = detai::get();
        view::share('detai',$detai);

        $user = user::get();
        view::share('user',$user);

        $danhsachdt = detai::join('sinhvien','sinhvien.id','detais.idsinhvien')
        ->where('daduyet','1')->where('thamkhao','0')->get();
        view::share('danhsachdt',$danhsachdt);

        $thamkhao = detai::where('thamkhao','1')->get();
        view::share('thamkhao',$thamkhao);

        $duyet = sinhvien::join('detais','detais.idsinhvien', 'sinhvien.id')
        ->where('daduyet','0')->where('thamkhao','0')->get();
        view::share('duyet',$duyet);

        $gvlist = giangvien::get();
        view::share('gvlist',$gvlist);

        $svlist = sinhvien::get();
        view::share('svlist',$svlist);
        
        // $this->middleware('auth')->except('logout');
        // if(auth::check()){
        $this->middleware(function ($request, $next) {
        $this->id = Auth::user();
        if($this->id!=null){
            $id = Auth::user()->id;
            $sinhvien = sinhvien::where('idusers',$id)->get();
            $giangvien = giangvien::where('idusers',$id)->get();    
            view::share('sinhvien',$sinhvien);
            view::share('giangvien',$giangvien);
            view::share('iduser',$id);
            $dkdt = detai::join('sinhvien','sinhvien.id', 'detais.idsinhvien')
            ->where('idusers',$id)->get();
            view::share('dkdt',$dkdt); 
            return $next($request);
        }else{
            return $next($request);
        }
    });
    }
    public function gethome(){
        return view('pages.home');
    }
    //Trang cá nhân//
    public function infor(){
        if(Auth::check())
        {   
            return view('pages.inforuser');
        }
    }
    //Đề tài sinh viên
    public function userdetai($id){
        $detai = detai::where('idsinhvien',$id)->first();
        $idedit = sinhvien::find($id)->idusers;
        return view('pages.inforuser',['detai'=>$detai,'idedit'=>$idedit]);
    }
    //Chỉnh sửa đề tài sinh viên
    public function editdetai(Request $request){
        $detai = detai::find($request->id);
        $idsv = $detai->idsinhvien;
        if($detai->tendetai == $request->tendetai){
            $this->validate($request,[
                'tendetai'=>'required',
                'tomtat'=>'required',
                'noidung'=>'required'
            ],[
                'tendetai.required'=>'Chưa nhập tên đề tài',
                'tomtat.required'=>'Chưa nhập tóm tắt',
                'noidung.required'=>'Chưa nhập nội dung'
            ]);
        }else{
            $this->validate($request,[
                'tendetai'=>'required|unique:detais,tendetai',
                'tomtat'=>'required',
                'noidung'=>'required'
            ],[
                'tendetai.required'=>'Chưa nhập tên đề tài',
                'tendetai.unique'=>'Đề tài đã tồn tại',
                'tomtat.required'=>'Chưa nhập tóm tắt',
                'noidung.required'=>'Chưa nhập nội dung'
            ]);
        }
        $detai->tendetai = $request->tendetai;
        $detai->tomtat = $request->tomtat;
        $detai->noidung = $request->noidung;
        $detai->save();
        if($detai->save()){
            return redirect()->route('userdetai',['id'=>$idsv])->with('status','Đã sửa thành công');
        } else{
            return redirect()->route('userdetai',['id'=>$idsv])
            ->with('status',"Xãy ra lỗi trong quá trình sửa");
        }
    }
    //Danh sách đề tài//
    public function alldt(){
        return view('pages.danhsachdetai');
    }

    //Đăng ký đề tài//    
    public function getdkdetai(){
        if(Auth::check())
        {   
            return view('pages.dangkydetai');
        }
        else{
            return redirect()->route('getlogin');
        }
    }
    //Xử lý đăng ký//
    public function dkdetai(Request $request){
        $this->validate($request,[
            'idsinhvien'=> 'required',

            'tendt'=> 'required'
        ],[
            'tendt.required'=>'Bạn chưa nhập tên đề tài'
        ]);
        $sinhvien = sinhvien::find($request->idsinhvien);
        $sinhvien->gvhd = $request->gv;
        $sinhvien->save();
        $detai = new detai;
        $detai->idsinhvien = $request->idsinhvien;
        $detai->tendetai = $request->tendt;
        $detai->mota = $request->mota;
        $detai->daduyet = 0;
        $detai->thamkhao = 0;
        $detai->save();
        return redirect()->route('getdkdetai')->with('status',"Đăng ký đề tài thành công");
    }

    //Duyệt đề tài//
    public function getduyetdt(){
        return view('pages.duyetdetai');
    }
    public function duyetdt(Request $request){
        $duyetdt = detai::find($request->id);
        $this->validate($request,[]);
        $duyetdt->daduyet = 1;
        $duyetdt->save();
        }
    //Xóa đề tài duyệt//
    public function deldetai(Request $request){
        $duyetdt = detai::find($request->id);
        $this->validate($request,[]);
        $duyetdt->delete();
    }

    //Tham khảo//
    public function thamkhao(){
        return view('pages.thamkhao');
    }
    public function tailieu(Request $request){
        $tailieu = detai::find($request->id);
        return view('pages.tailieu',['tailieu'=>$tailieu]);
    }
    //Thêm tham khảo//
    public function addThamkhao(Request $request){
        $this->validate($request,[
            'tieude'=>'required',
            'tomtat'=>'required',
            // 'file'=>'required',
            'noidung'=>'required'
        ],[
            'tieude.required'=>'Chưa nhập tiêu đề',
            'tomtat.required'=>'Chưa nhập tóm tắt',
            // 'file.required'=>'Chưa chọn file',
            'noidung.required'=>'Chưa nhập nội dung'
        ]);
        $detai = new detai;
        $detai->tendetai = $request->tieude;
        $detai->tomtat = $request->tomtat;
        // $file = $request->file('file');
        // if($file-> getClientMimeType('file') != "file/php"){
        //     $name = $file->getClientOriginalName('file');
        //     $file->move('file',$name);
        //     $detai->file = 'file/'.$name;
        // }
        $detai->noidung = $request->noidung;
        $detai->tiendo = 0;
        $detai->daduyet = 0;
        $detai->thamkhao = 1;
        $detai->idsinhvien = 1;
        $detai->save();
        if($detai->save()){
            return redirect()->back()->with('status','Đã thêm thành công');
        }else{
            return redirect()->back()->with('status', 'Xãy ra lỗi trong quá trình thêm');
        }
    }   
    //Sửa tham khảo//
    // public function geteditThamkhao(){
    //     return view('pages.editthamkhao');
    // }
    public function editThamkhao(Request $request){
        $detai = detai::find($request->id);
        if($detai->tendetai == $request->tieude){
            $this->validate($request,[
                'tieude'=>'required',
                'tomtat'=>'required',
                'noidung'=>'required'
            ],[
                'tieude.required'=>'Chưa nhập tiêu đề',
                'tomtat.required'=>'Chưa nhập tóm tắt',
                'noidung.required'=>'Chưa nhập nội dung'
            ]);
        }else{
            $this->validate($request,[
                'tieude'=>'required|unique:detais,tendetai',
                'tomtat'=>'required',
                'noidung'=>'required'
            ],[
                'tieude.required'=>'Chưa nhập tiêu đề',
                'tieude.unique'=>'Tài liệu tham khảo đã tồn tại',
                'tomtat.required'=>'Chưa nhập tóm tắt',
                'noidung.required'=>'Chưa nhập nội dung'
            ]);
        }
        $detai->tendetai = $request->tieude;
        $detai->tomtat = $request->tomtat;
        $detai->noidung = $request->noidung;
        $detai->save();
        if($detai->save()){
            return redirect()->route('thamkhao')->with('status','Đã sửa thành công');
        } else{
            return redirect()->route('thamkhao')
            ->with('status',"Xãy ra lỗi trong quá trình sửa");
        }
}
    //Xóa tham khảo//
    public function delThamkhao(Request $request){
        $delthamkhao = detai::find($request->id)->delete();
    }


    //Quản lý người dùng//
    public function quanlyUser() {
        return view('admin');
    }
    //Sửa người dùng//
    public function editUser(Request $request){
        $user = User::find($request->id);
        if($user->email == $request->email){
            $this->validate($request,[
                    'email'=>'required|email',
                ],[
                    'email.required'=>'Chưa nhập email',
                    'email.email'=>'Email không đúng định dạng'
                ]);
        }else{
            $this->validate($request,[
                'email'=>'required|email|unique:users,email',
            ],[
                'email.required'=>'Chưa nhập email',
                'email.email'=>'Email không đúng định dạng',
                'email.unique'=>'Email đã có người đăng ký'
            ]);
        }
            $user->email = $request->email;
            $user->level = $request->level;
            $user->save();
            if($user->save()){
                return redirect()->route('quanly')->with('status','Đã sửa thành công');
            } else{
                return redirect()->route('quanly')
                ->with('status',"Xãy ra lỗi trong quá trình sửa");
            }
    }
    //Xóa người dùng//
    public function delUser(Request $request){
        $delUser = user::where('id',$request->id)->delete();
    }
}
