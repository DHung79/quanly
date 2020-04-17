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
        <h6 class="m-0 font-weight-bold text-primary">Đề tài đợi duyệt</h6>
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
                    @foreach ($duyet as $dt)
                        @if($dt->count() > 0)
                            <tr>
                                <th scope="row">{{$stt++}}</th>
                                <td>{{$dt->ho}} {{$dt->ten}}</td>
                                <td>{{$dt->tendetai}}</td>
                                <td>{{$dt->mota}}</td>
                                <td>{{$dt->gvhd}}</td>
                                <td>
                                    <a href="javascript:" data-id="{{$dt->id}}" class="btn btn-split btn-success form-group duyet-btn">Duyệt</a>
                                    <a href="javascript:" class="btn btn-split btn-danger form-group delete-btn" data-id="{{$dt->id}}">Xóa</a>
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
<script type="text/javascript">
	$(document).ready(function(){
		$('.duyet-btn').click(function(){
			id = $(this).data('id');
            $.post('{{route('duyetdt')}}',{id:id,_token:"{{csrf_token()}}"}).done(function(){
                location.reload();
            }).fail(function(){
                alert('Không thể hoàn thành thao tác này');
            })
            
        })
        $('.delete-btn').click(function(){
			id = $(this).data('id');
			if (confirm("Dữ liệu xoá sẽ không khôi phục được. Bạn có thật sự muốn xoá?")) {
				$.post('{{route('delduyetdt')}}',{id:id,_token:"{{csrf_token()}}"}).done(function(){
					location.reload();
				}).fail(function(){
					alert('Không thể hoàn thành thao tác này');
				})
            }
		})
	})
</script>

@endsection
