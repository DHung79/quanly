<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Đăng ký</title>

<!-- Custom fonts for this template-->
<link href="bootstrap/bootstrap_table_login/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="bootstrap/bootstrap_table_login/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
        <div class="col-lg-7">
            <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Đăng ký</h1>
            </div>
            <form class="user" method="POST" action="{{route('register')}}">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" 
                        name='ho' id="exampleFirstName" placeholder="Họ">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user" 
                        name='ten' id="exampleLastName" placeholder="Tên">
                    </div>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control form-control-user" 
                    name='email' id="exampleInputEmail" placeholder="Email">
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control form-control-user" 
                        name='password' id="exampleInputPassword" placeholder="Mật khẩu">
                    </div>
                    <div class="col-sm-6">
                        <input class="form-control form-control-user" 
                        type='date' name='ngaysinh'/>	
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <select class="form-control" name='gioitinh'
                        style="height: 3rem; 
                        font-size: .8rem; 
                        border-radius: 10rem;">
                            <option value=""hidden>Giới tính</option>
                            <option value="1">Nam</option>
                            <option value="2">Nữ</option>
                            <option value="3">Khác</option>
                        </select>	
                    </div>
                    <div class="col-sm-6">
                        <select class="form-control" name='lop'
                        style="height: 3rem; 
                        font-size: .8rem; 
                        border-radius: 10rem;">
                            <option value=""hidden>Lớp</option>
                            @foreach($lop as $class)
                                <option value="{{$class->id}}">
                                    {{$class->tenlop}}
                                </option>
                            @endforeach
                        </select>	
                    </div>
                </div>
                <div class="form-group">
                    <input class="form-control form-control-user" 
                    type='tel' name='sodt' placeholder='Số điện thoại'/>	
                </div>
                <div class="form-group">
                    <input class="form-control form-control-user" 
                    type='text' name='quequan' placeholder='Quê quán'/>	
                </div>
                <div class="form-group">
                    <input class="form-control form-control-user" 
                    type='text' name='diachi' placeholder='Địa chỉ'/>	
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block" 
                name="dangky">Đăng ký</button>
            </form>
            <hr>
            <span style="color: #ff1717f5;" class="font-weight-bold">
                @if(count($errors)>0)
                    @foreach($errors->all() as $err)
                        {{$err}}<hr>
                    @endforeach
                @endif
                @if(session('status'))
                    {{session('status')}}
                @endif
            </span>
            <div class="text-center">
            <a class="small" href="{{route("getlogin")}}">Đã có tài khoản? Đăng nhập!</a>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="bootstrap/bootstrap_table_login/vendor/jquery/jquery.min.js"></script>
<script src="bootstrap/bootstrap_table_login/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="bootstrap/bootstrap_table_login/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="bootstrap/bootstrap_table_login/js/sb-admin-2.min.js"></script>

</body>

</html>
