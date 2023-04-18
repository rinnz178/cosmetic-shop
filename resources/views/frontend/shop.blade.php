@extends('frontend.frontend_template')
@section('title', 'Shop')
@section('content')
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h2>Shop Category</h2>
                        <p>Very us move be blessed multiply night</p>
                    </div>
                    <div class="page_link">
                        <a href="{{ url('/') }}">Home</a>
                        <a href="{{ url('/shop') }}">Shop</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="cat_product_area section_gap">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">
                    <div class="left_dorp m-auto">
                        @if ($category)
                            <h4>Showing products under <span style="color: #3da3f7">{{ $category->name }}</span></h4>
                        @else
                            <h4>Showing all products</h4>
                        @endif
                    </div>

                    <div class="latest_product_inner">
                        <div class="row">
                            @if (count($products) === 0)
                                <img src="{{ asset('assets/Sorry_.png') }}" style="width: 200px;margin:auto" alt="">
                                {{-- <p>This category is empty.</p> --}}
                            @else
                                @foreach ($products as $product)
                                    <div class="col-lg-4 col-md-6">
                                        <div class="single-product">
                                            <div class="product-img">
                                                <img class="card-img" style="max-width: " src="/image/{{ $product->image }}"
                                                    alt="" />
                                                <div class="p_icon">
                                                    <a href="{{ route('frontend.productDetail', $product->id) }}">
                                                        <i class="ti-eye"></i>
                                                    </a>
                                                    {{-- <a href="#">
                                                        <i class="ti-heart"></i>
                                                    </a> --}}
                                                    @guest
                                                        <a href="{{url('/login')}}">
                                                            <i class="ti-shopping-cart"></i>
                                                        </a>

                                                    @endguest
                                                    @auth
                                                        <a>
                                                            <form method="POST" action="{{ route('cart.add', $product->id) }}">
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
                                                    <h4>{{ $product->name }}</h4>
                                                </a>
                                                <div class="mt-3">
                                                    <span class="mr-4">$25.00</span>
                                                    {{-- <del>$35.00</del> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Browse Categories</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    <li>
                                        <a href="{{ route('frontend.shop') }}">Show all products</a>
                                    <li>
                                    <li>
                                        @foreach ($categories as $category)
                                    <li><a
                                            href="{{ route('frontend.shop', ['category_id' => $category->id]) }}">{{ $category->name }}</a>
                                    </li>
                                    @endforeach
                                    </li>

                                </ul>
                            </div>
                        </aside>

                        {{-- <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Product Brand</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    <li>
                                        <a href="#">Apple</a>
                                    </li>
                                    <li>
                                        <a href="#">Asus</a>
                                    </li>
                                    <li class="active">
                                        <a href="#">Gionee</a>
                                    </li>
                                    <li>
                                        <a href="#">Micromax</a>
                                    </li>
                                    <li>
                                        <a href="#">Samsung</a>
                                    </li>
                                </ul>
                            </div>
                        </aside>

                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Color Filter</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    <li>
                                        <a href="#">Black</a>
                                    </li>
                                    <li>
                                        <a href="#">Black Leather</a>
                                    </li>
                                    <li class="active">
                                        <a href="#">Black with red</a>
                                    </li>
                                    <li>
                                        <a href="#">Gold</a>
                                    </li>
                                    <li>
                                        <a href="#">Spacegrey</a>
                                    </li>
                                </ul>
                            </div>
                        </aside>

                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Price Filter</h3>
                            </div>
                            <div class="widgets_inner">
                                <div class="range_item">
                                    <div id="slider-range"></div>
                                    <div class="">
                                        <label for="amount">Price : </label>
                                        <input type="text" id="amount" readonly />
                                    </div>
                                </div>
                            </div>
                        </aside> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
