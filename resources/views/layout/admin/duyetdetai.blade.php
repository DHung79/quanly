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
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="color: #000000e6;">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tác giả</th>
                    <th>Lớp/ Khoa</th>
                    <th>Tên đề tài</th>
                    <th>Tóm tắt</th>
                    <th>GVHD</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                    <tbody>
                    @foreach ($duyet as $dt)
                        @if($dt->count() > 0)
                            <tr>
                                <th scope="row">{{$stt++}}</th>
                                @if($svlist->where('idusers',$dt->idtacgia)->count() > 0)
                                    <td>{{$svlist->where('idusers',$dt->idtacgia)->first()->hotensv}}</td>
                                    <td>{{$sinhvienlop->where('idusers',$dt->idtacgia)->first()->tenlop}}</td>
                                @endif
                                @if($gvlist->where('idusers',$dt->idtacgia)->count() > 0)
                                    <td>{{$gvlist->where('idusers',$dt->idtacgia)->first()->hotengv}}</td>
                                    <td>{{$giangvienkhoa->where('idusers',$dt->idtacgia)->first()->tenkhoa}}</td>
                                @endif
                                <td><a href="{{route('userdetai',['id'=>$dt->id])}}" 
                                    style=" text-decoration: none; color: #000000e6;">
                                    {{$dt->tendetai}}</a></td>
                                <td>{{$dt->tomtat}}</td>
                                @if($gvhdlist->where('id',$dt->idgvhd)->count() > 0)
                                    <td>{{$gvhdlist->where('id',$dt->idgvhd)->first()->hotengv}}</td>
                                @else
                                    <td></td>
                                @endif
                                <td>
                                    <div class="card mb-4">
                                        <a href="javascript:" 
                                        class="btn btn-split btn-success duyet-btn"
                                        data-id="{{$dt->id}}">Duyệt</a>
                                    </div>
                                    <div class="card mb-4">  
                                        <a href="javascript:" 
                                        class="btn btn-split btn-danger delete-btn" 
                                        data-id="{{$dt->id}}">Xóa</a>
                                    </div>
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
