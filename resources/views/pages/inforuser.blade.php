@extends('layout.user.index')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->

<!-- DataTales Example -->



<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">{{$detai->tendetai}}</h6>
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
            <div class="row">
                <div class="col-xl-12 col-md-6">
                    <h4 class="small font-weight-bold">Tên đề tài</h4>
                    <div class="form-group" >
                    <input type='text' name='tendetai' value="{{$detai->tendetai}}" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-xl-12 col-md-6">
                    <h4 class="small font-weight-bold">Tóm tắt đề tài</h4>
                    <div class="form-group" >
                    <input type='text' name='tomtat' value="{{$detai->tomtat}}" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-xl-12 col-md-6">
                    <h4 class="small font-weight-bold">File</h4>
                    <div class="form-group" >
                    <input type='file' name='files[]' class="form-control form-control-sm" multiple>
                    </div>
                </div>
                <div class="col-xl-12 col-md-6 mb-4">
                    <h4 class="small font-weight-bold">Nội dung</h4>
                    <textarea name="noidung" 
                    class="form-control form-group form-control-sm ckeditor" 
                    style="">{{$detai->noidung}}</textarea>	
                </div>
                @if(Auth::check())
                    @if(Auth::user()->level==1||Auth::user()->level==2)
                    <div class="col-xl-12 col-md-6">
                        <h4 class="small font-weight-bold">Tiến độ</h4>
                        <div class="form-group" >
                        <input type='text' name='tiendo' value="{{$detai->tiendo}}" class="form-control form-control-sm">
                        </div>
                    </div>
                    @endif
                @endif
            </div>
            <div class="row">
                <div class="col-md-1 col-6">
                    <button type="submit" class="btn btn-success btn-md " name="">Sửa</button>
                </div>
                <div class="col-md-1 col-6">
                    <button type="button" id="cancel-edit" class="btn btn-primary btn-md " style="background: #dc3545; border-color: #dc3545;">Hủy</button>
                </div>
            </div>
        </form>
    </div>

    @if(Auth::check())
        @if(Auth::user()->level==1||Auth::user()->level==2||Auth::user()->id==$idedit)
        <div class="row" style="margin: 10px 0px 10px 10px;">
            <div class="col-md-1 col-6 " >
                <a href="javascript:" class="btn btn-split btn-success edit-btn">
                    Sửa</a>
            </div>
        </div>
        @endif
            <div class="card-body" style=" color: #000000;">
                <div class="col-md-12 mb-4 col-6 ">
                    @if(isset($source))
                        @if(Auth::user()->level==1||Auth::user()->level==2||Auth::user()->id==$idedit)
                            <div  class="font-weight-bold text-info text-uppercase mb-4">
                                File:
                            </div>
                            <div class="row">
                                @foreach ($source as $s)
                                    <div class="col-md-3 mb-4 col-6" >
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
                                            <img src="{{$s->img}}" style="max-height:200px; max-width:200px"><br><br>
                                            <a style="ma" >{{$s->tenfile}}</a>
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
	})
</script>
@endsection
