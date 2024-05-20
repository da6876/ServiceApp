<!DOCTYPE html>

<html lang="en"  class="vertical-menu-template-free" dir="ltr" data-assets-path="{{ asset('assets/') }}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Service App</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead.css') }}" /> 
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/form-validation.css') }}" />
    
    <!-- Page CSS -->
    
    <!-- Helpers -->
    <script src="{{asset('assets/vendor/js/helpers.js')}}"></script>
    <script src="{{asset('assets/js/config.js')}}"></script>
    
    @yield('admin_page_css')
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        @include('layout.nav_slide_bar')

        <!-- Layout container -->
        <div class="layout-page">

          <!-- Navbar -->
            <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                    <i class="bx bx-menu bx-sm"></i>
                    </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <!-- Search -->
                    <div class="navbar-nav align-items-center">
                        <div class="nav-item d-flex align-items-center">Service App</div>
                    </div>
                    <!-- /Search -->
                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                    <!-- User -->
                    <li class="nav-item navbar-dropdown dropdown-user dropdown">
                        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <div class="avatar avatar-online">
                            <img src="https://img.icons8.com/bubbles/500/user.png" alt class="w-px-40 h-auto rounded-circle" />
                        </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                <div class="avatar avatar-online">
                                    <img src="https://img.icons8.com/bubbles/500/user.png" alt class="w-px-40 h-auto rounded-circle" />
                                </div>
                                </div>
                                <div class="flex-grow-1">
                                <span class="fw-semibold d-block">{{Session::get('Admin_Name')}}</span>
                                <small class="text-muted">{{Session::get('Admin_Email')}}</small>
                                </div>
                            </div>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>

                        <li>
                            <a class="dropdown-item" href="{{url('ChangePassword')}}">
                            <i class="bx bx-cog me-2"></i>
                            <span class="align-middle">Change Password</span>
                            </a>
                        </li>

                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{url('Logout')}}">
                            <i class="bx bx-power-off me-2"></i>
                            <span class="align-middle">Log Out</span>
                            </a>
                        </li>
                        </ul>
                    </li>
                    <!--/ User -->
                    </ul>
                </div>
            </nav>
          <!-- / Navbar -->

          <!-- Content wrapper -->
            <div class="content-wrapper">
              <div class="container-xxl flex-grow-1 container-p-y">

                <!-- Content -->
                @yield('usercontent')
                <!-- / Content -->
    
                <div class="content-backdrop fade"></div>
              </div>
            </div>

   
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    

 <!-- Core JS -->
 <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
 <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
 <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
 <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
 <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>


 <!-- Main JS -->
 <script src="{{ asset('assets/js/main.js') }}"></script>

 <!-- Page JS -->
 

<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/sweetalert.min.js')}}"></script>
  <script>
    $(document).ready(function() {
        // data-tables
        $('#example1').DataTable();
        // counter-up
        $('.counter').counterUp({
            delay: 10,
            time: 600
        });
    });
  </script>
@yield('admin_page_js')




    

   
  </body>
</html>
