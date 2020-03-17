@extends('layout.user.index')

@section('content')
@if($dkdt->count()==0)
<div class="container" >
    <div class="row">
        <div class="col-lg-8">
            <form method="POST" action="{{route('dkdetai')}}" class="form-group">
            @csrf
            <h1 class="mt-4">Đăng ký đề tài</h1>
            <center><span class="error-center">@if(count($errors)>0)
                @foreach($errors->all() as $err)
                    {{$err}}</br>
                @endforeach
            @endif
            @if(session('status'))
                {{session('status')}}
            @endif</span></center>
            <p class="lead">
                Sinh viên: 
                @foreach ($sinhvien as $sv)
                    {{$sv->ho}}     
                    {{$sv->ten}} 
            </p>
            <input type="hidden" name="idsinhvien" value={{$sv->id}}>
                @endforeach
            <hr>
                <div class="card my-4">
                <h5 class="card-header">Giảng viên hướng dẫn:</h5>
                    <select class="gv" name='gv'>
                        @foreach($capgv as $gv)
                        <option value="{{$gv->id}}">
                            {{$gv->tencap}}:
                            {{$gv->ho}}    
                            {{$gv->ten}}
                        </option>
                        @endforeach
                    </select>	
            </div>
            <div class="card my-4">
                <h5 class="card-header">Tên đề tài:</h5>
                <input class="text" type='text' name='tendt' placeholder='Tên đề tài'/>	
            </div>
            <div class="card my-4">
                <h5 class="card-header">Mô tả đề tài</h5>
                
                    <textarea name="mota" id="ten"></textarea>
                    <script>CKEDITOR.replace('mota');</script>
            </div>
            <center><button type="submit" class="btn btn-primary" name="dangky">Đăng ký</button></center><br>
            </form>
            @else
            <div class="container" >
                <div class="row">
                    <div class="col-lg-8">
                        <form class="form-wait">
                            <h1 class="mt-6">
                                Đề tài của bạn đang được duyệt
                                <br>Vui lòng chờ admin kiểm duyệt đề tài của bạn
                            </h1>
                            <img class="gif" src="/bootstrap/img/usagyuuun.gif"/>
                        </form>
            @endif    
        </div>
    </div>
</div>

@endsection
