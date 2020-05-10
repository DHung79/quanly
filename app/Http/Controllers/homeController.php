<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Routing\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;
use File; 
use Session;
use Auth;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\giangvien;
use App\sinhvien;
use App\khoa;
use App\lop;
use App\detai;
use App\sukien;
use App\source;
class homeController extends sharecontroller
{
    function __construct() { 
        view::share('stt','1');

        $sukien = sukien::get();
        view::share('sukien',$sukien);

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
        $iddetai = $detai->id;
        $source = source::where('iddetai',$iddetai)->get();
        $idedit = sinhvien::find($id)->idusers;
        return view('pages.inforuser',['detai'=>$detai,'idedit'=>$idedit,'source'=>$source]);
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
        $detai->thamkhao = 0;
        $detai->idgvhd = $request->gv;
        $detai->save();
        if($sinhvien->save() && $detai->save()){
            return redirect()->route('getdkdetai')
            ->with('status',"Đăng ký đề tài thành công");
        }
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
    public function delduyetdetai(Request $request){
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
    public function editThamkhao(Request $request){
        $detai = detai::find($request->id);
            $this->validate($request,[
                'tieude'=>['required',Rule::unique('detais')->ignore($detai->id)],
                'tomtat'=>'required',
                'noidung'=>'required'
            ],[
                'tieude.required'=>'Chưa nhập tiêu đề',
                'tieude.unique'=>'Tài liệu tham khảo đã tồn tại',
                'tomtat.required'=>'Chưa nhập tóm tắt',
                'noidung.required'=>'Chưa nhập nội dung'
            ]);
        
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
        $delthamkhao = detai::find($request->id);
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
        return view('admin');
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
        ->where('thamkhao','0')
        ->where('idgvhd',$idgv)->get();
        return view('pages.svhuongdan',['dssvhd'=>$dssvhd]);
    }
}