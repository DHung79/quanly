<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a href="{{ route('home') }}"><img class="logo" src="/bootstrap/img/LogoTruong.png" /></a>
    <a class="navbar-brand" href="{{ route('home') }}" title="Trang chủ">ĐHTTLL</a>
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
      <button class="btn btn-secondary" type="button">Go!</button>
      </span>
  </div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{route('dsdetai')}}">Danh sách đề tài</a>
        </li>
        @if(Auth::check())
          @if(Auth::user()->level==3)
            <li class="nav-item active">
              <a class="nav-link" href="{{route('getdkdetai')}}">Đăng ký đề tài</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">Tài liệu tham khảo</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('infor')}}" title="Trang cá nhân">
                @foreach ($sinhvien as $sv)
                  {{$sv->ho}}
                  {{$sv->ten}}   
                @endforeach
              </a>
            </li>
          @endif
          @if(Auth::user()->level==2)
            <li class="nav-item active">
              <a class="nav-link" href="{{route('duyetdt')}}">Duyệt đề tài</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('infor')}}" title="Trang cá nhân">
                @foreach ($giangvien as $gv)
                  {{$gv->ho}}
                  {{$gv->ten}}   
                @endforeach
              </a>
            </li>
            @endif
        <li class="nav-item ">
          <a class="nav-link" href="{{ route('logout') }}">Đăng xuất</a>
        </li>
        @else
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('getdkdetai') }}">Đăng ký đề tài</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('getlogin') }}" >Đăng nhập
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('getregister') }}">Đăng ký</a>
          </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
