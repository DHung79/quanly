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
                    <th>Mô Tả</th>
                    <th>GVHD</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                    <tbody>
                    @foreach ($danhsachdt as $dt)
                        @if($dt->count() > 0)
                        <tr>
                            <th scope="row">{{$stt++}}</th>
                            <td>{{$dt->ho}} {{$dt->ten}}</td>
                            <td>{{$dt->tendetai}}</td>
                            <td>{{$dt->mota}}</td>
                            <td>{{$dt->gvhd}}</td>
                            <td><a href="javascript:" data-id="{{$dt->id}}" data-name="{{$dt->daduyet}}"  class="badge badge-success edit-btn">Duyệt</a>
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
