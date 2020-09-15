<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Restur: The Restaurant Management System</title>


    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/ico" href="{{'image/backend/logo.webp'}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('backend/assets/fontawesome-free/css/all.min.css')}}">
    <!--DataTable-->
    <link rel="stylesheet" href="{{asset('backend/assets/datatables/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/datatables/css/dataTables.bootstrap4.min.css')}}">


    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('backend/assets/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css')}}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('backend/assets/toastr/toastr.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('backend/assets/overlayScrollbars/css/OverlayScrollbars.min.css')}}">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('backend/css/main.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<input type="text" value="{{Request::url()}}" id="url" hidden>
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{URL::to('dashboard')}}" class="nav-link">Home</a>
            </li>
            @if(Session::get('emp_type') < 3)
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{URL::to('order')}}" class="nav-link">New Order</a>
            </li>
            @endif
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
                <li class="nav-item px-2">
                        <button class="btn btn-warning"  id="pagerefresh">Refresh</button>
                </li>
            <li class="nav-item">
                <a  href="{{URL::to('logout')}}" >
                    <button class="btn btn-primary">Logout</button>
                </a>
            </li>

        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-fuchsia-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{URL::to('dashboard')}}" class="brand-link">
            <img src="{{asset('image/backend/logo.webp')}}" alt="Restur Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Restur</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset('image/employee/'.Session::get('emp_image') )}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block font-weight-bold">{{ Session::get('emp_name') }}</a>
                     @if(Session::get('emp_type') == 1) Admin ID: @elseif(Session::get('emp_type') == 2) Waiter ID:@else Kitchen ID: @endif
                    {{Session::get('emp_id')}}
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    @foreach($menu as $mm)
                        @php($r = 1)
                        @foreach($submenu as $sm)
                            @if(Session::get('emp_type') == $sm->menu_role && $mm->menu_id == $sm->menu_id)
                                @if($r == 1)
                                    <li class="nav-item has-treeview menu-close" id="{{$mm->menu_id_val}}">
                                        <a href="#" class="nav-link bg-cyan">
                                            <i class="nav-icon {{$mm->menu_icon1}}"></i>
                                            <p>
                                                {{$mm->menu_name}}
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>

                                    @php($r = 0)
                                @endif
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{URL::to("".$sm->menu_link)}}" class="nav-link" id="{{$sm->menu_id_val}}">
                                    <i class="{{$sm->menu_icon1}} nav-icon"></i>
                                    <p>{{$sm->menu_name}}</p>
                                </a>
                            </li>
                        </ul>

                            @endif

                        @endforeach

                                    </li>
                    @endforeach

                    @php($r = 1)
                    @foreach($smenu as $mm)
                        @if($mm->menu_role >= Session::get('emp_type'))
                            @if($r == 1)
                                <li class="nav-header">More</li>
                                @php($r++)
                            @endif
                        <li class="nav-item has-treeview menu-close" id="{{$mm->menu_id_val}}">
                            <a href="#" class="nav-link bg-pink">
                                <i class="nav-icon {{$mm->menu_icon1}}"></i>
                                <p>
                                    {{$mm->menu_name}}
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            @foreach($ssubmenu as $sm)
                                @if($mm->menu_id == $sm->menu_id)
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{URL::to("".$sm->menu_link)}}" class="nav-link" id="{{$sm->menu_id_val}}">
                                                <i class="{{$sm->menu_icon1}} nav-icon"></i>
                                                <p>{{$sm->menu_name}}</p>
                                            </a>
                                        </li>
                                    </ul>
                                @endif
                            @endforeach
                        </li>
                        @endif
                    @endforeach
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    @yield('content')

    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2020 <a href="http://facebook.com/Hasib.0951">Hasibul Hasan</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 20.0.1
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('backend/assets/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('backend/assets/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend/assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- DataTables -->


<script src="{{asset('backend/assets/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/assets/datatables/js/dataTables.bootstrap4.min.js')}}"></script>


<!-- Select2 -->
<script src="{{asset('backend/assets/select2/js/select2.full.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('backend/assets/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('backend/assets/toastr/toastr.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('backend/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('backend/dist/js/demo.js')}}"></script>
<script src="{{asset('backend/js/ajax.js')}}"></script>
<script src="{{asset('backend/js/support.js')}}"></script>
<script src="{{asset('backend/js/active.js')}}"></script>
<script src="{{asset('backend/js/print.js')}}"></script>
<script src="{{asset('backend/assets/sweetalert/js/sweetalert.js')}}"></script>
</body>
</html>
