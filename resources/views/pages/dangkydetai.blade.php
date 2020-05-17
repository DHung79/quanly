@extends('layout.user.index')

@section('content')

    <div class="container-fluid">
        
        <div class="card shadow mb-4" style="height: auto; color:rgba(0, 0, 0, 0.9)">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Đăng ký đề tài</h6>
            </div>
            @if($dkdt->count()==0)
                <form method="POST" action="{{route('dkdetai')}}" style="margin: 30px 25px;" enctype="multipart/form-data">
                @csrf
                <span class="error-center">@if(count($errors)>0)
                @foreach($errors->all() as $err)
                    {{$err}}<br>
                @endforeach
            @endif
            @if(session('status'))
                {{session('status')}}<br>
            </span>
            @endif
            @if(Auth::check())
                @if(Auth::user()->level==1||Auth::user()->level==2)
                <div class="row" style="margin-top: 10px">
                    <div class="col-xl-4">
                        <h4 class="small font-weight-bold">Sinh viên:</h4>
                        <select class="form-control form-group" name="idsv">
                            <option value=""hidden>Sinh viên:</option>
                            @foreach ($svlist as $sv)
                            <option value="{{$sv->id}}">
                                {{$sv->ho}} {{$sv->ten}}
                            </option>
                            @endforeach
                        </select>
                @endif
                @if(Auth::user()->level==3)
                <div class="row">
                    <div class="col-xl-4">
                        <p class="mt-7">
                        Sinh viên: 
                        {{$sinhvien->ho}}     
                        {{$sinhvien->ten}}
                        </p> 
                        <input type="hidden" name="idsinhvien" value={{$sinhvien->id}}>
                @endif
            @endif
                    <h4 class="small font-weight-bold">Giảng viên hướng dẫn:</h4>
                    <select class="form-control form-group" name='gv' >
                        <option value=""hidden>Giảng viên hướng dẫn:</option>
                        @foreach($gvlist as $gv)
                        <option value="{{$gv->id}}">
                            {{$gv->hocvi}}. 
                            {{$gv->ho}}    
                            {{$gv->ten}}
                        </option>
                        @endforeach
                    </select>
                    <div class="row">
                        <div class="col-xl-12">
                            <h4 class="small font-weight-bold">Tên đề tài:</h4>
                            <input class="form-control mb-4" type='text' name='tendt' placeholder='Tên đề tài'/>	
                            <h4 class="small font-weight-bold">Tóm tắt</h4>
                            <input class="form-control mb-4" type='text' name='tomtat' placeholder='Tóm tắt'/>	
                        </div>
                    </div>
                </div>
                <div style="flex: 0 0 8%; max-width: 5%;">
                </div>
                <div class="col-xl-7">
                    <h4 class="small font-weight-bold">Mô tả</h4>
                    <textarea class="form-control ckeditor" name="noidung" style=""></textarea>
                </div>
                
                <div class="col-xl-12">
                    <button type="submit" class="btn btn-primary" style="margin-top: 2%;" name="dangky">Đăng ký</button><br>
                </div>
            </form>
        </div>
            @else
                <div style="margin: 30px 25px;">
                        <center><h4 class="medium font-weight-bold" style="position: relative;">
                            Đề tài của bạn đang được duyệt
                            <br>Vui lòng quay lại sau
                            <br><a href="{{route('home')}} " style=" text-decoration: none;">Về trang chủ</a>
                        </h4></center>
                        <center>
                            <div style="margin-top: -120px;">
                                <img class="gif" src="/bootstrap/img/usagyuuun.gif"/>
                            </div>
                        </center>
                </div>
            @endif    
        
    </div>
</div>
</div>
@endsection
