@extends('layout.user.index')

@section('content')
<body id="page-top">

  <!-- Page Wrapper -->
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between ">
            {{-- <h1 class="h3 mb-0 text-gray-800">Tin tức - Sự kiện</h1> --}}
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
          </div>

          <!-- Content Row -->
          <div class="row">
            <!-- Area Chart -->
            <div class="col-auto">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tin tức - Sự kiện</h6>
                </div>

                <!-- Card Body -->
              <div class="card-body">
                <div id="demo" class="carousel slide" data-ride="carousel">
                  <!-- The slideshow -->
                  <div class="carousel-inner" style="padding: 0 15px">
                    @foreach($sukien as $key=>$sk)
                    <div class="carousel-item @if($key == 0) active @endif">
                      <div class="row slide-height" >
                            <a href="{{route('sukien',['id'=>$sk->id])}}" style="text-decoration: none;">
                              <h3>{{$sk->tensukien}}</h3>
                            </a>
                      </div>
                      <div class="row">
                        <div class="col-auto" style="margin-right: 50px; 
                        /* margin-left: 50px; */
                        ">
                          <a href="{{route('sukien',['id'=>$sk->id])}}">
                            <img src="{{$sk->img}}" style="max-height: 500px; max-width:500px">
                          </a>
                        </div>
                        <div class="col-5" style=" max-height: 300px; color: #000000e6;"> 
                          <div class="row">
                            {!!$sk->noidung!!}
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                  <!-- Left and right controls -->
                  <div>
                  <div class="btn-prev">
                    <a class="fas fa-arrow-alt-circle-left " href="#demo" 
                      style="text-decoration: none;" data-slide="prev">
                    </a>
                  </div>
                  <div class="btn-next">
                    <a class="fas fa-arrow-alt-circle-right " href="#demo" 
                      style="text-decoration: none;" data-slide="next">
                    </a>
                  </div>
                </div>
                </div>
              </div>

                <div class="card-body">
                  <hr>
                  <div id="demo" class="carousel slide" data-ride="carousel">
                    <!-- The slideshow -->
                    
                    <div class="carousel-inner" >
                      @foreach($sukien as $key=>$sk)
                      <div style="padding: 0 15px">
                        <div class="row slide-height" >
                              <a href="{{route('sukien',['id'=>$sk->id])}}" style="text-decoration: none;">
                                <h3 style="font-size: medium;">{{$sk->tensukien}}</h3>
                              </a>
                              
                        </div>
                      </div>
                      <hr> 
                      @endforeach
                    </div>
                  </div>
                </div>
            </div>

          </div>
          </div>
        <!-- /.container-fluid -->
      </div>
    </div>


@endsection
