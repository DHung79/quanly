@extends('layout.user.index')

@section('content')
<body id="page-top">

<!-- Page Wrapper -->
        <!-- Begin Page Content -->
<div class="container-fluid">

        <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between ">
        {{-- <h1 class="h3 mb-0 text-gray-800">Tin tức - Sự kiện</h1> --}}
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

        <!-- Content Row -->

    <div class="row">
            <!-- Area Chart -->
        <div class="col-auto">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tin tức - Sự kiện</h6>
                </div>

            <div class="row">
                <div class="col-md-6">
                    @if(Auth::check())
                        @if(Auth::user()->level==1||Auth::user()->level==2)
                        <button class="btn btn-primary btn-md" style="margin: 10px 25px;" href="#" data-toggle="collapse" data-target="#AddUser" aria-expanded="true" aria-controls="AddUser">
                            <i class="fas fa-plus-circle"></i>&nbsp Thêm sự kiện
                        </button>
                        @endif
                    @endif
                </div>
            </div>
            <div id="AddUser" class="collapse" aria-labelledby="AddUser" data-parent="#accordionSidebar">
                <div class="form-add" >
                    <form method="POST" action="{{route('addsukien')}}" style="margin: 10px 25px;" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-auto" style="width: 100%;">
                                <h4 class="small font-weight-bold">Tên sự kiện</h4>
                                <div class="form-group" >
                                <input type='text' name='tensukien' placeholder='Tên sự kiện' class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-auto" style="width: 100%;">
                                <h4 class="small font-weight-bold">Ảnh bìa</h4>
                                <div class="form-group" >
                                <input type='file' name='img' class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-auto" style="width: 100%;">
                                <h4 class="small font-weight-bold">Tóm tắt nội dung</h4>
                                <div class="form-group" >
                                <input type='text' name='tomtat' placeholder='Tóm tắt nội dung' class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-auto" style="width: 100%;">
                                <h4 class="small font-weight-bold">Nội dung</h4>
                                <textarea name="noidung" class="form-control form-group form-control-sm ckeditor" style=" height: 300px;" ></textarea>	
                            </div>
                        </div>
                        <div class="row" style="margin-top: 2%;">
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary btn-md " name="">Thêm</button>
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-split btn-danger" style="background: #dc3545; border-color: #dc3545;" data-toggle="collapse" data-target="#AddUser" aria-expanded="true" aria-controls="AddUser">Hủy</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            @if(count($errors)>0)
            <span class="error-center" style="margin: 5px 25px;">
                @foreach($errors->all() as $err)
                    {{$err}}</br>
                @endforeach
            </span> 
            @endif
            @if(session('status'))
            <span class="error-center" style="margin: 5px 25px;">
                {{session('status')}}
            </span> 
            @endif

            @if(Auth::check())
            @if(Auth::user()->level==1||Auth::user()->level==2)
            <div class="card-body" style="padding: 0 20px 5px 20px">
                <div class="table-responsive" >
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="color: #000000e6;">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sự kiện</th>
                        <th>Tóm tắt</th>
                        <th>Ảnh bìa</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($sukien as $sk)
                        @if($sk->count() > 0)
                            <tr>
                            <th scope="row">{{$stt++}}</th>
                            <td>
                                <a href="{{route('sukien',['id'=>$sk->id])}}" 
                                    style=" text-decoration: none; color: #000000e6;">
                                    {{$sk->tensukien}}</a>
                            </td>
                            <td>{{$sk->tomtat}}</td>
                            <td><img src="{{asset($sk->img)}}" style="width: 300px;"></td>
                            <td>
                                <a href="javascript:" data-id="{{$sk->id}}" 
                                class="btn btn-split btn-danger delete-btn" >
                                Xóa</a>
                            </td>
                            </tr>
                        @endif
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
            @endif
            @endif
        </div>
    </div>
</div>
</div>
</div>
        <!-- /.container-fluid -->


<script type="text/javascript" src="{{('/bootstrap/js/add.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.delete-btn').click(function(){
            id = $(this).data('id');
            if (confirm("Dữ liệu xoá sẽ không khôi phục được. Bạn có thật sự muốn xoá?")) {
                $.post('{{route('delsukien')}}',{id:id,_token:"{{csrf_token()}}"}).done(function(){
                    location.reload();
                }).fail(function(){
                    alert('Không thể hoàn thành thao tác này');
                })
            }
        })
    })
</script>

@endsection
