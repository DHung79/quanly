@extends('layout.user.index')

@section('content')
{{-- <div class="container">

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4">Danh sách đề tài</h1> --}}
        <!-- Preview Image -->
        {{-- <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">
        <hr> --}}
        <!-- Post Content -->
        {{-- <table class="table">
          <thead>
            <tr>
              <th scope="col">Số thứ tự</th>
              <th scope="col">Tên đề tài</th>
              <th scope="col">Sinh viên thực hiện</th> --}}
              {{-- <th scope="col">GVHD</th> --}}
              {{-- <th scope="col">Mô tả</th>
              <th scope="col">tiến độ</th>
            </tr>
          </thead>
          @foreach ($danhsachdt as $dt)
            @if($dt->count() > 0)
              <tbody>
                <tr>
                  <th scope="row">{{$stt++}}</th>
                  <td>{{$dt->tendetai}}</td>
                  <td>{{$dt->ho}}{{$dt->ten}}</td>
                  <td>{{$dt->mota}}</td>
                  <td>{{$dt->tiendo}}</td>
                </tr>
              </tbody>
            @endif
          @endforeach
          
        </table>
        @if($danhsachdt->count() == 0)
          <center class="error-center">Chưa có đề tài nào</center><br>
        @endif
      </div>
    </div>
  </div> --}}

<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
{{-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> --}}

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Danh sách đề tài</h6>
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
            <th>Tiến độ</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        {{-- <tfoot>
          <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Salary</th>
          </tr>
        </tfoot> --}}
              <tbody>
                @foreach ($danhsachdt as $dt)
                  @if($dt->count() > 0)
                    <tr>
                      <th scope="row">{{$stt++}}</th>
                      <td>{{$dt->ho}} {{$dt->ten}}</td>
                      <td>{{$dt->tendetai}}</td>
                      <td>{{$dt->gvhd}}</td>
                      <td>{{$dt->tiendo}}%</td>
                      <td><a href="javascript:" data-id="{{$dt->id}}" data-name="{{$dt->tendetai}}"  class="badge badge-success edit-btn">Sửa</a>
                        <a href="javascript:" class="badge badge-danger delete-btn" data-id="{{$dt->id}}">Xóa</a>
                      </td>
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

@endsection
