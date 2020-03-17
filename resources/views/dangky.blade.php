<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1 , height=device-height">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/register.css">
    </head>
    <body>
        <div class="box">
            <form method="POST" action="{{route('register')}}">
                @csrf
                <span class="text-center">Đăng ký</span>
                <center><span class="error-center">@if(count($errors)>0)
                    @foreach($errors->all() as $err)
                        {{$err}}</br>
                    @endforeach
                @endif
                @if(session('status'))
                    {{session('status')}}
                @endif</span></center>
                <br>
                <div class="input-container">
                    <input class="ho" type='text' name='ho' placeholder='Họ'/>
                    <input class="space" type="text" disabled/>
                    <input class="ten" type='text' name='ten' placeholder='Tên'/>
                    <label></label>
                </div>
                <div class="input-container">
                    <input class="text" type='text' name='email' placeholder='Email'/>	
                    <label></label>  
                </div>
                <div class="input-container">
                    <input class="text" type='password' name='password' placeholder='Mật khẩu'/>	
                    <label></label>
                </div>
                <div class="input-container">
                    <label>Giới tính</label>  
                    <select class="gt" name='giotinh'>
                        <option value="1">Nam</option>
                        <option value="2">Nữ</option>
                        <option value="3">Khác</option>
                    </select>	
                </div>
                <div class="input-container">
                    <label>Ngày sinh</label>
                    <input class="date" type='date' name='ngaysinh'/>	
                </div>
                <div class="input-container">
                    <input class="text" type='text' name='diachi' placeholder='Địa chỉ'/>	
                    <label></label>
                </div>
                <div class="input-container">
                    <input class="text" type='text' name='quequan' placeholder='Quê quán'/>	
                    <label></label>
                </div>
                <div class="input-container">
                    <input class="text" type='tel' name='sodt' placeholder='Số điện thoại'/>	
                    <label></label>
                </div>
                <div class="input-container">
                    <label>Lớp</label>  
                    <select class="lop" name='lop'>
                        @foreach($lop as $class)
                        <option value="{{$class->id}}">
                            {{$class->tenlop}}
                        </option>
                        @endforeach
                    </select>	
                </div>
                    <center><button type="submit" class="btn" name="dangky">Đăng ký</button></center>
            </form>	
        </div>
</body>
</html>