<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" class="js-site-favicon" href="{{asset('assets/img/money.ico')}}">
<title>{{$title}}</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/sba2/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('vendor/sba2/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/sba2/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/sba2/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- script datatables -->
    <script src="{{asset('assets/DataTables/datatables.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/DataTables/datatables.css')}}">
    {{-- script datepicker --}}
    <link rel="stylesheet" href="{{asset('assets/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}">
    <script src="{{asset('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">  
  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{asset('Transaksi')}}">
          <div class="sidebar-brand-icon rotate-n-15">
              <i class="fas fa-fw fa-dollar-sign"></i>
              <!-- <img src="{{asset('assets/img/money.ico')}}" alt="" class="img-thumbnail img-profile"> -->
          </div>
          <div class="sidebar-brand-text mx-3">DUWITKU</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item @if ($title =="Dashboard")  active @endif">
      <a class="nav-link" href="{{route('dashboard')}}" id="linkDashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>DASHBOARD</span></a>
      </li>
      @if (Auth::check() && Auth::user()->role == 'user')
      <!-- Nav Item - Pemasukan -->
      <li class="nav-item  @if ($title == "Pemasukan") active @endif">
      <a class="nav-link" href="{{route('incomes')}}" id="linkPemasukan">
          <i class="fas fa-fw fa-money-bill-wave"></i>
          <span>PEMASUKAN</span></a>
      </li>
      <!-- Nav Item - Pengeluaran -->
      <li class="nav-item  @if ($title == "Pengeluaran") active @endif">
        <a class="nav-link" href="{{route('spendings')}}" id="linkPengeluaran">
            <i class="fas fa-fw fa-money-bill-wave"></i>
            <span>PENGELUARAN</span></a>
        </li>
      @endif
       <!-- Nav Item - User -->
       @if (Auth::check() && Auth::user()->role == 'admin')
           
       <li class="nav-item  @if ($title == "User") active @endif">
        <a class="nav-link" href="{{route('users.index')}}" id="linkUser">
            <i class="fas fa-user"></i>
            <span>USER</span>
        </a>
    </li>
    @endif
       <li class="nav-item">
        <a class="nav-link" href="{{route('logout')}}" id="linkUser" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i>
            <span>LOGOUT</span>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </a>
        </li>


     

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
<h3>{{$title}}</h3>
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                <img class="img-profile rounded-circle"
                    src="{{asset('/assets/img/profile/profile.jpg')}}">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar --><!-- Begin Page Content -->
<div class="container-fluid">

   @yield('content')

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --><!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Duwitku 2019</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{asset('Auth/logout')}}">Logout</a>
            </div>
        </div>
    </div>
</div>
@yield('js')



<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/sba2/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('vendor/sba2/js/sb-admin-2.min.js')}}"></script>

<!-- Sweet alert2 -->
<script src="{{asset('assets/swal2/sweetalert2.all.min.js')}}"></script>
<!-- My own script -->
<script src="{{asset('assets/js/script.js')}}"></script>

<script>
//script untuk ganti nama file yang diupload ketika edit profil
$('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
});

</script>
</body>

</html>