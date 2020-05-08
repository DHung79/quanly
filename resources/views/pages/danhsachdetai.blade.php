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
    <div class="table-responsive" >
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="color: #000000e6;">
        <thead>
          <tr>
            <th>STT</th>
            <th>Sinh viên thực hiện</th>
            <th>Tên đề tài</th>
            <th>GVHD</th>
            <th>Tiến độ</th>
            @if(Auth::check())
              @if(Auth::user()->level==1||Auth::user()->level==2)
                <th >Thao tác</th>
              @endif
            @endif
          </tr>
        </thead>
              <tbody>
                @foreach ($danhsachdt as $dt)
                  @if($dt->count() > 0)
                    <tr>
                      <th scope="row">{{$stt++}}</th>
                      <td>{{$dt->ho}} {{$dt->ten}}</td>
                      <td>
                        <a href="{{route('userdetai',['id'=>$dt->id])}}" 
                          style=" text-decoration: none; color: #000000e6;">
                          {{$dt->tendetai}}</a>
                      </td>
                      <td>{{$dt->gvhd}}</td>
                      <td>{{$dt->tiendo}}%
                        <div class="progress mb-4">
                          <div class="progress-bar" role="progressbar" style="width: {{$dt->tiendo}}%" aria-valuenow="{{$dt->tiendo}}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </td>
                      @if(Auth::check())
                        @if(Auth::user()->level==1||Auth::user()->level==2)
                          <td>
                              <div class="card mb-4">
                                <a href="javascript:" 
                                class="btn btn-split btn-danger delete-btn" 
                                data-id="{{$dt->id}}">Xóa</a>
                              </div>
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
<script type="text/javascript" src="{{('/bootstrap/js/add.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.delete-btn').click(function(){
            id = $(this).data('id');
            if (confirm("Dữ liệu xoá sẽ không khôi phục được. Bạn có thật sự muốn xoá?")) {
                $.post('{{route('deldetai')}}',{id:id,_token:"{{csrf_token()}}"}).done(function(){
                    location.reload();
                }).fail(function(){
                    alert('Không thể hoàn thành thao tác này');
                })
            }
        })
    })
</script>
@endsection
