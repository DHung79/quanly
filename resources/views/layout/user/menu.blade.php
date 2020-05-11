<div id="wrapper">

  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
      <div class="sidebar-brand-icon">
        {{-- <i class="fas fa-laugh-wink"></i> --}}
        <i class="fas fa-home"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Trang chủ<sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
@if(Auth::check())
  @if(Auth::user()->level==1)
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link">
        {{-- <i class="fas fa-fw fa-tachometer-alt"></i> --}}
        <i class="fas fa-user-secret"></i>
        <span>Quản trị viên</span></a>
    </li>
  @endif
  @if(Auth::user()->level==2)
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link">
        {{-- <i class="fas fa-fw fa-tachometer-alt"></i> --}}
        <div style="text-align: center;"><i class="fas fa-fw fa-user-tie" style=""></i>
        <span>Giảng viên</span></div>
      </a>
    </li>
  @endif
  @if(Auth::user()->level==1||Auth::user()->level==2)
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading" style="font-size: .75rem;">
      Quản trị hệ thống
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{route('quanly')}}" data-toggle="" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        {{-- <i class="fas fa-fw fa-cog"></i> --}}
        <i class="fas fa-fw fa-users"></i>
        <span>Quản lý người dùng</span>
      </a>
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{route('dsdetai')}}" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        {{-- <i class="fas fa-fw fa-wrench"></i> --}}
        <i class="fas fa-fw fa-archive"></i>
        <span>Quản lý đề tài</span>
      </a>
      <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Danh sách:</h6>
        <a class="collapse-item" href="{{route('dsdetai')}}">Đề tài khoa học</a>
          <a class="collapse-item" href="{{route('getduyetdt')}}">Đề tài đợi duyệt</a>
          <a class="collapse-item" href="{{route('dssukien')}}">Tin tức - sự kiện</a>
          <a class="collapse-item" href="{{route('thamkhao')}}">Tham khảo</a>
        </div>
      </div>
    </li>
  @endif
  @if(Auth::user()->level==3)
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link">
        {{-- <i class="fas fa-fw fa-tachometer-alt"></i> --}}
        <i class="fas fa-fw fa-user-graduate"></i>
        <span>Sinh viên</span></a>
    </li>
  @endif
  @else 
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link">
        <img class="img-profile rounded-circle" src="\bootstrap\bootstrap_table_login\img\Untitled-1.png">
        <span>ĐH thông tin liên lạc</span><br>
      </a>
    </li>
