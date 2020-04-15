@extends('layout.user.index')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
{{-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> --}}

<!-- DataTales Example -->

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Quản lý người dùng</h6>
  </div>
  <div class="row">
    <div class="col-md-3">
      <button class="btn btn-primary btn-md" style="margin: 10px 25px;" href="#" data-toggle="collapse" data-target="#AddUser" aria-expanded="true" aria-controls="AddUser">
        <i class="fas fa-plus-circle"></i>&nbspThêm Người Dùng</button>
    </div>
  </div>
  <div id="AddUser" class="collapse" aria-labelledby="AddUser" data-parent="#accordionSidebar">
    <div class="form-add" style="margin: 5px 25px;">
      <form action="{{route('addadmin')}}" method="post">
        @csrf
        <div class="row">
          <div class="col-xl-4 col-md-6">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control form-control-sm" name="email">
            </div>
          </div>
          <div class="col-xl-2 col-md-6">
            <select class="form-control form-control-sm " name='level'>
                <option value=""hidden>Cấp</option>
                <option value="1">Quản Trị viên</option>
                <option value="2">Giảng viên</option>
                <option value="3">Sinh viên</option>
            </select>	
          </div>
          <div class="col-xl-4 col-md-6">
          </div>
          <div class="col-xl-4 col-md-6">
            <div class="form-group">
              <input type="password" placeholder="Mật khẩu" class="form-control form-control-sm" name="password">
            </div>
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

    <div class="form-edit" style="margin: 5px 25px; display: none;">
      <form action="{{route('editUser')}}" method="post">
        @csrf
        <input type="hidden" name="id" id="id">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="name">Email:</label>
              <input type="text" id="edit-email" name="email" class="form-control form-control-sm">
            </div>
            <div class="form-group">
              <label for="name">Cấp:</label>
              <select class="form-control form-control-sm " id="edit-level" name="level">
                <option value=""hidden>Cấp</option>
                <option value="1">Quản Trị viên</option>
                <option value="2">Giảng viên</option>
                <option value="3">Sinh viên</option>
            </select>	
            </div>
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
            <th>Tài khoản</th>
            <th>Cấp</th>
            @if(Auth::check())
              @if(Auth::user()->level==1)
                <th>Thao tác</th>
              @endif
            @endif
          </tr>
        </thead>
              <tbody>
                @foreach ($user as $dt)
                  @if($dt->count() > 0 && $dt->id != $iduser)
                    <tr>
                      <th scope="row">{{$stt++}}</th>
                      <td>{{$dt->email}}</td>
                      @if($dt->level==1)
                        <td>Quản trị viên</td>
                      @endif
                      @if($dt->level==2)
                        <td>Giảng viên</td>
                      @endif
                      @if($dt->level==3)
                        <td>Sinh viên</td>
                      @endif
                      @if(Auth::check())
                        @if(Auth::user()->level==1)
                          <td>
                            <a href="javascript:" data-id="{{$dt->id}}" data-level="{{$dt->level}}" data-email="{{$dt->email}}" class="btn btn-split btn-success edit-btn">Sửa</a>&nbsp;
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
