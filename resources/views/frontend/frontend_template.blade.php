<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="img/favicon.png" type="image/png" />
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/vendors/linericon/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/vendors/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/vendors/lightbox/simpleLightbox.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/vendors/nice-select/css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/vendors/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/vendors/jquery-ui/jquery-ui.css') }}" />
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}" />

    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>

</head>

<body>
    <!--================Header Menu Area =================-->
    <header class="header_area">
        {{-- <div class="top_menu">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="float-left">
                            <p>Phone: +01 256 25 235</p>
                            <p>email: info@eiser.com</p>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="float-right">
                            <ul class="right_side">
                                <li>
                                    <a href="cart.html">
                                        gift card
                                    </a>
                                </li>
                                <li>
                                    <a href="tracking.html">
                                        track order
                                    </a>
                                </li>
                                <li>
                                    <a href="contact.html">
                                        Contact Us
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="main_menu">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light w-100">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand " href="index.html">
                        <img src="{{ asset('assets/logo.png') }}" style="width: 100px;" alt="" />
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar" style="background-color: #91CDFF;border-radius:20px"></span>
                        <span class="icon-bar" style="background-color: #91CDFF;border-radius:20px"></span>
                        <span class="icon-bar" style="background-color: #91CDFF;border-radius:20px"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
                        <div class="row w-100 mr-0">
                            <div class="col-lg-7 pr-0">
                                <ul class="nav navbar-nav center_nav pull-right">
                                    <li class="nav-item {{ Request::is('/*') ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                                    </li>
                                    <li class="nav-item {{ Request::is('shop*') ? 'active' : '' }}">
                                        <a href="{{ url('/shop') }}" class="nav-link ">Shop</a>
                                    </li>
                                    {{-- <li class="nav-item {{ Request::is('blog*') ? 'active' : '' }}">
                                        <a href="{{ url('/blog') }}" class="nav-link ">Blog</a>
                                    </li> --}}
                                    <li class="nav-item {{ Request::is('about*') ? 'active' : '' }}">
                                        <a href="{{ url('/about') }}" class="nav-link ">About</a>
                                    </li>
                                    <li class="nav-item {{ Request::is('contact*') ? 'active' : '' }}">
                                        <a href="{{ url('/contact') }}" class="nav-link ">Contact</a>
                                    </li>
                                </ul>
                            </div>
                            {{-- @include('nav', ['cartItemCount' => $cartItemCount]) --}}
                            {{-- @include('_cart-icon') --}}
                            <div class="col-lg-5 pr-0">
                                <ul class="nav navbar-nav navbar-right right_nav pull-right">

                                    <li class=" ">
                                        @guest
                                            <a href="{{ url('/login') }}" class="icons position-relative">
                                                <i class="ti-shopping-cart"></i>
                                                <span
                                                    class="position-absolute mt-3 top-0 start-100 translate-middle badge rounded-pill"
                                                    style="color: #ffffff;background-color:#91CDFF;border-radius:20px;font-size:12px">
                                                    0
                                            </a>

                                        @endguest
                                        @auth
                                            <a href="{{ url('/cart') }}" class="icons position-relative">
                                                <i class="ti-shopping-cart"></i>
                                                <span
                                                    class="position-absolute mt-3 top-0 start-100 translate-middle badge rounded-pill"
                                                    style="color: #ffffff;background-color:#91CDFF;border-radius:20px;font-size:12px">



                                                    <?php
                                                    $cartCount = App\Models\Cart::where('user_id', auth()->id())->sum('quantity');
                                                    ?>
                                                    @if ($cartCount == 0)
                                                        0
                                                    @else
                                                        @if ($cartCount > 0)
                                                            {{ $cartCount }}
                                                        @endif
                                                    @endif

                                            </a>
                                            {{-- <span class="visually-hidden">unread messages</span> --}}
                                            </span>
                                            </a>
                                        @endauth

                                    </li>

                                    {{-- <li class="nav-item">
                                        <a href="#" class="icons">
                                            <i class="ti-user" aria-hidden="true"></i>
                                        </a>
                                    </li> --}}

                                    <li class="nav-item">
                                        <a href="#" class="icons">
                                            <i class="ti-heart" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    @auth
                                        <li class="nav-item submenu dropdown">
                                            <a href="#" class="icons">
                                                <i class="ti-user" aria-hidden="true"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class="nav-item">
                                                    <button class="btn profile_btn nav-link" style="" type="submit">
                                                        <img src="https://cdn-icons-png.flaticon.com/512/1250/1250689.png"
                                                            style="width: 16px" alt="">
                                                        @auth
                                                            Welcome, {{ Auth::user()->name }}
                                                        @endauth
                                                    </button>

                                                </li>


                                                <form action="{{ route('logout') }}" method="POST">
                                                    @csrf

                                                    <li class="nav-item">

                                                        <button class="btn nav-link profile_btn" type="submit ">
                                                            <img src="https://icons.veryicon.com/png/o/miscellaneous/icon-pack/exit-24.png"
                                                                style="width: 16px" alt="">
                                                            Logout</button>
                                                    </li>
                                                </form>
                                                {{-- <li class="nav-item">
                                                    <a class="nav-link" href="checkout.html">Product Checkout</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="cart.html">Shopping Cart</a>
                                                </li> --}}
                                            </ul>
                                        </li>
                                        @if (auth()->user()->role == 0)
                                            <a href="{{ url('admin/dashboard') }}" class="icons" style="color: white">
                                                <button class="btn "
                                                    style="border-radius: 20px;background-color:#91CDFF;color:white;">Go to
                                                    Dashboard</button>
                                            </a>
                                        @endif
                                    @endauth


                                    @guest


                                        <a href="{{ url('/login') }}" class="icons" style="color: white">
                                            <button class="btn "
                                                style="border-radius: 20px;background-color:#91CDFF;color:white;">Login</button>
                                        </a>

                                    @endguest

                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!--================Header Menu Area =================-->
    @yield('content')

    <!--================ start footer Area  =================-->
    <footer class="footer-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-6 single-footer-widget">
                    <h4>Top Products</h4>
                    <ul>
                        <li><a href="#">Managed Website</a></li>
                        <li><a href="#">Manage Reputation</a></li>
                        <li><a href="#">Power Tools</a></li>
                        <li><a href="#">Marketing Service</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 single-footer-widget">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#">Jobs</a></li>
                        <li><a href="#">Brand Assets</a></li>
                        <li><a href="#">Investor Relations</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 single-footer-widget">
                    <h4>Features</h4>
                    <ul>
                        <li><a href="#">Jobs</a></li>
                        <li><a href="#">Brand Assets</a></li>
                        <li><a href="#">Investor Relations</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 single-footer-widget">
                    <h4>Resources</h4>
                    <ul>
                        <li><a href="#">Guides</a></li>
                        <li><a href="#">Research</a></li>
                        <li><a href="#">Experts</a></li>
                        <li><a href="#">Agencies</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 single-footer-widget">
                    <h4>Newsletter</h4>
                    <p>You can trust us. we only send promo offers,</p>
                    <div class="form-wrap" id="mc_embed_signup">
                        <form target="_blank"
                            action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                            method="get" class="form-inline">
                            <input class="form-control" name="EMAIL" placeholder="Your Email Address"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '"
                                required="" type="email">
                            <button class="click-btn btn btn-default">Subscribe</button>
                            <div style="position: absolute; left: -5000px;">
                                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value=""
                                    type="text">
                            </div>

                            <div class="info"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="footer-bottom row align-items-center">
                <p class="footer-text m-0 col-lg-8 col-md-12">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="fa fa-heart-o"
                        aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
                <div class="col-lg-4 col-md-12 footer-social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-behance"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!--================ End footer Area  =================-->
    @yield('scripts')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('frontend/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/stellar.js') }}"></script>
    <script src="{{ asset('frontend/vendors/lightbox/simpleLightbox.min.js') }}"></script>
    <script src="{{ asset('frontend/vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/vendors/isotope/isotope-min.js') }}"></script>
    <script src="{{ asset('frontend/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('frontend/vendors/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/vendors/counter-up/jquery.counterup.js') }}"></script>
    <script src="{{ asset('frontend/js/mail-script.js') }}"></script>
    <script src="{{ asset('frontend/js/theme.js') }}"></script>
    <script>
        $(function() {
            $('#exampleModal').modal('show');
        });
        setTimeout(function() {
            $('#exampleModal').modal('hide');
        }, 3000);
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('[data-toggle="popover"]').popover();
        });

        $(document).ready(function() {
  $('#my-modal').modal('hide');
});
    </script>

  
</body>

</html>
