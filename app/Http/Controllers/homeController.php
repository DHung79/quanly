<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Routing\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use File; 
use Session;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\giangvien;
use App\sinhvien;
use App\khoa;
use App\lop;
use App\detai;
use App\sukien;
use App\source;
use App\thamkhao;
class homeController extends sharecontroller
{
    function __construct() { 
        view::share('stt','1');

        $lop = lop::get();
        view::share('lop',$lop);

        $khoa = khoa::get();
        view::share('khoa',$khoa);

        $sukien = sukien::get();
        view::share('sukien',$sukien);

        $detai = detai::get();
        view::share('detai',$detai);

        $users = user::get();
        view::share('users',$users);

        $danhsachdt = detai::join('sinhvien','sinhvien.id','detais.idsinhvien')
        ->where('daduyet','1')->get();
        $sinhvienlop = sinhvien::join('lop','lop.id','sinhvien.idlop')->get();
        view::share('sinhvienlop',$sinhvienlop);
        view::share('danhsachdt',$danhsachdt);

        $thamkhao = thamkhao::get();
        view::share('thamkhao',$thamkhao);

        $duyet = sinhvien::join('detais','detais.idsinhvien', 'sinhvien.id')
        ->select(DB::raw('CONCAT(ho, " ", ten) AS hoten'),'sinhvien.*','detais.*')
        ->where('daduyet','0')->get();
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
            $user = Auth::user();
            $id = $user->id;
            view::share('iduser',$id);
            view::share('user',$user);

            $sinhvien = sinhvien::where('idusers',$id)->first();
            $giangvien = giangvien::where('idusers',$id)->first();
            
            if(isset($sinhvien)){
            $svlop = lop::where('id',$sinhvien->idlop)->first();
            $gvhdkhoa = giangvien::where('idkhoa',$svlop->idkhoa)->get();
            view::share('svlop',$svlop);
            view::share('sinhvien',$sinhvien);
            view::share('gvhdkhoa',$gvhdkhoa);
            }
            
            if(isset($giangvien)){
            $gvkhoa = khoa::find($giangvien->idkhoa);
            view::share('gvkhoa',$gvkhoa);
            view::share('giangvien',$giangvien);
            }
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
    //Thông tin cá nhân//
    public function inforuser($id){
        $inforuser = User::find($id);
        $svinfor = sinhvien::where('idusers',$id);
        $gvinfor = giangvien::where('idusers',$id);
        return view('pages.inforuser');
    }
     //Chỉnh sửa thông tin//
    public function editinfor(Request $request){
        $usertable = User::find($request->id);
        $user = $usertable->first();
        $sv = sinhvien::where('idusers',$request->id)->first();
        $gv = giangvien::where('idusers',$request->id)->first();
            $this->validate($request,[
                'email'=>['required','email',Rule::unique('users')->ignore($usertable->id)],
                'ho'        => 'required',
                'ten'       => 'required',
                'gioitinh'  => 'required',
                'sodt'      => 'required|numeric|min:10',
                'diachi'    => 'required'
            ],[
                'email.required'=>'Bạn chưa nhập email',
                'email.email'=>'Email không đúng định dạng',
                'email.unique'=>'Email của bạn đã có người đăng ký',
                'ho.required'=>'Bạn chưa nhập họ',
                'ten.required'=>'Bạn chưa nhập tên',
                'gioitinh.required'=>'Bạn chưa nhập giới tính',
                'sodt.required'=>'Bạn chưa nhập số điện thoại',
                'sodt.numeric'=>'Số điện thoại phải là một dãy số',
                'sodt.min:10'=>'Số điện thoại phải có 10 số',
                'diachi.required'=>'Bạn chưa nhập địa chỉ',
            ]);
            if(isset($request->password)){ 
                    $this->validate($request,[
                        'password' => 'required|min:6|max:32'
                    ],[
                        'password.required'=>'Bạn chưa nhập mật khẩu mới',
                        'password.min:6'=>'Mật khẩu phải chứa nhiều hơn 6 ký tự và ít hơn 32 ký tự',
                        'password.max:32'=>'Mật khẩu phải chứa nhiều hơn 6 ký tự và ít hơn 32 ký tự',
                    ]);
                    $usertable->password = bcrypt($request->password); 
                    $usertable->save();  
                }
            if(isset($request->img)){
                $img = $request->file('img');
                $fileimg=['png','jpg','gif','jpeg','raw'];
                $extension = $img->getClientOriginalExtension();
                $checkfileimg=array($extension,$fileimg);
                $name = $img->getClientOriginalName();
                $img->move('img',$name);
                $usertable->img = 'img/'.$name;
                $usertable->save();  
            }
            if(isset($sv)){
                $this->validate($request,[
                    'ngaysinh'  => 'required',
                    'lop'       => 'required',
                    'quequan'   => 'required',
                ],[
                    'ngaysinh.required'=>'Bạn chưa nhập ngày sinh',
                    'lop.required'=>'Bạn chưa nhập lớp',
                    'quequan.required'=>'Bạn chưa nhập quê quán',
                ]);
                User::updateOrInsert(['email'=>$request->email]);
                $sv->idlop = $request->lop;
                $sv->ho = $request->ho;
                $sv->ten = $request->ten;
                $sv->gioitinh = $request->gioitinh;
                $sv->ngaysinh = $request->ngaysinh;
                $sv->quequan = $request->quequan;
                $sv->diachi = $request->diachi;
                $sv->sodt = $request->sodt;
                $sv->save();
                if($sv->save()){
                    return redirect()->back()->with('status','Đã sửa thành công');
                }else{
                    return redirect()->back()
                    ->with('status',"Xãy ra lỗi trong quá trình sửa");
                }
            }
            if(isset($gv)){
                $this->validate($request,[
                    'khoa' => 'required',
                    'hocvi' => 'required',
                ],[
                    'khoa.required'=>'Bạn chưa nhập khoa',
                    'hocvi.required'=>'Bạn chưa nhập học vị',
                ]);
                User::updateOrInsert(['email'=>$request->email]);
                $gv->idkhoa = $request->khoa;
                $gv->ho = $request->ho;
                $gv->ten = $request->ten;
                $gv->gioitinh = $request->gioitinh;
                $gv->hocvi = $request->hocvi;
                $gv->diachi = $request->diachi;
                $gv->sodt = $request->sodt;
                $gv->save();
                if($gv->save()){
                    return redirect()->back()->with('status','Đã sửa thành công');
                }else{
                    return redirect()->back()
                    ->with('status',"Xãy ra lỗi trong quá trình sửa");
                }
            }
    }
    //Đề tài sinh viên
    public function userdetai($id){
        $detai = detai::where('idsinhvien',$id)->first();
        $iddetai = $detai->id;
        $source = source::where('iddetai',$iddetai)->get();
        $idedit = sinhvien::find($id)->idusers;
        return view('pages.userdetai',['detai'=>$detai,'idedit'=>$idedit,'source'=>$source]);
    }
    //Chỉnh sửa đề tài 
    public function editdetai(Request $request){
        $detai = detai::find($request->id);
        $idsv = $detai->idsinhvien;
            $this->validate($request,[
                'tendetai'=>['required',Rule::unique('detais')->ignore($detai->id)],
                'tomtat'=>'required',
                'files' => 'required|max:1000000',
                'noidung'=>'required'
            ],[
                'tendetai.required'=>'Chưa nhập tên đề tài',
                'tendetai.unique'=>'Đề tài đã tồn tại',
                'tomtat.required'=>'Chưa nhập tóm tắt',
                'files.required' =>'Chưa chọn file',
                'files.max:10000' =>'File được chọn phải nhỏ hơn 1MB',
                'noidung.required'=>'Chưa nhập nội dung'
            ]);
        
            $filepdf=['pdf'];
            $filedoc=['doc','docx'];
            $files = $request->file('files');
            foreach($files as $file){    
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $checkfilepdf=in_array($extension,$filepdf);
            $checkfiledoc=in_array($extension,$filedoc);
            if($checkfilepdf){
                $file->move('file',$filename);
                foreach ($request->files as $file){
                    $iddetai = $request->id;
                    source::updateOrInsert(['tenfile'=>$filename,
                        'iddetai'=>$iddetai,
                        'img'=>'img/pdf.png']
                    );
                }
            }
            if($checkfiledoc){
                $file->move('file',$filename);
                foreach ($request->files as $file){
                    $iddetai = $request->id;
                    source::updateOrInsert(['tenfile'=>$filename,
                        'iddetai'=>$iddetai,
                        'img'=>'img/doc.png']
                    );
                }
            }       
        }
    
        $detai->tendetai = $request->tendetai;
        $detai->tomtat = $request->tomtat;
        $detai->noidung = $request->noidung;
        if(isset($request->tiendo)){
            $detai->tiendo = $request->tiendo;
        } else{
            $detai->tiendo = 0;
        }
        $detai->save();
        if($detai->save()){
            return redirect()->route('userdetai',['id'=>$idsv])->with('status','Đã sửa thành công');
        } else{
            return redirect()->route('userdetai',['id'=>$idsv])
            ->with('status',"Xãy ra lỗi trong quá trình sửa");
        }
    }
    //Xóa file //
    public function delfile(Request $request){
        $delfile = source::find($request->id);
        File::delete('file/'.$delfile->tenfile);
        $delfile->delete();
    }
    //Xóa đề tài //
    public function deldetai(Request $request){
        $deldetai = detai::where('idsinhvien',$request->id)->first();
        $iddetai = $deldetai->id;
        $delfile = source::where('iddetai',$iddetai);
        File::delete('file/'.$delfile->tenfile);
        $delfile->delete();
        $deldetai->delete();
    }
    //Danh sách đề tài//
    public function alldt(){
        return view('pages.danhsachdetai');
    }

    //Đăng ký đề tài//    
    public function getdkdetai(){
        return view('pages.dangkydetai');
    }
    //Xử lý đăng ký//
    public function dkdetai(Request $request){
        $this->validate($request,[
            'idsv'=> 'required',
            'tomtat'=> 'required',
            'noidung'=> 'required',
            'gv'=> 'required',
            'tendt'=> 'required'
        ],[
            'idsv.required'=> 'Chưa chọn sinh viên',
            'tomtat.required'=>'Chưa nhập tóm tắt',
            'noidung.required'=>'Chưa nhập nội dung',
            'gv.required' =>'Chưa chọn gvhd',
            'tendt.required'=>'Bạn chưa nhập tên đề tài'
        ]);
        $giangvien = giangvien::find($request->gv);
        $tengv = $giangvien->ten;
        $hogv = $giangvien->ho;
        $hotengv = "$hogv $tengv";
        $sinhvien = sinhvien::find($request->idsv);
        $sinhvien->gvhd = $hotengv;
        $sinhvien->save();
        $detai = new detai;
        $detai->idsinhvien = $request->idsv;
        $detai->tendetai = $request->tendt;
        $detai->tomtat = $request->tomtat;
        $detai->noidung = $request->noidung;
        $detai->tiendo = 0;
        $detai->daduyet = 0;
        $detai->idgvhd = $request->gv;
        $detai->save();
        if($sinhvien->save() && $detai->save()){
            return redirect()->route('getdkdetai')
            ->with('status',"Đăng ký đề tài thành công");
        }
    }

    //Duyệt đề tài//
    public function getduyetdt(){
        return view('layout.admin.duyetdetai');
    }
    public function duyetdt(Request $request){
        $duyetdt = detai::find($request->id);
        $this->validate($request,[]);
        $duyetdt->daduyet = 1;
        $duyetdt->save();
        }
    //Xóa đề tài duyệt//
    public function delduyetdetai(Request $request){
        $duyetdt = detai::find($request->id);
        $this->validate($request,[]);
        $duyetdt->delete();
    }
    
    //Danh sách tham khảo//
    public function thamkhao(){
        return view('pages.thamkhao');
    }
    public function tailieu($id){
        $tailieu = thamkhao::find($id);
        return view('pages.tailieu',['tailieu'=>$tailieu]);
    }
    //Thêm tham khảo//
    public function addThamkhao(Request $request){
        $this->validate($request,[
            'tieude'=>'required',
            'tomtat'=>'required',
            'noidung'=>'required'
        ],[
            'tieude.required'=>'Chưa nhập tiêu đề',
            'tomtat.required'=>'Chưa nhập tóm tắt',
            'noidung.required'=>'Chưa nhập nội dung'
        ]);
        $thamkhao = new thamkhao;
        $thamkhao->tieude = $request->tieude;
        $thamkhao->tomtat = $request->tomtat;
        if(isset($request->img)){
            $img = $request->file('img');
            $name = $img->getClientOriginalName();
            $img->move('img',$name);
            $thamkhao->img = 'img/'.$name;
        }
        $thamkhao->noidung = $request->noidung;
        $thamkhao->save();
        if($thamkhao->save()){
            return redirect()->back()->with('status','Đã thêm thành công');
        }else{
            return redirect()->back()->with('status', 'Xãy ra lỗi trong quá trình thêm');
        }
    }   
    public function editThamkhao(Request $request){
        $thamkhao = thamkhao::find($request->id);
            $this->validate($request,[
                'tieude'=>['required',Rule::unique('thamkhao')->ignore($thamkhao->id)],
                'tomtat'=>'required',
                'noidung'=>'required'
            ],[
                'tieude.required'=>'Chưa nhập tiêu đề',
                'tieude.unique'=>'Tài liệu tham khảo đã tồn tại',
                'tomtat.required'=>'Chưa nhập tóm tắt',
                'noidung.required'=>'Chưa nhập nội dung'
            ]);
        
        $thamkhao->tieude = $request->tieude;
        $thamkhao->tomtat = $request->tomtat;
        $thamkhao->noidung = $request->noidung;
        $thamkhao->save();
        if($thamkhao->save()){
            return redirect()->back()->with('status','Đã sửa thành công');
        } else{
            return redirect()->back()
            ->with('status',"Xãy ra lỗi trong quá trình sửa");
        }
    }
    //Xóa tham khảo//
    public function delThamkhao(Request $request){
        $delthamkhao = thamkhao::find($request->id);
        // File::delete($delthamkhao->img);
        $delthamkhao->delete();
    }

    //Sự kiện//
    public function dssukien(){
        return view('pages.danhsachsukien');
    }
    public function sukien($id){
        $sukien = sukien::find($id);
        return view('pages.sukien',['sukien'=>$sukien]);
    }
    //Thêm Sự kiện//
    public function addsukien(Request $request){
        $this->validate($request,[
            'tensukien'=>'required',
            'tomtat'=>'required',
            'img'=>'required',
            'noidung'=>'required'
        ],[
            'tieude.required'=>'Chưa nhập tiêu đề',
            'tomtat.required'=>'Chưa nhập tóm tắt',
            'img.required'=>'Chưa thêm ảnh bìa',
            'noidung.required'=>'Chưa nhập nội dung'
        ]);
        $sukien = new sukien;
        $sukien->tensukien = $request->tensukien;
        $sukien->tomtat = $request->tomtat;
        $img = $request->file('img');
        $name = $img->getClientOriginalName();
        $img->move('img',$name);
        $sukien->img = 'img/'.$name;
        $sukien->noidung = $request->noidung;
        $sukien->save();
        if($sukien->save()){
            return redirect()->back()->with('status','Đã thêm thành công');
        }else{
            return redirect()->back()->with('status', 'Xãy ra lỗi trong quá trình thêm');
        }
    }   
    public function editsukien(Request $request){
        $sukien = sukien::find($request->id);
            $this->validate($request,[
                'tensukien'=>['required',Rule::unique('sukien')->ignore($sukien->id)],
                'tomtat'=>'required',
                'img'=>'required',
                'noidung'=>'required'
            ],[
                'tensukien.required'=>'Chưa nhập tiêu đề',
                'tensukien.unique'=>'Sự kiện đã tồn tại',
                'tomtat.required'=>'Chưa nhập tóm tắt',
                'img.required'=>'Chưa thêm ảnh bìa',
                'noidung.required'=>'Chưa nhập nội dung'
            ]);

        $sukien->tensukien = $request->tensukien;
        $sukien->tomtat = $request->tomtat;
        $img = $request->file('img');
        $name = $img->getClientOriginalName();
        $img->move('img',$name);
        $sukien->img = 'img/'.$name;
        $sukien->noidung = $request->noidung;
        $sukien->save();
        if($sukien->save()){
            return redirect()->back()->with('status','Đã sửa thành công');
        } else{
            return redirect()->back()->with('status', 'Xãy ra lỗi trong quá trình sửa');
        }
    }
    //Xóa Sự kiện//
    public function delsukien(Request $request){
        $delsukien = sukien::find($request->id);
        File::delete($delsukien->img);
        $delsukien->delete();
    }


    //Quản lý người dùng//
    public function quanlyUser() {
        return view('layout.admin.admin');
    }
    //Sửa người dùng//
    public function editUser(Request $request){
        $user = User::find($request->id);
            $this->validate($request,[
                'email'=>['required','email',Rule::unique('users')->ignore($user->id)],
            ],[
                'email.required'=>'Chưa nhập email',
                'email.email'=>'Email không đúng định dạng',
                'email.unique'=>'Email đã có người đăng ký'
            ]);

            $user->email = $request->email;
            if(isset($request->password)){
                $user->password = bcrypt($request->password);
            }
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

    public function svhd(){
        Auth::check();
        $iduser = Auth::user()->id;
        $giangvien = giangvien::where('idusers',$iduser)->first();
        $idgv = $giangvien->id;
        $dssvhd = sinhvien::join('detais','detais.idsinhvien','sinhvien.id')
        ->where('daduyet','1')
        ->where('idgvhd',$idgv)->get();
        return view('layout.admin.svhuongdan',['dssvhd'=>$dssvhd]);
    }
}