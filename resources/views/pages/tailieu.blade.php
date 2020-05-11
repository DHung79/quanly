@extends('layout.user.index')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->

<!-- DataTales Example -->



<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{$tailieu->tieude}}</h6>
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
        <form method="POST" action="{{route('editthamkhao')}}" style="margin: 30px 25px;" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$tailieu->id}}">
            <div class="row">
                <div class="col-xl-12 col-md-6">
                    <h4 class="small font-weight-bold">Tên tiêu đề</h4>
                    <div class="form-group" >
                    <input type='text' name='tieude' value="{{$tailieu->tieude}}" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-xl-12 col-md-6">
                    <h4 class="small font-weight-bold">Tóm tắt</h4>
                    <div class="form-group" >
                    <input type='text' name='tomtat' value="{{$tailieu->tomtat}}" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-xl-12 col-md-6">
                    <h4 class="small font-weight-bold">Ảnh bìa</h4>
                    <div class="form-group" >
                    <input type='file' name='img' class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-xl-12 col-md-6 mb-4">
                    <h4 class="small font-weight-bold">Nội dung</h4>
                    <textarea name="noidung" 
                    class="form-control form-group form-control-sm ckeditor" 
                    style="">{{$tailieu->noidung}}</textarea>	
                </div>
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
        @if(Auth::user()->level==1||Auth::user()->level==2)
        <div class="row" style="margin: 10px 0px 0 10px;">
            <div class="col-md-1 col-6 " >
                <a href="javascript:" class="btn btn-split btn-success edit-btn">
                    Sửa</a>
            </div>
        </div>
        @endif
    @endif
    <div class="card-body" style=" color: #000000;">
        <div >
            <div>
                {!!$tailieu->noidung!!}
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
</div>
<!-- End of Main Content -->


<script type="text/javascript" src="{{('/bootstrap/js/add.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.delete-btn').click(function(){
			id = $(this).data('id');
			if (confirm("Dữ liệu xoá sẽ không khôi phục được. Bạn có thật sự muốn xoá?")) {
				$.post('{{route('delthamkhao')}}',{id:id,_token:"{{csrf_token()}}"}).done(function(){
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
