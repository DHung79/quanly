@extends('layout.user.index')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Sửa tài liệu tham khảo</h6>
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

<div class="form-edit" style="display: none;">
    <form method="POST" action="{{route('editthamkhao')}}" style="margin: 30px 25px;">
        @csrf
        @foreach ($thamkhao as $dt)
            @if($dt->count() > 0)
        <input type="hidden" name="id" id="id">
        <div class="row">
            <div class="col-xl-12 col-md-6">
                <h4 class="small font-weight-bold">Tên tiêu đề</h4>
                <div class="form-group" >
                <input type='text' name='tieude' value="{{$dt->tendetai}}" class="form-control form-control-sm">
                </div>
            </div>
            <div class="col-xl-12 col-md-6">
                <h4 class="small font-weight-bold">Tóm tắt</h4>
                <div class="form-group" >
                <input type='text' name='tomtat' value="{{$dt->tomtat}}" class="form-control form-control-sm">
                </div>
            </div>
            <div class="col-xl-12 col-md-6">
                <h4 class="small font-weight-bold">Nội dung</h4>
                <textarea name="noidung" class="form-control form-group form-control-sm ckeditor" style=" height: 300px;">{{$dt->noidung}}</textarea>	
            </div>
        </div>
        <div class="row">
            <div class="col-md-1 col-6">
                <button type="submit" class="btn btn-primary btn-md " name="">Sửa</button>
            </div>
            <div class="col-md-1 col-6">
                <button type="button" id="cancel-edit" class="btn btn-primary btn-md " style="background: #dc3545; border-color: #dc3545;">Hủy</button>
            </div>
        </div>
    </form>
</div>

    
                    <tr>
                    <th scope="row">{{$stt++}}</th>
                    <td><form method="POST" action="{{route('tailieu')}}">
                        @csrf
                        <input type="hidden" name="id" value={{$dt->id}}>
                        <div>
                            <div>
                                <button type="submit" style="display: contents;"></button>
                            </div>
                        </div>
                    </form></td>
                    <td></td>
                    
                    @if(Auth::check())
                        @if(Auth::user()->level==1||Auth::user()->level==2)
                        <td><a href="javascript:" data-id="{{$dt->id}}" 
                            data-tieude="{{$dt->tendetai}}" 
                            data-tomtat="{{$dt->tomtat}}" 
                            data-noidung="" class="btn btn-split btn-success edit-btn">Sửa</a>&nbsp;
                            <a href="javascript:" data-id="{{$dt->id}}" class="btn btn-split btn-danger delete-btn" >Xóa</a>
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
				$.post('{{route('delthamkhao')}}',{id:id,_token:"{{csrf_token()}}"}).done(function(){
					location.reload();
				}).fail(function(){
					alert('Không thể hoàn thành thao tác này');
				})
            }
        })
        $('.id-btn').click(function(){
			id = $(this).data('id');
            $.post('{{route('tailieu')}}',{id:id,_token:"{{csrf_token()}}"}).done(function(){
                    location.reload();
            }).fail(function(){
                alert('Không thể hoàn thành thao tác này');
            })
        })
        $('.edit-btn').click(function(){
            id = $(this).data('id');
            tieude = $(this).data('tieude');
            tomtat = $(this).data('tomtat');
            noidung = $(this).data('noidung');
            $('#id').val(id);
            $('#edit-tieude').val(tieude);
            $('#edit-tomtat').val(tomtat);
            $('#edit-noidung').val(noidung);
            $('.form-edit').slideDown();
        })

        $('#cancel-edit').click(function(){
            $('.form-edit').slideUp();
        })
	})
</script>
@endsection
