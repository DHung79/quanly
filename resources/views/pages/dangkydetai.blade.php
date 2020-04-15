@extends('layout.user.index')

@section('content')

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Đăng ký đề tài</h6>
            </div>
            @if($dkdt->count()==0)
                <form method="POST" action="{{route('dkdetai')}}" style="margin: 30px 25px;">
                @csrf
                <center><span class="error-center">@if(count($errors)>0)
                @foreach($errors->all() as $err)
                    {{$err}}</br>
                @endforeach
            @endif
            @if(session('status'))
                {{session('status')}}
            @endif</span></center>
            @if(Auth::check())
                @if(Auth::user()->level==1||Auth::user()->level==2)
                <div class="row">
                    <div class="col-xl-4 col-md-6">
                        <select class="form-control form-group" name="idsv">
                            <option value=""hidden>Sinh viên:</option>
                            @foreach ($svlist as $sv)
                            <option value="{{$sv->id}}">{{$sv->ho}} {{$sv->ten}}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
                @if(Auth::user()->level==3)
                <div class="row">
                    <div class="col-xl-4 col-md-6">
                        <p class="mt-7">
                        Sinh viên: 
                    @foreach ($sinhvien as $sv)
                        {{$sv->ho}}     
                        {{$sv->ten}}
                        </p> 
                        <input type="hidden" name="idsinhvien" value={{$sv->id}}>
                    @endforeach
                    </div>
                @endif
            @endif
                    <div class="col-xl-4 col-md-6"></div>
                    <div class="col-xl-4 col-md-6">
                    <select class="form-control form-group" name='gv'>
                        <option value=""hidden>Giảng viên hướng dẫn:</option>
                        @foreach($gvlist as $gv)
                        <option value="{{$gv->id}}">
                            {{$gv->hocvi}}. 
                            {{$gv->ho}}    
                            {{$gv->ten}}
                        </option>
                        @endforeach
                    </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-md-6">
                        <h4 class="small font-weight-bold">Tên đề tài:</h4>
                        <input class="form-control mb-4" type='text' name='tendt' placeholder='Tên đề tài'/>	
                    </div>
                    <div class="col-xl-12 col-md-6">
                        <h4 class="small font-weight-bold">Mô tả đề tài</h4>
                        <textarea class="form-control mb-4" name="mota" id="ten" style="height: 362px;"></textarea>
                    </div>
                </div>
                        <center><button type="submit" class="btn btn-primary" name="dangky">Đăng ký</button></center><br>
            </form>
            @else
                <form class="form-wait">
                    <center><span class="error-center">@if(count($errors)>0)
                        @foreach($errors->all() as $err)
                            {{$err}}</br>
                        @endforeach
                    @endif
                    @if(session('status'))
                        {{session('status')}}
                    @endif</span></center>
                    <h1 class="mt-6">
                        Đề tài của bạn đang được duyệt
                        <br>Vui lòng chờ admin kiểm duyệt đề tài của bạn
                        <br><a href="{{route('home')}}">Về trang chủ</a>
                    </h1>
                    <img class="gif" src="/bootstrap/img/usagyuuun.gif"/><br>
                    
                </form>
            @endif    
        </div>
    </div>

@endsection
