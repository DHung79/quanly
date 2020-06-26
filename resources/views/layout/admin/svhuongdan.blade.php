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
    <h6 class="m-0 font-weight-bold text-primary">Sinh viên hướng dẫn</h6>
</div>
<div class="card-body">
    <div class="table-responsive" >
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="color: #000000e6;">
        <thead>
        <tr>
            <th>STT</th>
            <th>Thành viên</th>
            <th>Lớp</th>
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
                @foreach ($dssvhd as $dt)
                @if($dt->count() > 0)
                    <tr>
                    <th scope="row">{{$stt++}}</th>
                    @if($svlist->where('idusers',$dt->idtacgia)->count() > 0)
                        <td>
                        {{$svlist->where('idusers',$dt->idtacgia)->first()->hotensv}} (Tác giả)<br>
                        @foreach ($dsthanhvien as $tv)
                            {{-- @if(isset($tv->idgv))
                                {{$tv->hotengv}}<br>
                            @endif --}}
                            @if(isset($tv->idsv) && $tv->id == $dt->id)
                                {{$tv->hotensv}}<br>
                            @endif
                        @endforeach
                        </td>
                        <td>
                        {{$sinhvienlop->where('idusers',$dt->idtacgia)->first()->tenlop}}<br>
                        @foreach ($dsthanhvien as $tv)
                            {{-- @if(isset($tv->idgv))
                                {{$giangvienkhoa->where('id',$tv->idgv)->first()->tenkhoa}}<br>
                            @endif --}}
                            @if(isset($tv->idsv) && $tv->id == $dt->id)
                                {{$sinhvienlop->where('idlop',$tv->idlop)->first()->tenlop}}<br>
                            @endif
                        @endforeach
                        </td>
                    @endif
                    @if($gvlist->where('idusers',$dt->idtacgia)->count() > 0)
                        <td>
                        {{$gvlist->where('idusers',$dt->idtacgia)->first()->hotengv}}<br>
                            @foreach ($dsthanhvien as $tv)
                            @if(isset($tv->idgv) && $tv->id == $dt->id)
                                {{$tv->hotengv}}<br>
                            @endif
                            @if(isset($tv->idsv) && $tv->id == $dt->id)
                                {{$tv->hotensv}}<br>
                            @endif
                            @endforeach
                        </td>
                        <td>
                        {{$giangvienkhoa->where('idusers',$dt->idtacgia)->first()->tenkhoa}}<br>
                        @foreach ($dsthanhvien as $tv)
                            @if(isset($tv->idgv) && $tv->id == $dt->id)
                                {{$giangvienkhoa->where('id',$tv->idgv)->first()->tenkhoa}}<br>
                            @endif
                            @if(isset($tv->idsv) && $tv->id == $dt->id)
                                {{$sinhvienlop->where('idlop',$tv->idlop)->first()->tenlop}}<br>
                            @endif
                        @endforeach
                        </td>
                    @endif
                    <td>
                        <a href="{{route('userdetai',['id'=>$dt->idtacgia])}}" 
                        style=" text-decoration: none; color: #000000e6;">
                        {{$dt->tendetai}}</a>
                    </td>
                    @if($gvhdlist->where('id',$dt->idgvhd)->count() > 0)
                        <td>{{$gvhdlist->where('id',$dt->idgvhd)->first()->hotengv}}</td>
                    @else
                        <td></td>
                    @endif
                    <td>{{$dstiendo->where('iddetai',$dt->id)->first()->phantramhoanthanh}}%
                        <div class="progress mb-4">
                        <div class="progress-bar" role="progressbar" style="width: {{$dstiendo->where('iddetai',$dt->id)->first()->phantramhoanthanh}}%" 
                            aria-valuenow="{{$dstiendo->where('iddetai',$dt->id)->first()->phantramhoanthanh}}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </td>
                    @if(Auth::check())
                        @if(Auth::user()->level==1||Auth::user()->level==2)
                        <td>
                            <div class="card mb-4">
                                <a href="{{route('userdetai',['id'=>$dt->idtacgia])}}" 
                                    class="btn btn-split btn-success edit-btn"
                                    style=" text-decoration: none;">Cập nhật</a>
                            </div>
                            <div class="card mb-4">
                                <a href="javascript:" 
                                class="btn btn-split btn-danger delete-btn" 
                                data-id="{{$dt->idtacgia}}">Xóa</a>
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

@endsection
