@extends('layout.user.index')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->

<!-- DataTales Example -->



<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Đề tài, công trình nghiên cứu khoa học:</h6>
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

    <div class="form-edit" style=" display: none; color: #3a3b45;">
        <form method="POST" action="{{route('editdetai')}}" style="margin: 0px 25px 20px 25px;" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$detai->id}}">
            <h4 class="font-weight-bold">Chỉnh sửa đề tài</h4>
            <hr style="margin-top: 0; margin-bottom: 10px">
            <div class="row">
                <div class="col-auto">
                    <h4 class="font-weight-bold" style="font-size: large">Tên đề tài</h4>
                    <div class="form-group" >
                        <input type='text' name='tendetai' value="{{$detai->tendetai}}" class="form-control form-control-sm">
                    </div>
                    <h4 class="small font-weight-bold" style="font-size: large">Tóm tắt đề tài</h4>
                    <div class="form-group" >
                        <input type='text' name='tomtat' value="{{$detai->tomtat}}" class="form-control form-control-sm">
                    </div>
                    <h4 class="small font-weight-bold" style="font-size: large">Mục tiêu đề tài</h4>
                    <textarea name="noidung" 
                    class="form-control form-group form-control-sm ckeditor" 
                    style="">{{$detai->noidung}}</textarea>	
                    <h4 class="small font-weight-bold" style="font-size: large; margin-top:5px;">Thời gian thực hiện</h4>
                    <div class="form-group" >
                        <input type='date' name='thoigianthuchien' id="edit_tgth" class="form-control form-control-sm">
                    </div> 
                    <h4 class="small font-weight-bold" style="font-size: large">Thời gian kết thúc</h4>
                    <div class="form-group" >
                        <input type='date' name='thoigianketthuc' id="edit_tgkt" class="form-control form-control-sm">
                    </div>
                    <h4 class="small font-weight-bold" style="font-size: large">File</h4>
                    <div class="form-group" >
                        <input type='file' name='files[]' class="form-control form-control-sm" multiple>
                    </div>
                    <h4 class="small font-weight-bold" style="font-size: large">Hướng phát triển</h4>
                        @if(isset($detai->huongphattrien))
                            <textarea name="huongphattrien" 
                            class="form-control form-group form-control-sm ckeditor" 
                            style="">{{$detai->huongphattrien}}</textarea>	
                        @else
                            <textarea name="huongphattrien" 
                            class="form-control form-group form-control-sm ckeditor" 
                            style=""></textarea>	
                        @endif
                    <h4 class="small font-weight-bold" style="font-size:large; margin-top:5px;">Giải pháp</h4>
                    @if(isset($detai->giaiphap))
                        <textarea name="giaiphap" 
                        class="form-control form-group form-control-sm ckeditor" 
                        style="">{{$detai->giaiphap}}</textarea>	
                    @else
                        <textarea name="giaiphap" 
                        class="form-control form-group form-control-sm ckeditor" 
                        style=""></textarea>	
                    @endif	
                </div>
                <div class="col-xl-12 col-md-6"> 
                    <div class="row" style="margin-top: 10px">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-success btn-md " name="">Cập nhật</button>
                        </div>
                        <div class="col-auto">
                            <button type="button" id="cancel-edit" class="btn btn-primary btn-md " style="background: #dc3545; border-color: #dc3545;">Hủy</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
        
    <div class="form-danhgia" style=" display: none; color: #3a3b45;">
        <form method="POST" action="{{route('danhgiatiendo')}}" style="margin: 0px 25px 20px 25px;" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$detai->id}}">
            <div class="row">
                @if(Auth::check())
                    @if(Auth::user()->level==1||Auth::user()->level==2)
                    <div class="col-auto"> 
                        <h4 class="font-weight-bold">Đánh giá tiến độ</h4>
                        <hr style="margin-top: 0; margin-bottom: 10px">
                        <div class="form-group" >
                            <h4 class="small font-weight-bold">Cơ sở lý thuyết</h4>
                            <div class="col-auto" style="padding-left:0;"> 
                                <input type='number' name='cosolythuyet' min="0" max="100" class="form-control form-control-sm" 
                                    @if(isset($dstiendo->where('iddetai',$detai->id)->first()->cosolythuyet))
                                        value="{{$cosolythuyet = $dstiendo->where('iddetai',$detai->id)->first()->cosolythuyet}}">
                                    @else
                                        value="{{$cosolythuyet = 0}}">
                                    @endif
                            </div>
                        </div>
                        <div class="form-group" >
                            <h4 class="small font-weight-bold">Phân tích thiết kế hệ thống</h4>
                            <div class="col-auto" style="padding-left:0;"> 
                                <input type='number' name='ptthietkehethong' min="0" max="100" class="form-control form-control-sm" 
                                    @if(isset($dstiendo->where('iddetai',$detai->id)->first()->ptthietkehethong))
                                        value="{{$ptthietkehethong = $dstiendo->where('iddetai',$detai->id)->first()->ptthietkehethong}}">
                                    @else
                                        value="{{$ptthietkehethong = 0}}">
                                    @endif
                            </div>
                        </div>
                        <div class="form-group" >
                            <h4 class="small font-weight-bold">Kết quả đạt được</h4>
                            <div class="col-auto" style="padding-left:0;"> 
                                <input type='number' name='ketquadatduoc' min="0" max="100" class="form-control form-control-sm" 
                                    @if(isset($dstiendo->where('iddetai',$detai->id)->first()->ketquadatduoc))
                                        value="{{$ketquadatduoc = $dstiendo->where('iddetai',$detai->id)->first()->ketquadatduoc}}">
                                    @else
                                        value="{{$ketquadatduoc = 0}}">
                                    @endif
                            </div>
                        </div>
                    </div>
                    @endif
                @endif
            </div>
            <div class="row">
                <div class="col-auto">
                    <button type="submit" class="btn btn-success btn-md " name="">Đánh giá</button>
                </div>
                <div class="col-auto">
                    <button type="button" id="cancel-danhgia" class="btn btn-primary btn-md " style="background: #dc3545; border-color: #dc3545;">Hủy</button>
                </div>
            </div>
        </form>
    </div>

    <div class="form-nghiemthu" style=" display: none; color: #3a3b45;">
        <form method="POST" action="{{route('nghiemthudetai')}}" style="margin: 0px 25px 20px 25px;" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$detai->id}}">
            <div class="row">
                @if(Auth::check())
                    @if(Auth::user()->level==1||Auth::user()->level==2)
                    <div class="col-auto"> 
                        <h4 class="font-weight-bold">Nghiệm thu</h4>
                        <hr style="margin-top: 0; margin-bottom: 10px">
                        <h4 class="font-weight-bold" style="font-size: large">Điểm đánh giá</h4>
                        <div class="form-group" >
                            <input type='number' min="0" max="10" name='diemdanhgia' class="form-control form-control-sm" 
                                @if(isset($nghiemthu->diemdanhgia))
                                    value="{{$diemdanhgia = $nghiemthu->diemdanhgia}}">
                                @else
                                    value="{{$diemdanhgia = 0}}">
                                @endif
                            <h4 class="small font-weight-bold" style="font-size: large; margin-top:5px; ">Nhận xét chung</h4>
                                @if(isset($nghiemthu->nhanxetchung))
                                    <textarea name="nhanxetchung" 
                                    class="form-control form-group form-control-sm ckeditor" 
                                    style="">{{$nghiemthu->nhanxetchung}}</textarea>	
                                @else
                                    <textarea name="nhanxetchung" 
                                    class="form-control form-group form-control-sm ckeditor" 
                                    style=""></textarea>	
                                @endif
                            </div>
                        </div>
                    @endif
                @endif
            </div>
            <div class="row">
                <div class="col-auto">
                    <button type="submit" class="btn btn-success btn-md " name="">Nghiệm thu</button>
                </div>
                <div class="col-auto">
                    <button type="button" id="cancel-nghiemthu" class="btn btn-primary btn-md " style="background: #dc3545; border-color: #dc3545;">Hủy</button>
                </div>
            </div>
        </form>
    </div>

    @if(Auth::check())
        @if(Auth::user()->level==1||Auth::user()->level==2)
            <div class="row" style="margin: 0px 0px 5px 10px;">
                <div class="col-auto" >
                    <a href="javascript:" class="btn btn-split btn-success edit-btn"
                    data-tgth="{{$detai->thoigianthuchien}}" 
                    data-tgkt="{{$detai->thoigianketthuc}}">
                        Chỉnh sửa đề tài</a>
                </div>
                <div class="col-auto" >
                    <a href="javascript:" class="btn btn-split btn-info danhgia-btn">
                        Đánh giá tiến độ</a>
                </div>
                <div class="col-auto" >
                    <a href="javascript:" class="btn btn-split btn-warning nghiemthu-btn">
                        Nghiệm thu</a>
                </div>
            </div>
        @endif
        @if(Auth::user()->id==$idedit && Auth::user()->level==3)
            <div class="row" style="margin: 10px 0px 10px 10px;">
                <div class="col-md-1 col-6 " >
                    <a href="javascript:" class="btn btn-split btn-success edit-btn"
                    data-tgth="{{$detai->thoigianthuchien}}" 
                    data-tgkt="{{$detai->thoigianketthuc}}">
                        Sửa</a>
                </div>
            </div>
        @endif
            <div class="card-body" style=" color: #000000; padding: 0 1.25rem; margin-top: 0px; ">
                <div class="col-auto">
                    <div class="col-auto">
                        @if(count($source)>0)
                            @if(Auth::user()->level==1||Auth::user()->level==2||Auth::user()->id==$idedit)
                                <div  class="font-weight-bold text-info text-uppercase ">
                                    File:
                                </div>
                                <div class="row">
                                    @foreach ($source as $s)
                                        <div class="col-md-3 col-6" >
                                            <a href="javascript:" data-id="{{$s->id}}" 
                                                class="btn-split delete-btn" >
                                                <i class="fas fa-times-circle" 
                                                style="color:#e61d23; 
                                                    right: 5%;
                                                    font-size: 20px;
                                                    position: absolute;
                                                    text-decoration: none;"></i>
                                            </a>
                                            <center>
                                                <a href="file/{{$s->tenfile}}" download>
                                                    <img src="{{$s->img}}" style="max-height:200px; max-width:200px">
                                                </a><br>
                                                <p>{{$s->tenfile}}</p>
                                            </center>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
    @endif
            <div class="card-body" style=" color: #000000; padding: 0 10px" id="info">
                <div class="col-auto" style=" color: #000000; margin-top: 0px;">
                    <div  class="font-weight-bold text-info text-uppercase">
                        Tên đề tài:
                    </div> 
                    <div class="mb-2" >{{$detai->tendetai}}</div>
                    <div  class="font-weight-bold text-info text-uppercase">
                        Thành viên: 
                    </div>
                    <div class="mb-2" >
                        @if($svlist->where('idusers',$detai->idtacgia)->count() > 0)
                            {{$svlist->where('idusers',$detai->idtacgia)->first()->hotensv}} (Lớp: {{$sinhvienlop->where('idusers',$detai->idtacgia)->first()->tenlop}})<br>
                        @endif
                        @if($gvlist->where('idusers',$detai->idtacgia)->count() > 0)
                            {{$gvlist->where('idusers',$detai->idtacgia)->first()->hotengv}} (Khoa: {{$giangvienkhoa->where('idusers',$detai->idtacgia)->first()->tenkhoa}})<br>
                        @endif
                        @foreach ($thanhvien as $tv)
                            @if(isset($tv->idgv) && $giangvienkhoa->where('id',$tv->idgv)->first()->idusers != $idedit)
                                {{$tv->hotengv}} (Khoa: {{$giangvienkhoa->where('id',$tv->idkhoa)->first()->tenkhoa}})<br>
                            @endif
                            @if(isset($tv->idsv) && $sinhvienlop->where('id',$tv->idsv)->first()->idusers != $idedit)
                                {{$tv->hotensv}} (Lớp: {{$sinhvienlop->where('idlop',$tv->idlop)->first()->tenlop}})<br>
                            @endif
                        @endforeach
                    </div>
                    @if(isset($detai->thoigianthuchien))
                    <div class="font-weight-bold text-uppercase mb-2">
                        <div class="text-info">Thời gian thực hiện:
                            {{date("d-m-Y",strtotime($detai->thoigianthuchien))}}
                        </div>
                    </div>
                    @endif
                    @if(isset($detai->thoigianketthuc))
                    <div class="font-weight-bold text-uppercase mb-2">
                        <div class="text-info">Thời gian kết thúc:
                            {{date("d-m-Y",strtotime($detai->thoigianketthuc))}}
                        </div>
                    </div>
                    @endif
                    @if(isset($detai->noidung))
                    <div  class="font-weight-bold text-info text-uppercase">
                        Mục tiêu đề tài:
                    </div>
                    <div class="mb-2">
                        {!!$detai->noidung!!}
                    </div>
                    @endif
                    @if(isset($detai->huongphattrien))
                    <div  class="font-weight-bold text-info text-uppercase">
                        Hướng phát triển:
                    </div>
                    <div class="mb-2">
                        {!!$detai->huongphattrien!!}
                    </div>
                    @endif
                    @if(isset($detai->giaiphap))
                    <div  class="font-weight-bold text-info text-uppercase">
                        Giải pháp:
                    </div>
                    <div class="mb-2">
                        {!!$detai->giaiphap!!}
                    </div>
                    @endif
                </div>
                <div class="col-md-12 col-6 ">
                    @if(isset($tiendo->phantramhoanthanh))
                    <div  class="font-weight-bold text-info text-uppercase mb-4">
                        <div class="row">
                        <div style="margin-left: 10px">
                        Tiến độ: {{$tiendo->phantramhoanthanh}}%
                        </div>
                        <div class="col-md-4 col-2" style="margin-top: 7px;">
                            <div class="progress progress-sm mr-2">
                                <div class="progress-bar bg-info" role="progressbar" style="width: {{$tiendo->phantramhoanthanh}}%" 
                                    aria-valuenow="{{$tiendo->phantramhoanthanh}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-md-12 col-6 ">
                    @if(isset($nghiemthu->diemdanhgia))
                    <div  class="font-weight-bold text-info text-uppercase mb-2">
                        Điểm đánh giá: {{$diemdanhgia = $nghiemthu->diemdanhgia}}
                    </div>
                    @endif
                    @if(isset($nghiemthu->nhanxetchung))
                    <div  class="font-weight-bold text-info text-uppercase">
                        Nhận xét chung:
                    </div>
                    <div class="mb-2">
                        {!!$nghiemthu->nhanxetchung!!}
                    </div>
                    @endif
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
			if (confirm("Dữ liệu xoá sẽ không khôi phục được. Bạn có thật sự muốn xoá file này?")) {
				$.post('{{route('delfile')}}',{id:id,_token:"{{csrf_token()}}"}).done(function(){
					location.reload();
				}).fail(function(){
					alert('Không thể hoàn thành thao tác này');
				})
            }
        })
        $('.edit-btn').click(function(){
            tgth = $(this).data('tgth');
            tgkt = $(this).data('tgkt');
            $('#edit_tgth').val(tgth);
            $('#edit_tgkt').val(tgkt);
            $('.edit-btn').hide();
            $('.danhgia-btn').hide();
            $('.nghiemthu-btn').hide();
            $('.form-edit').slideDown();
            $('#info').hide();
        })

        $('#cancel-edit').click(function(){
            $('.form-edit').slideUp();
            $('.edit-btn').show();
            $('.danhgia-btn').show();
            $('.nghiemthu-btn').show();
            $('#info').show();
        })
        $('.danhgia-btn').click(function(){
            $('.edit-btn').hide();
            $('.danhgia-btn').hide();
            $('.nghiemthu-btn').hide();
            $('.form-danhgia').slideDown();
            $('#info').hide();
        })

        $('#cancel-danhgia').click(function(){
            $('.form-danhgia').slideUp();
            $('.edit-btn').show();
            $('.danhgia-btn').show();
            $('.nghiemthu-btn').show();
            $('#info').show();
        })
        $('.nghiemthu-btn').click(function(){
            $('.edit-btn').hide();
            $('.danhgia-btn').hide();
            $('.nghiemthu-btn').hide();
            $('.form-nghiemthu').slideDown();
            $('#info').hide();
        })

        $('#cancel-nghiemthu').click(function(){
            $('.form-nghiemthu').slideUp();
            $('.edit-btn').show();
            $('.danhgia-btn').show();
            $('.nghiemthu-btn').show();
            $('#info').show();
        })
	})
</script>
@endsection
