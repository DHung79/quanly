@extends('layout.user.index')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->

<!-- DataTales Example -->



<div class="card shadow mb-4">
<div class="card-header py-3">
    <center><h6 class="m-0 font-weight-bold text-primary">Thông tin cá nhân</h6></center>
    @if(isset($sinhvien))
        <div class="" style="position: absolute;
            top: 7px; left: 0;">
            <div class="col-md-1 col-6 " >
                <a href="javascript:" 
                    data-gt="{{$sinhvien->gioitinh}}" 
                    data-lop="{{$svlop->id}}"
                    class="btn btn-split btn-success edit-btn">
                    Sửa</a>
            </div>
        </div>
    </div>
    
    <span class="error-center" style="margin: 5px 25px;">
        @if(count($errors)>0)
        @foreach($errors->all() as $err)
            {{$err}}</br>
        @endforeach
        @endif
        @if(session('status'))
            {{session('status')}}
        @endif
    </span> 

    <div class="form-edit" style=" display: none;">
        <form method="POST" action="{{route('editinfor')}}" style="margin: 30px 25px;" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$iduser}}">
            <div class="row">
                <div class="row col-xl-12 col-md-6 mb-4">
                    <div class="col-xl-6 col-md-6 mb-4">
                        <h4 class="small font-weight-bold">Họ</h4>
                        <input type="text" class="form-control form-control-user"
                            name='ho' value="{{$sinhvien->ho}}">
                    </div>
                    <div class="col-xl-6 col-md-6 mb-4">
                        <h4 class="small font-weight-bold">Tên</h4>
                        <input type="text" class="form-control form-control-user" 
                        name='ten' value="{{$sinhvien->ten}}">
                    </div>
                    <div class="col-xl-12 col-md-6">
                        <h4 class="small font-weight-bold">Email</h4>
                        <div class="form-group" >
                        <input type='email' name='email' value="{{$user->email}}" 
                        class="form-control form-control-user">
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-6">
                        <h4 class="small font-weight-bold">Đổi mật khẩu</h4>
                        <div class="form-group" >
                        <input type='password' name='password' placeholder="Đổi mật khẩu" 
                        class="form-control form-control-user">
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <h4 class="small font-weight-bold">Ảnh đại diện</h4>
                        <div class="form-group" >
                        <input type='file' name='img' 
                        class="form-control form-control-user">
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <h4 class="small font-weight-bold">Ngày sinh</h4>
                        <div class="form-group" >
                        <input type='date' name='ngaysinh' value="{{$sinhvien->ngaysinh}}"
                        class="form-control form-control-user">
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <h4 class="small font-weight-bold">Giới tính</h4>
                        <div class="form-group" >
                            <select class="form-control form-control-user" 
                                id="edit_gt" 
                                name='gioitinh'>
                                <option value="1">Nam</option>
                                <option value="2">Nữ</option>
                                <option value="3">Khác</option>
                            </select>	
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <h4 class="small font-weight-bold">Lớp</h4>
                        <div class="form-group" >
                            <select class="form-control form-control-user" 
                            id="edit_lop" 
                            name='lop'>
                                @foreach($lop as $class)
                                    <option value="{{$class->id}}">
                                        {{$class->tenlop}}
                                    </option>
                                @endforeach
                            </select>	
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-6">
                        <h4 class="small font-weight-bold">Số điện thoại</h4>
                        <div class="form-group" >
                            <input type='tel' name='sodt' value="{{$sinhvien->sodt}}"
                            class="form-control form-control-user">
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-6">
                        <h4 class="small font-weight-bold">Quê quán</h4>
                        <div class="form-group" >
                            <input type='text' name='quequan' value="{{$sinhvien->quequan}}" 
                            class="form-control form-control-user">
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-6">
                        <h4 class="small font-weight-bold">Địa chỉ</h4>
                        <div class="form-group" >
                            <input type='text' name='diachi' value="{{$sinhvien->diachi}}" 
                            class="form-control form-control-user">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1 col-6">
                    <button type="submit" 
                    class="btn btn-success btn-md btn-add">Sửa</button>
                </div>
                <div class="col-md-1 col-6">
                    <button type="button" id="cancel-edit" 
                    class="btn btn-primary btn-md btn-add" 
                    style="background: #dc3545; 
                    border-color: #dc3545;">Hủy</button>
                </div>
            </div>
        </form>
    </div>

        

        <div class="card-body" id="infor" style=" color: #000000;">
            <div class="row"  style="margin-left: 10px;">
                <div class="col-md-6 col-6 mb-1">
                    <div class="row font-weight-bold text-uppercase">
                        <div class="text-info">Họ và tên:</div>&nbsp;
                        <div class="">{{$sinhvien->ho}} {{$sinhvien->ten}}</div>
                    </div>
                    <div class="row font-weight-bold text-uppercase">
                        <div class="text-info">Email:</div>&nbsp;
                        <div class="">{{$user->email}}</div>
                    </div>
                    <div class="row font-weight-bold text-uppercase">
                        <div class="text-info">Giới tính:</div>&nbsp;
                        <div class="">
                            @if($sinhvien->gioitinh == 1)
                                Nam
                            @elseif($sinhvien->gioitinh == 2)
                                Nữ
                            @elseif($sinhvien->gioitinh == 3)
                                Khác
                            @endif
                        </div>
                    </div>
                    <div class="row font-weight-bold text-uppercase">
                        <div class="text-info">Ngày sinh:</div>&nbsp;
                        <div class="">{{date("d-m-Y",strtotime($sinhvien->ngaysinh))}}</div>
                    </div>
                    <div class="row font-weight-bold text-uppercase">
                        <div class="text-info">Số điện thoại:</div>&nbsp;
                        <div class="">{{$sinhvien->sodt}}</div>
                    </div>
                    <div class="row font-weight-bold text-uppercase">
                        <div class="text-info">Lớp:</div>&nbsp;
                        <div class="">{{$svlop->tenlop}}</div>
                    </div>
                    <div class="row font-weight-bold text-uppercase">
                        <div class="text-info">Quê quán:</div>&nbsp;
                        <div class="">{{$sinhvien->quequan}}</div>
                    </div>
                    <div class="row font-weight-bold text-uppercase">
                        <div class="text-info">Địa chỉ:</div>&nbsp;
                        <div class="">{{$sinhvien->diachi}}</div>
                    </div>
                </div>
                <div col-md-6 col-6 mb-1>
                    <img src="{{$user->img}}" 
                    style="max-height: 250px; max-width: 250px">
                </div>
            </div>
    @endif
    @if(isset($giangvien))
        <div class="" style="position: absolute;
        top: 7px; left: 0;">
        <div class="col-md-1 col-6 " >
            <a href="javascript:" 
                data-gt="{{$giangvien->gioitinh}}" 
                data-lop="{{$gvkhoa->id}}"
                class="btn btn-split btn-success edit-btn">
                Sửa</a>
        </div>
    </div>
    </div>

    <span class="error-center" style="margin: 5px 25px;">
    @if(count($errors)>0)
    @foreach($errors->all() as $err)
        {{$err}}</br>
    @endforeach
    @endif
    @if(session('status'))
        {{session('status')}}
    @endif
    </span> 

    <div class="form-edit" style=" display: none;">
        <form method="POST" action="{{route('editinfor')}}" style="margin: 30px 25px;" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$iduser}}">
            <div class="row">
                <div class="row col-xl-12 col-md-6 mb-4">
                    <div class="col-xl-6 col-md-6 mb-4">
                        <h4 class="small font-weight-bold">Họ</h4>
                        <input type="text" class="form-control form-control-user"
                            name='ho' value="{{$giangvien->ho}}">
                    </div>
                    <div class="col-xl-6 col-md-6 mb-4">
                        <h4 class="small font-weight-bold">Tên</h4>
                        <input type="text" class="form-control form-control-user" 
                        name='ten' value="{{$giangvien->ten}}">
                    </div>
                    <div class="col-xl-12 col-md-6">
                        <h4 class="small font-weight-bold">Email</h4>
                        <div class="form-group" >
                        <input type='email' name='email' value="{{$user->email}}" 
                        class="form-control form-control-user">
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-6">
                        <h4 class="small font-weight-bold">Đổi mật khẩu</h4>
                        <div class="form-group" >
                        <input type='password' name='password' placeholder="Đổi mật khẩu" 
                        class="form-control form-control-user">
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <h4 class="small font-weight-bold">Ảnh đại diện</h4>
                        <div class="form-group" >
                        <input type='file' name='img' 
                        class="form-control form-control-user">
                        </div>
                    </div>
                    {{-- <div class="col-xl-6 col-md-6">
                        <h4 class="small font-weight-bold">Ngày sinh</h4>
                        <div class="form-group" >
                        <input type='date' name='ngaysinh' value="{{$giangvien->ngaysinh}}"
                        class="form-control form-control-user">
                        </div>
                    </div> --}}
                    <div class="col-xl-6 col-md-6">
                        <h4 class="small font-weight-bold">Giới tính</h4>
                        <div class="form-group" >
                            <select class="form-control form-control-user" 
                                id="edit_gt" 
                                name='gioitinh'>
                                <option value="1">Nam</option>
                                <option value="2">Nữ</option>
                                <option value="3">Khác</option>
                            </select>	
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <h4 class="small font-weight-bold">Khoa</h4>
                        <div class="form-group" >
                            <select class="form-control form-control-user" 
                            id="edit_lop" 
                            name='khoa'>
                                @foreach($khoa as $class)
                                    <option value="{{$class->id}}">
                                        {{$class->tenkhoa}}
                                    </option>
                                @endforeach
                            </select>	
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <h4 class="small font-weight-bold">Học vị</h4>
                        <div class="form-group" >
                            <input type='text' name='hocvi' value="{{$giangvien->hocvi}}" 
                            class="form-control form-control-user">
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-6">
                        <h4 class="small font-weight-bold">Số điện thoại</h4>
                        <div class="form-group" >
                            <input type='tel' name='sodt' value="{{$giangvien->sodt}}"
                            class="form-control form-control-user">
                        </div>
                    </div>
                    
                    <div class="col-xl-12 col-md-6">
                        <h4 class="small font-weight-bold">Địa chỉ</h4>
                        <div class="form-group" >
                            <input type='text' name='diachi' value="{{$giangvien->diachi}}" 
                            class="form-control form-control-user">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1 col-6">
                    <button type="submit" 
                    class="btn btn-success btn-md btn-add">Sửa</button>
                </div>
                <div class="col-md-1 col-6">
                    <button type="button" id="cancel-edit" 
                    class="btn btn-primary btn-md btn-add" 
                    style="background: #dc3545; 
                    border-color: #dc3545;">Hủy</button>
                </div>
            </div>
        </form>
    </div>

    <div class="card-body" id="infor" style=" color: #000000;">
        <div class="row"  style="margin-left: 10px;">
            <div class="col-md-6 col-6 mb-1">
                <div class="row font-weight-bold text-uppercase">
                    <div class="text-info">Họ và tên:</div>&nbsp;
                    <div class="">{{$giangvien->ho}} {{$giangvien->ten}}</div>
                </div>
                <div class="row font-weight-bold text-uppercase">
                    <div class="text-info">Email:</div>&nbsp;
                    <div class="">{{$user->email}}</div>
                </div>
                <div class="row font-weight-bold text-uppercase">
                    <div class="text-info">Giới tính:</div>&nbsp;
                    <div class="">
                        @if($giangvien->gioitinh == 1)
                            Nam
                        @elseif($giangvien->gioitinh == 2)
                            Nữ
                        @elseif($giangvien->gioitinh == 3)
                            Khác
                        @endif
                    </div>
                </div>
                {{-- <div class="row font-weight-bold text-uppercase">
                    <div class="text-info">Ngày sinh:</div>&nbsp;
                    <div class="">{{date("d-m-Y",strtotime($giangvien->ngaysinh))}}</div>
                </div> --}}
                <div class="row font-weight-bold text-uppercase">
                    <div class="text-info">Số điện thoại:</div>&nbsp;
                    <div class="">{{$giangvien->sodt}}</div>
                </div>
                <div class="row font-weight-bold text-uppercase">
                    <div class="text-info">Khoa:</div>&nbsp;
                    <div class="">{{$gvkhoa->tenkhoa}}</div>
                </div>
                <div class="row font-weight-bold text-uppercase">
                    <div class="text-info">Học vị:</div>&nbsp;
                    <div class="">{{$giangvien->hocvi}}</div>
                </div>
                <div class="row font-weight-bold text-uppercase">
                    <div class="text-info">Địa chỉ:</div>&nbsp;
                    <div class="">{{$giangvien->diachi}}</div>
                </div>
            </div>
            <div col-md-6 col-6 mb-1>
                <img src="{{$user->img}}" 
                style="max-height: 250px; max-width: 250px">
            </div>
        </div>
    @endif
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<script type="text/javascript" src="{{('/bootstrap/js/add.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(){
        $('.edit-btn').click(function(){
            gt = $(this).data('gt');
            lop = $(this).data('lop');
            $('#edit_gt').val(gt);
            $('#edit_lop').val(lop);
            $('.edit-btn').hide();
            $('.form-edit').slideDown();
            $('#infor').hide();
        })

        $('#cancel-edit').click(function(){
            $('.form-edit').slideUp();
            $('.edit-btn').show();
            $('#infor').show();
        })
	})
</script>
@endsection
