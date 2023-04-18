<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title')</title>
    <meta name="robots" content="noindex, nofollow">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="{{ asset('backend/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('backend/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/simple-datatables.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('summernote/summernote-bs5.css') }}" rel="stylesheet">
    <script src="{{ asset('summernote/summernote-bs5.js') }}"></script>

</head>

<body>
    {{-- @extends('backend.header') --}}

    <header id="header" class="header fixed-top d-flex align-items-center no-export">
        <div class="d-flex align-items-center justify-content-between"> <a href="index.html"
                class="logo d-flex align-items-center"> <img src="assets/img/logo.png" alt=""> <span
                    class="d-none d-lg-block">Admin Dashboard</span> </a> <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        {{-- <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#"> <input type="text"
                    name="query" placeholder="Search" title="Enter search keyword"> <button type="submit"
                    title="Search"><i class="bi bi-search"></i></button></form>
        </div> --}}
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown"> <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number">{{ count($pendingOrders) }}</span> </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header"> You have {{ count($pendingOrders) }} new notifications <a
                                href="{{ url('/admin/orders') }}"><span
                                    class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        @foreach ($pendingOrders as $order)
                            <li class="notification-item">
                                <i class="bi bi-exclamation-circle text-warning"></i>
                                <div>
                                    <h4>Pending Order #{{ $order->id }}</h4>
                                    <p>{{ $order->name }} has placed an order.</p>
                                    <p>{{ $order->created_at->diffForHumans() }}</p>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        @endforeach
                    </ul>
                </li>


                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown"> <span class="d-none d-md-block dropdown-toggle ps-2"> @auth
                                {{ Auth::user()->name }}
                            @endauth
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ Auth::user()->name }}</h6>
                            <span>Admin</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li> <a class="dropdown-item d-flex align-items-center" href="users-profile.html"> <i
                                    class="bi bi-person"></i> <span>My Profile</span> </a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li> <a class="dropdown-item d-flex align-items-center" href="{{ url('/') }}"> <i
                                    class="bi bi-box-arrow-in-left"></i> <span>Go to Shop</span> </a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        {{-- <li> <a class="dropdown-item d-flex align-items-center" href="pages-faq.html"> <i
                                    class="bi bi-question-circle"></i> <span>Need Help?</span> </a></li>
                        <li> --}}
                        <hr class="dropdown-divider">
                </li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <li> <button type="submit" class="dropdown-item d-flex align-items-center"
                            href="{{ url('/') }}"> <i class="bi bi-box-arrow-right"></i> <span>Sign Out</span>
                        </button></li>

                </form>
            </ul>
            </li>
            </ul>
        </nav>
    </header>
    <aside id="sidebar" class="sidebar no-export">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item ">
                <a class="nav-link py-3 collape" href="{{ url('admin/dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link py-3 collape" href="{{ route('categories.index') }}">
                    <i class="bi bi-card-list">
                    </i>
                    <span>Category</span>
                </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link py-3 collape" href="{{ route('products.index') }}"> <i class="bi bi-boxes"></i>
                    <span>Product</span> </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-cart"></i><span>Orders</span><i class="bi bi-chevron-down ms-auto"></i> </a>
                <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li> <a href="{{ url('/admin/orders') }}"> <i class="bi bi-circle"></i><span>
                        New Orders</span> </a>
            </li>
            <li> <a href="{{ url('/admin/sales') }}"> <i class="bi bi-circle"></i><span>Sales</span> </a>
            </li>
                </ul>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link py-3 collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse"
                    href="#">
                    <i class="bi bi-people-fill "></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li> <a href="tables-general.html"> <i class="bi bi-circle"></i><span>General Tables</span> </a>
                    </li>
                    <li> <a href="tables-data.html"> <i class="bi bi-circle"></i><span>Data Tables</span> </a></li>
                </ul>
            </li> --}}

            {{-- <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i> </a>
                <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li> <a href="charts-chartjs.html"> <i class="bi bi-circle"></i><span>Chart.js</span> </a></li>
                    <li> <a href="charts-apexcharts.html"> <i class="bi bi-circle"></i><span>ApexCharts</span> </a>
                    </li>
                    <li> <a href="charts-echarts.html"> <i class="bi bi-circle"></i><span>ECharts</span> </a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i> </a>
                <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li> <a href="icons-bootstrap.html"> <i class="bi bi-circle"></i><span>Bootstrap Icons</span> </a>
                    </li>
                    <li> <a href="icons-remix.html"> <i class="bi bi-circle"></i><span>Remix Icons</span> </a></li>
                    <li> <a href="icons-boxicons.html"> <i class="bi bi-circle"></i><span>Boxicons</span> </a></li>
                </ul>
            </li>
            <li class="nav-heading">Pages</li> --}}
        </ul>
    </aside>
    <main id="main" class="main">

        @yield('content')
    </main>
    <footer id="footer" class="footer no-export">
        <div class="copyright"> &copy; Copyright <strong><span>Compnay Name</span></strong>. All Rights Reserved</div>
        <div class="credits"> with love <a href="https://freeetemplates.com/">FreeeTemplates</a></div>
    </footer>
    <a href="#" class="back-to-top d-flex no-export align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <script src="{{ asset('backend/assets/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/chart.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/echarts.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/quill.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/simple-datatables.js') }}"></script>
    <script src="{{ asset('backend/assets/js/tinymce.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/validate.js') }}"></script>
    <script src="{{ asset('backend/assets/js/main.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- <script>
        function myFunction() {
            var x = document.getElementById("myDIV");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script> --}}
    <script>
        $(document).ready(function() {
            $('#toggle-row').hide();
        });

        $(document).ready(function() {
            $('#toggle-button').click(function() {
                $('#toggle-row').toggle();
            });
        });
    </script>

</body>

</html>
