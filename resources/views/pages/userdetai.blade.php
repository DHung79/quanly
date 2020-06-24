@extends('layout.user.index')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->

<!-- DataTales Example -->



<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Đề tài, công trình nghiên cứu khoa học: {{$detai->tendetai}}</h6>
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
        <form method="POST" action="{{route('editdetai')}}" style="margin: 30px 25px;" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$detai->id}}">
            <h4 class="font-weight-bold">Chỉnh sửa đề tài</h4>
            <hr style="margin-top: 0; margin-bottom: 10px">
            <div class="row">
                <div class="col-xl-12 col-md-6">
                    <h4 class="font-weight-bold" style="font-size: large">Tên đề tài</h4>
                    <div class="form-group" >
                    <input type='text' name='tendetai' value="{{$detai->tendetai}}" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-xl-12 col-md-6">
                    <h4 class="small font-weight-bold" style="font-size: large">Tóm tắt đề tài</h4>
                    <div class="form-group" >
                    <input type='text' name='tomtat' value="{{$detai->tomtat}}" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-xl-12 col-md-6">
                    <h4 class="small font-weight-bold" style="font-size: large">File</h4>
                    <div class="form-group" >
                    <input type='file' name='files[]' class="form-control form-control-sm" multiple>
                    </div>
                </div>
                <div class="col-xl-12 col-md-6 mb-4">
                    <h4 class="small font-weight-bold" style="font-size: large">Nội dung</h4>
                    <textarea name="noidung" 
                    class="form-control form-group form-control-sm ckeditor" 
                    style="">{{$detai->noidung}}</textarea>	
                </div>
            </div>
                <div class="row">
                    <div class="col-md-2 col-6">
                        <button type="submit" class="btn btn-success btn-md " name="">Cập nhật</button>
                    </div>
                    <div class="col-md-1 col-6">
                        <button type="button" id="cancel-edit" class="btn btn-primary btn-md " style="background: #dc3545; border-color: #dc3545;">Hủy</button>
                    </div>
                </div>
            </form>
        </div>
        
    <div class="form-danhgia" style=" display: none;">
        <form method="POST" action="{{route('editdetai')}}" style="margin: 30px 25px;" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$detai->id}}">
            <div class="row">
                @if(Auth::check())
                    @if(Auth::user()->level==1||Auth::user()->level==2)
                    <div class="col-xl-12 col-md-6"> 
                        <h4 class="font-weight-bold">Đánh giá tiến độ</h4>
                        <hr style="margin-top: 0; margin-bottom: 10px">
                        <div class="form-group" >
                            <h4 class="small font-weight-bold">Cơ sở lý thuyết</h4>
                            <div class="col-xl-6 col-md-6" style="padding-left:0;"> 
                                <input type='number' name='cosolythuyet' class="form-control form-control-sm" 
                                    @if(isset($tiendo->where('iddetai',$detai->id)->first()->cosolythuyet))
                                        value="{{$cosolythuyet = $tiendo->where('iddetai',$detai->id)->first()->cosolythuyet}}">
                                    @else
                                        value="{{$cosolythuyet = 0}}">
                                    @endif
                            </div>
                        </div>
                        <div class="form-group" >
                            <h4 class="small font-weight-bold">Phân tích thiết kế hệ thống</h4>
                            <div class="col-xl-6 col-md-6" style="padding-left:0;"> 
                                <input type='number' name='ptthietkehethong' class="form-control form-control-sm" 
                                    @if(isset($tiendo->where('iddetai',$detai->id)->first()->ptthietkehethong))
                                        value="{{$ptthietkehethong = $tiendo->where('iddetai',$detai->id)->first()->ptthietkehethong}}">
                                    @else
                                        value="{{$ptthietkehethong = 0}}">
                                    @endif
                            </div>
                        </div>
                        <div class="form-group" >
                            <h4 class="small font-weight-bold">Kết quả đạt được</h4>
                            <div class="col-xl-6 col-md-6" style="padding-left:0;"> 
                                <input type='number' name='ketquadatduoc' class="form-control form-control-sm" 
                                    @if(isset($tiendo->where('iddetai',$detai->id)->first()->ketquadatduoc))
                                        value="{{$ketquadatduoc = $tiendo->where('iddetai',$detai->id)->first()->ketquadatduoc}}">
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
                <div class="col-md-2 col-6">
                    <button type="submit" class="btn btn-success btn-md " name="">Đánh giá</button>
                </div>
                <div class="col-md-1 col-6">
                    <button type="button" id="cancel-danhgia" class="btn btn-primary btn-md " style="background: #dc3545; border-color: #dc3545;">Hủy</button>
                </div>
            </div>
        </form>
    </div>

    <div class="form-nghiemthu" style=" display: none;">
        <form method="POST" action="{{route('editdetai')}}" style="margin: 30px 25px;" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$detai->id}}">
            <div class="row">
                @if(Auth::check())
                    @if(Auth::user()->level==1||Auth::user()->level==2)
                    <div class="col-xl-12 col-md-6"> 
                        <h4 class="font-weight-bold">Đánh giá tiến độ</h4>
                        <hr style="margin-top: 0; margin-bottom: 10px">
                        <div class="form-group" >
                            <h4 class="small font-weight-bold">Cơ sở lý thuyết</h4>
                            <div class="col-xl-6 col-md-6" style="padding-left:0;"> 
                                <input type='number' name='cosolythuyet' class="form-control form-control-sm" 
                                    @if(isset($tiendo->where('iddetai',$detai->id)->first()->cosolythuyet))
                                        value="{{$cosolythuyet = $tiendo->where('iddetai',$detai->id)->first()->cosolythuyet}}">
                                    @else
                                        value="{{$cosolythuyet = 0}}">
                                    @endif
                            </div>
                        </div>
                        <div class="form-group" >
                            <h4 class="small font-weight-bold">Phân tích thiết kế hệ thống</h4>
                            <div class="col-xl-6 col-md-6" style="padding-left:0;"> 
                                <input type='number' name='ptthietkehethong' class="form-control form-control-sm" 
                                    @if(isset($tiendo->where('iddetai',$detai->id)->first()->ptthietkehethong))
                                        value="{{$ptthietkehethong = $tiendo->where('iddetai',$detai->id)->first()->ptthietkehethong}}">
                                    @else
                                        value="{{$ptthietkehethong = 0}}">
                                    @endif
                            </div>
                        </div>
                        <div class="form-group" >
                            <h4 class="small font-weight-bold">Kết quả đạt được</h4>
                            <div class="col-xl-6 col-md-6" style="padding-left:0;"> 
                                <input type='number' name='ketquadatduoc' class="form-control form-control-sm" 
                                    @if(isset($tiendo->where('iddetai',$detai->id)->first()->ketquadatduoc))
                                        value="{{$ketquadatduoc = $tiendo->where('iddetai',$detai->id)->first()->ketquadatduoc}}">
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
                <div class="col-md-2 col-6">
                    <button type="submit" class="btn btn-success btn-md " name="">Đánh giá</button>
                </div>
                <div class="col-md-1 col-6">
                    <button type="button" id="cancel-nghiemthu" class="btn btn-primary btn-md " style="background: #dc3545; border-color: #dc3545;">Hủy</button>
                </div>
            </div>
        </form>
    </div>

    @if(Auth::check())
        @if(Auth::user()->level==1||Auth::user()->level==2)
        <div class="row" style="margin: 10px 0px 10px 10px;">
            <div class="col-md-4 col-6 " >
                <a href="javascript:" class="btn btn-split btn-success edit-btn">
                    Chỉnh sửa đề tài</a>
            </div>
        </div>
        <div class="row" style="margin: 10px 0px 10px 10px;">
            <div class="col-md-4 col-6 " >
                <a href="javascript:" class="btn btn-split btn-success danhgia-btn">
                    Đánh giá tiến độ</a>
            </div>
        </div>
        <div class="row" style="margin: 10px 0px 10px 10px;">
            <div class="col-md-4 col-6 " >
                <a href="javascript:" class="btn btn-split btn-success nghiemthu-btn">
                    Nghiệm thu</a>
            </div>
        </div>
        @endif
        @if(Auth::user()->id==$idedit && Auth::user()->level==3)
        <div class="row" style="margin: 10px 0px 10px 10px;">
            <div class="col-md-1 col-6 " >
                <a href="javascript:" class="btn btn-split btn-success edit-btn">
                    Sửa</a>
            </div>
        </div>
        @endif
            <div class="card-body" style=" color: #000000;">
                <div class="col-md-12 mb-4 col-6 ">
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
                <div class="col-md-12 col-6 ">
                    @if(isset($detai->noidung))
                    <div  class="font-weight-bold text-info text-uppercase mb-4">
                        Nội dung đề tài:
                    </div>
                        {!!$detai->noidung!!}
                    @else
                        @if(Auth::user()->level==3 && Auth::user()->id!=$idedit)
                            <center><h4 class="medium font-weight-bold">
                                Đề tài này chưa có nội dung
                                <br><a href="{{ url()->previous() }}" style=" text-decoration: none;">Vui lòng quay lại sau</a>
                            </h4></center>
                        @endif
                    @endif
                </div>
            </div>
    @endif
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
            $('.edit-btn').hide();
            $('.form-edit').slideDown();
        })

        $('#cancel-edit').click(function(){
            $('.form-edit').slideUp();
            $('.edit-btn').show();
        })
        $('.danhgia-btn').click(function(){
            $('.danhgia-btn').hide();
            $('.form-danhgia').slideDown();
        })

        $('#cancel-danhgia').click(function(){
            $('.form-danhgia').slideUp();
            $('.danhgia-btn').show();
        })
        $('.nghiemthu-btn').click(function(){
            $('.nghiemthu-btn').hide();
            $('.form-nghiemthu').slideDown();
        })

        $('#cancel-nghiemthu').click(function(){
            $('.form-nghiemthu').slideUp();
            $('.nghiemthu-btn').show();
        })
	})
</script>
@endsection
