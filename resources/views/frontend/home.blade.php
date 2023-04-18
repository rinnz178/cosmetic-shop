@extends('frontend.frontend_template')
@section('title', 'Home')
@section('content')
    @if (Session::has('success'))
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header ">
                        <h4 class="modal-title m-auto" id="exampleModalLabel">Success!</h4>
                        {{-- <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">X</button> --}}
                    </div>
                    <div class="modal-body">
                        <p style="text-align: center">You have been logged in successfully.</p>
                    </div>
                    {{-- <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    </div> --}}
                </div>
            </div>
        </div>

        <script>
            $(function() {
                $('#exampleModal').modal('show');
            });
        </script>
    @endif





    <!-- Modal -->



    <!--================Home Banner Area =================-->
    <section class="home_banner_area mb-40" style="">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content row">
                    <div class="col-lg-12">
                        <h3 style="color: rgb(93, 93, 93)"><span>Dermatology</span> Makes <br /> The World<span>
                                Healthier</span></h3>
                        <h4 style="color: rgb(93, 93, 93)"> </h4>
                        <p class=" text-uppercase" style="color: rgb(93, 93, 93)">After a childhood experience with painful
                            burns, <br>the founder of Dr.G became a dermatologist <br> in order to help people suffering
                            from skin
                            problems.</p>

                        <a class="main_btn mt-40" href="{{ url('/shop') }}">View Shop</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!-- Start feature Area -->
    <section class="feature-area section_gap_bottom_custom">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <a href="#" class="title">
                            <i class="flaticon-money"></i>
                            <h3>Money back gurantee</h3>
                        </a>
                        <p>Shall open divide a one</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <a href="#" class="title">
                            <i class="flaticon-truck"></i>
                            <h3>Free Delivery</h3>
                        </a>
                        <p>Shall open divide a one</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <a href="#" class="title">
                            <i class="flaticon-support"></i>
                            <h3>Alway support</h3>
                        </a>
                        <p>Shall open divide a one</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <a href="#" class="title">
                            <i class="flaticon-blockchain"></i>
                            <h3>Secure payment</h3>
                        </a>
                        <p>Shall open divide a one</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End feature Area -->

    <!--================ Feature Product Area =================-->
    <section class="feature_product_area section_gap_bottom_custom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="main_title">
                        <h2><span>Featured product</span></h2>
                        <p>Bring called seed first of third give itself now ment</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($features as $feature)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-product">
                            <div class="product-img">
                                <img class="img-fluid w-100" src="/image/{{ $feature->image }}"alt="" />
                                <div class="p_icon">
                                    <a href="{{ route('frontend.productDetail', $feature->id) }}">
                                        <i class="ti-eye"></i>
                                    </a>
                                    {{-- <a href="#">
                                        <i class="ti-heart"></i>
                                    </a> --}}
                                    @guest
                                        <a href="{{ url('/login') }}">
                                            <i class="ti-shopping-cart"></i>
                                        </a>

                                    @endguest
                                    @auth
                                        <a>
                                            <form method="POST" action="{{ route('cart.add', $feature->id) }}">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                <button type="submit" class="btn shop_cart">
                                                    <i class="ti-shopping-cart"></i>
                                                </button>

                                            </form>
                                        </a>
                                    @endauth
                                </div>
                            </div>
                            <div class="product-btm">
                                <a href="#" class="d-block">
                                    <h4>{{ $feature->name }}</h4>
                                </a>
                                <div class="mt-3">
                                    <span class="mr-4">${{ $feature->price }}</span>
                                    {{-- <del>$35.00</del> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!--================ End Feature Product Area =================-->

    <!--================ Offer Area =================-->
    <section class="offer_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="offset-lg-4 col-lg-6 text-center">
                    <div class="offer_content">
                        <h3 class="text-uppercase mb-40">Try Our Best Sellers </h3>
                        <h2 style="font-size:80px">
                            For $8.99 </h2>
                        <a href="{{url('/shop')}}" class="main_btn mb-20 mt-5">Shop Now</a>
                        {{-- <p>Limited Time Offer</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Offer Area =================-->

    <!--================ New Product Area =================-->
    <section class="new_product_area section_gap_top section_gap_bottom_custom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="main_title">
                        <h2><span>new products</span></h2>
                        <p>Bring called seed first of third give itself now ment</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="new_product">
                        <h5 class="text-uppercase" style="">collection of 2023</h5>
                        <h3 class="text-uppercase">Men’s summer t-shirt</h3>
                        <div class="product-img">
                            <img class="img-fluid" src="{{ asset('assets/home.JPG') }}" alt="" />
                        </div>

                    </div>
                </div>

                <div class="col-lg-6 mt-5 mt-lg-0">
                    <div class="row">
                        @foreach ($newProducts as $newProduct)
                            <div class="col-lg-6 col-md-6">
                                <div class="single-product">
                                    <div class="product-img">
                                        <img class="img-fluid w-100" src="/image/{{ $newProduct->image }}"
                                            alt="" />
                                        <div class="p_icon">
                                            <a href="{{ route('frontend.productDetail', $newProduct->id) }}">
                                                <i class="ti-eye"></i>
                                            </a>
                                            {{-- <a href="#">
                                                <i class="ti-heart"></i>
                                            </a> --}}
                                            @guest
                                                <a href="{{ url('/login') }}">
                                                    <i class="ti-shopping-cart"></i>
                                                </a>

                                            @endguest
                                            @auth
                                                <a>
                                                    <form method="POST" action="{{ route('cart.add', $newProduct->id) }}">
                                                        @csrf
                                                        <input type="hidden" name="user_id"
                                                            value="{{ auth()->user()->id }}">
                                                        <button type="submit" class="btn shop_cart">
                                                            <i class="ti-shopping-cart"></i>
                                                        </button>

                                                    </form>
                                                </a>
                                            @endauth
                                        </div>
                                    </div>
                                    <div class="product-btm">
                                        <a href="#" class="d-block">
                                            <h4>{{ $newProduct->name }}</h4>
                                        </a>
                                        <div class="mt-3">
                                            <span class="mr-4">${{ $newProduct->price }}</span>
                                            {{-- <del>$35.00</del> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--================ End Blog Area =================-->
@endsection
