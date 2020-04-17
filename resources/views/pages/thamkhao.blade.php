@extends('layout.user.index')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Đề tài tham khảo</h6>
</div>

<div class="row">
    <div class="col-md-6">
    @if(Auth::check())
        @if(Auth::user()->level==1||Auth::user()->level==2)
            <button class="btn btn-primary btn-md" style="margin: 10px 25px;" href="#" data-toggle="collapse" data-target="#AddUser" aria-expanded="true" aria-controls="AddUser">
                <i class="fas fa-plus-circle"></i>&nbsp Thêm tài liệu tham khảo
            </button>
        @endif
    @endif
    </div>
</div>
<div id="AddUser" class="collapse" aria-labelledby="AddUser" data-parent="#accordionSidebar">
    <div class="form-add" >
        <form method="POST" action="{{route('addthamkhao')}}" style="margin: 30px 25px;">
            @csrf
            <div class="row">
                <div class="col-xl-12 col-md-6">
                    <h4 class="small font-weight-bold">Tên tiêu đề</h4>
                    <div class="form-group" >
                    <input type='text' name='tieude' placeholder='Tên đề tài' class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-xl-12 col-md-6">
                    <h4 class="small font-weight-bold">Tóm tắt nội dung</h4>
                    <div class="form-group" >
                    <input type='text' name='tomtat' placeholder='Tóm tắt nội dung' class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-xl-12 col-md-6">
                    <h4 class="small font-weight-bold">Nội dung</h4>
                    <textarea name="noidung" class="form-control form-group form-control-sm " style=" height: 300px;"></textarea>	
                </div>
            </div>
            <div class="row">
                <div class="col-md-1 col-6">
                    <button type="submit" class="btn btn-primary btn-md btn-add" name="">Thêm</button>
                </div>
                <div class="col-md-1 col-6">
                    <button type="button" class="btn btn-split btn-danger" style="background: #dc3545; border-color: #dc3545;" data-toggle="collapse" data-target="#AddUser" aria-expanded="true" aria-controls="AddUser">Hủy</button>
                </div>
            </div>
        </form>
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
    <p class="btn btn-primary btn-md" style="margin: 10px 25px;">
        <i class="fas fa-plus-circle"></i>&nbsp Sửa tham khảo
    </p>
    <form method="POST" action="{{route('editthamkhao')}}" style="margin: 30px 25px;">
        @csrf
        <input type="hidden" name="id" id="id">
        <div class="row">
            <div class="col-xl-12 col-md-6">
                <h4 class="small font-weight-bold">Tên tiêu đề</h4>
                <div class="form-group" >
                <input type='text' id="edit-tieude" name='tieude' placeholder='Tên đề tài' class="form-control form-control-sm">
                </div>
            </div>
            <div class="col-xl-12 col-md-6">
                <h4 class="small font-weight-bold">Tóm tắt nội dung</h4>
                <div class="form-group" >
                <input type='text' id="edit-tomtat" name='tomtat' placeholder='Tóm tắt nội dung' class="form-control form-control-sm">
                </div>
            </div>
            <div class="col-xl-12 col-md-6">
                <h4 class="small font-weight-bold">Nội dung</h4>
                <textarea  id="edit-noidung" name="noidung" class="form-control form-group form-control-sm " style=" height: 300px;"></textarea>	
            </div>
        </div>
        <div class="row">
            <div class="col-md-1 col-6">
                <button type="submit" class="btn btn-primary btn-md btn-add" name="">Sửa</button>
            </div>
            <div class="col-md-1 col-6">
                <button type="button" id="cancel-edit" class="btn btn-primary btn-md btn-add" style="background: #dc3545; border-color: #dc3545;">Hủy</button>
            </div>
        </div>
    </form>
</div>

<div class="card-body">
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>STT</th>
            <th>Sinh viên thực hiện</th>
            <th>Tên đề tài</th>
            <th>GVHD</th>
            @if(Auth::check())
            @if(Auth::user()->level==1||Auth::user()->level==2)
                <th>Thao tác</th>
            @endif
            @endif
        </tr>
        </thead>
            <tbody>
                @foreach ($thamkhao as $dt)
                @if($dt->count() > 0)
                    <tr>
                    <th scope="row">{{$stt++}}</th>
                    <td>{{$dt->ho}} {{$dt->ten}}</td>
                    <td>{{$dt->tendetai}}</td>
                    <td>{{$dt->gvhd}}</td>
                    @if(Auth::check())
                        @if(Auth::user()->level==1||Auth::user()->level==2)
                        <td><a href="javascript:" data-id="{{$dt->id}}" data-tieude="{{$dt->tendetai}}" class="btn btn-split btn-success edit-btn">Sửa</a>&nbsp;
                            <a href="javascript:" class="btn btn-split btn-danger delete-btn" data-id="{{$dt->id}}">Xóa</a>
                        </td>
                        @endif
                    @endif
                    </tr>
                @endif
            @endforeach
            </tbody>
    </table>
    </div>
</div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script type="text/javascript" src="{{('/bootstrap/js/add_edit.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.delete-btn').click(function(){
			id = $(this).data('id');
			if (confirm("Dữ liệu xoá sẽ không khôi phục được. Bạn có thật sự muốn xoá?")) {
				$.post('{{route('delUser')}}',{id:id,_token:"{{csrf_token()}}"}).done(function(){
					location.reload();
				}).fail(function(){
					alert('Không thể hoàn thành thao tác này');
				})
            }
		})
	})
</script>
@endsection
