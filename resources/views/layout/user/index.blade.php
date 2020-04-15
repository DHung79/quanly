<!DOCTYPE html>
<html lang="en">

<head>
  @include('layout.user.header')

</head>

<body>
  <!-- Navigation -->
  @include('layout.user.menu')
    <!-- Page Content -->
  @yield('content')
    <!-- /.container -->
  @include('layout.user.footer')
  <!-- Bootstrap core JavaScript -->
  

  <script src="bootstrap/bootstrap_table_login/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="bootstrap/bootstrap_table_login/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="bootstrap/bootstrap_table_login/js/sb-admin-2.min.js"></script>


  <!-- Page level plugins -->
  <script src="bootstrap/bootstrap_table_login/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="bootstrap/bootstrap_table_login/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="bootstrap/bootstrap_table_login/js/demo/datatables-demo.js"></script>
  @yield('script')
</body>
</html>