@endif
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading" style="font-size: .75rem;">
      Đề tài khoa học
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{route('dsdetai')}}" data-toggle="" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        {{-- <i class="fas fa-fw fa-cog"></i> --}}
        <i class="fas fa-fw fa-clipboard-list"></i>
        <span>Danh sách đề tài</span>
      </a>
    <a class="nav-link collapsed" href="{{route('getdkdetai')}}" data-toggle="" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        {{-- <i class="fas fa-fw fa-cog"></i> --}}
        <i class="fas fa-fw fa-edit"></i>
        <span>Đăng ký đề tài</span>
      </a>
      <a class="nav-link collapsed" href="{{route('thamkhao')}}" data-toggle="" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        {{-- <i class="fas fa-fw fa-cog"></i> --}}
        <i class="fas fa-fw fa-book"></i>
        <span>Tham khảo</span>
      </a>
      <li></li>
      {{-- <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Danh sách:</h6>
          <a class="collapse-item" href="buttons.html">Người dùng</a>
          <a class="collapse-item" href="cards.html">Đề tài</a>
        </div>
      </div>
    </li> --}}

    <!-- Nav Item - Utilities Collapse Menu -->
    {{-- <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <i class="fas fa-fw fa-table"></i>
        <span>Quản lý đề tài</span>
      </a>
      <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Danh sách:</h6>
        <a class="collapse-item" href="{{route('dsdetai')}}">Đề tài </a>
          <a class="collapse-item" href="{{route('getduyetdt')}}">Đề tài đợi duyệt</a>
          <a class="collapse-item" href="utilities-animation.html">Kiểm tra tiến độ</a>
          <a class="collapse-item" href="utilities-other.html">Tham khảo</a>
        </div>
      </div>
    </li> --}}

    {{-- <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pages</span>
      </a>
      <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Login Screens:</h6>
          <a class="collapse-item" href="login.html">Login</a>
          <a class="collapse-item" href="register.html">Register</a>
          <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
          <div class="collapse-divider"></div>
          <h6 class="collapse-header">Other Pages:</h6>
          <a class="collapse-item" href="404.html">404 Page</a>
          <a class="collapse-item" href="blank.html">Blank Page</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
      <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
      <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

      <!-- Topbar -->
      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
          <i class="fa fa-bars"></i>
        </button>

        {{-- <!-- Topbar Search -->
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
          <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
              </button>
            </div>
          </div>
        </form> --}}

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

          <!-- Nav Item - Search Dropdown (Visible Only XS) -->
          <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
              <form class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                  <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                      <i class="fas fa-search fa-sm"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li>

          {{-- <!-- Nav Item - Alerts -->
          <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-bell fa-fw"></i>
              <!-- Counter - Alerts -->
              <span class="badge badge-danger badge-counter">3+</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
              <h6 class="dropdown-header">
                Alerts Center
              </h6>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                  <div class="icon-circle bg-primary">
                    <i class="fas fa-file-alt text-white"></i>
                  </div>
                </div>
                <div>
                  <div class="small text-gray-500">December 12, 2019</div>
                  <span class="font-weight-bold">A new monthly report is ready to download!</span>
                </div>
              </a>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                  <div class="icon-circle bg-success">
                    <i class="fas fa-donate text-white"></i>
                  </div>
                </div>
                <div>
                  <div class="small text-gray-500">December 7, 2019</div>
                  $290.29 has been deposited into your account!
                </div>
              </a>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                  <div class="icon-circle bg-warning">
                    <i class="fas fa-exclamation-triangle text-white"></i>
                  </div>
                </div>
                <div>
                  <div class="small text-gray-500">December 2, 2019</div>
                  Spending Alert: We've noticed unusually high spending for your account.
                </div>
              </a>
              <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
            </div>
          </li>

          <!-- Nav Item - Messages -->
          <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-envelope fa-fw"></i>
              <!-- Counter - Messages -->
              <span class="badge badge-danger badge-counter">7</span>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
              <h6 class="dropdown-header">
                Message Center
              </h6>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                  <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                  <div class="status-indicator bg-success"></div>
                </div>
                <div class="font-weight-bold">
                  <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                  <div class="small text-gray-500">Emily Fowler · 58m</div>
                </div>
              </a>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                  <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                  <div class="status-indicator"></div>
                </div>
                <div>
                  <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                  <div class="small text-gray-500">Jae Chun · 1d</div>
                </div>
              </a>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                  <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                  <div class="status-indicator bg-warning"></div>
                </div>
                <div>
                  <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                  <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                </div>
              </a>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                  <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                  <div class="status-indicator bg-success"></div>
                </div>
                <div>
                  <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                  <div class="small text-gray-500">Chicken the Dog · 2w</div>
                </div>
              </a>
              <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
            </div>
          </li> --}}

          {{-- <div class="topbar-divider d-none d-sm-block"></div> --}}
          @if(Auth::check())
            @if(Auth::user()->level==3)
              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                      {{$sinhvien->ho}} {{$sinhvien->ten}}   
                  </span>
                  <img class="img-profile rounded-circle" 
                  @if(isset($user->img))
                    src="{{$user->img}}"
                  @else
                    src="img/person-icon-blue-18.png"
                  @endif
                  style="max-height: 60px; max-width: 60px">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="{{route('inforuser',['id'=>$iduser])}}">
                          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                          <button type="submit" style="display: contents;">Thông tin cá nhân</button>
                  </a>
                  <a class="dropdown-item" href="{{route('userdetai',['id'=>$sinhvien->id])}}">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Chỉnh sửa đề tài
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Đăng xuất
                  </a>
                </div>
              </li>
            @endif
            @if(Auth::user()->level==2)
              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                      {{$giangvien->ho}} {{$giangvien->ten}}  
                  </span>
                  <img class="img-profile rounded-circle" 
                  @if(isset($user->img))
                    src="{{$user->img}}"
                  @else
                    src="img/person-icon-blue-18.png"
                  @endif
                  style="max-height: 60px; max-width: 60px">
                  
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="{{route('inforuser',['id'=>$iduser])}}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    <button type="submit" style="display: contents;">Thông tin cá nhân</button>
                  </a>
                  <a class="dropdown-item" href="{{route('svhd')}}">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Sinh viên hướng dẫn
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Đăng xuất
                  </a>
                </div>
              </li>
            @endif
            @if(Auth::user()->level==1)
              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    Super Admin
                  </span>
                  <img class="img-profile rounded-circle" src="bootstrap\bootstrap_table_login\img\tenor.png">
                </a>

                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="{{route('quanly')}}">
                    <i class="fas fa-users fa-sm fa-fw mr-2 text-gray-400"></i>
                    Quản lý người dùng
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Đăng xuất
                  </a>
                </div>
              </li>
            @endif
          @else
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link" href="{{ route('getlogin') }}" >Đăng nhập</a>
            </li>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link" href="{{ route('getregister') }}">Đăng ký</a>
            </li>
        @endif
          

        </ul>

      </nav>
      <!-- End of Topbar -->