<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{asset('assets/backend/css/styles.css')}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- toster -->
        <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">{{Auth::guard('admin')->user()->name}}</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                {{-- <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div> --}}
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Profile</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <hr>
                            {{-- <div class="sb-sidenav-menu-heading">Core</div> --}}
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>




                            <a class="nav-link" href="{{route ('slider.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Slider
                            </a>

                            <a class="nav-link" href="{{route ('category.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Category
                            </a>


                            <a class="nav-link" href="{{route ('subcategory.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Sub-Category
                            </a>

                            <a class="nav-link" href="{{route ('brand.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Brand
                            </a>

                            <a class="nav-link" href="{{route ('product.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Product
                            </a>

                            <a class="nav-link" href="{{route ('social.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Social link
                            </a>
                            <a class="nav-link" href="{{route ('setting.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Setting
                            </a>
                            <a class="nav-link" href="{{route ('service.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Service
                            </a>
                            <a class="nav-link" href="{{route ('bestOffer.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Best Offer
                            </a>

                            {{-- <a class="nav-link" href="{{route ('testimonial.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Testimonial
                            </a> --}}
                            <hr>
                            <a class="nav-link text-danger" href="{{route('logout')}}">
                                <div class="sb-nav-link-icon text-danger "><i class="fa fa-sign-out" aria-hidden="true"></i>
                                </div>
                                Logout
                            </a>






                        </div>
                    </div>

                </nav>
            </div>
@yield('admin_content')
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets/backend/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets/backend/assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('assets/backend/assets/demo/chart-bar-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets/backend/js/datatables-simple-demo.js')}}"></script>

        {{-- sweetalert2 --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        {{-- Toastr --}}
        <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}

        {{-- jquery --}}
        <script src="{{ asset('assets/backend/js/jquery-3.7.0.min.js') }}"></script>

    </body>
</html>
