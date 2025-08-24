<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from adminlte.io/themes/v3/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 May 2024 05:15:42 GMT -->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}"/>
  <title>School.LMS</title>
  <base href="{{asset('admincss')}}/"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="ionicons/2.0.1/css/ionicons.min.css">

  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">

  <link rel="stylesheet" href="dist/css/adminlte.min2167.css?v=3.2.0">

  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">

  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

@yield('customCss')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div> -->

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{route('admin.dashboard')}}" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{route('academic-year.create')}}" class="nav-link">Academic Year</a>
        </li>
      </ul>
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Profile Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-circle"></i> Profile
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
        <a class="dropdown-item" href="">My Profile</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item text-danger" href="{{route('admin.logout')}}">
        Logout
        </a>
      </div>
    </li>
  </ul>

    </nav>


    <aside class="main-sidebar sidebar-dark-primary elevation-4">

      <a href="index3.html" class="brand-link">
        <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-light">School Management System</span>
      </a>

      <div class="sidebar">



        <div class="form-inline mt-2">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
              <a href="{{route('admin.dashboard')}}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Academic Year
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('academic-year.create')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Record</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('academic-year.read')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Record</p>
                  </a>
                </li>

              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                Class
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('class.create')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Class</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('class.read')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Class</p>
                  </a>
                </li>

              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                Fee Head
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('fee-head.create')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Fee-Head</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('fee-head.read')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Fee-Head</p>
                  </a>
                </li>

              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                 Fees Structure
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('fee-structure.create')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('fee-structure.read')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View</p>
                  </a>
                </li>

              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                 Student Mgmt
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('student.create')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Student</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('student.read')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Student</p>
                  </a>
                </li>

              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                 Announcement Mgmt
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('announcement.create')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Announcement</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('announcement.read')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Announcement</p>
                  </a>
                </li>

              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                 Subject Mgmt
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('subject.create')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Subject</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('subject.read')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Subject</p>
                  </a>
                </li>

              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                Assign Subject Mgmt
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('assign-subject.create')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Assign Subject</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('assign-subject.read')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Assign Subject</p>
                  </a>
                </li>

              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
               Teacher Mgmt
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('teacher.create')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Teacher</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('teacher.read')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Teacher</p>
                  </a>
                </li>

              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
               Assign-Teacher Mgmt
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('assign-teacher.create')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Assign Teacher</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('assign-teacher.read') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Assign Teacher</p>
                  </a>
                </li>

              </ul>
            </li>

          </ul>
        </nav>

      </div>

    </aside>

   @yield('content')

    <footer class="main-footer">
      <strong> &copy; 2025-2026 <a href="">Student.LMS</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0
      </div>
    </footer>

    <aside class="control-sidebar control-sidebar-dark">

    </aside>

  </div>



  <script src="plugins/jquery/jquery.min.js"></script>

  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>

  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>

  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="plugins/chart.js/Chart.min.js"></script>

  <script src="plugins/sparklines/sparkline.js"></script>

  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>

  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>

  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

  <script src="plugins/summernote/summernote-bs4.min.js"></script>

  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

  <script src="dist/js/adminlte2167.js?v=3.2.0"></script>

  <script src="dist/js/demo.js"></script>

  <script src="dist/js/pages/dashboard.js"></script>

  @yield('customJs')
</body>

<!-- Mirrored from adminlte.io/themes/v3/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 May 2024 05:16:08 GMT -->

</html>
