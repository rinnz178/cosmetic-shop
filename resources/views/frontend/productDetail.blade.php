@extends('frontend.frontend_template')
@section('title', 'Product Detail')
@section('content')
    @if (session('error'))
        <div class="alert alert-danger " style="text-align: center">{{ session('error') }}</div>
    @endif

    @if (session('success'))
        <div class="alert alert-success" style="text-align: center">{{ session('success') }}</div>
    @endif
    <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="s_product_img">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            {{-- <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                                    <img src="img/product/single-product/s-product-s-2.jpg" alt="" />
                                </li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1">
                                    <img src="img/product/single-product/s-product-s-3.jpg" alt="" />
                                </li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2">
                                    <img src="img/product/single-product/s-product-s-4.jpg" alt="" />
                                </li>
                            </ol> --}}
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="/image/{{ $product->image }}" alt="First slide" />
                                </div>
                                {{-- <div class="carousel-item">
                                    <img class="d-block w-100" src="img/product/single-product/s-product-1.jpg"
                                        alt="Second slide" />
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="img/product/single-product/s-product-1.jpg"
                                        alt="Third slide" />
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3>{{ $product->name }}</h3>
                        <span style="margin-bottom: 15px">Brand: {{ $product->brand }}</span>
                        <h2>$ {{ $product->price }}</h2>
                        <ul class="list">
                            {{-- <li>
                                <a class="active" href="#">
                                    <span>Category</span> : Household</a>
                            </li> --}}
                            {{-- <li>
                                <a href="#"> <span>Availibility</span> : In Stock</a>
                            </li> --}}
                        </ul>
                        <h4>Product details </h4>
                        <p>
                            {{ $product->detail }}
                        </p>
                        {{-- @php
                            use App\Models\Cart;
                            $cartItem = Cart::get($product->id);
                            $cartQuantity = $cartItem !== null ? $cartItem->quantity : 0;
                            $availableQuantity = $product->quantity - $cartQuantity;
                        @endphp
                        @if ($product->quantity - $cartQuantity > 0)
                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <label for="quantity">Quantity:</label>
                                <input type="number" name="quantity" value="1">
                                <button type="submit">Add to Cart</button>
                            </form>
                        @else --}}
                        {{-- <p>Product quantity limit reached.</p>
                        @endif --}}
                        <form method="POST" action="{{ route('cart.add', ['productId' => $product->id]) }}">
                            @csrf
                            <div class="product_count">
                                <label for="qty">Quantity:</label>

                                <div class="quantity">
                                    @if ($productQuantity > 0)
                                        <input type="number" step="1" min="1" max="{{ $product->quantity }}"
                                            name="quantity" value="1" id="quantity">
                                    @else
                                        <input type="number" step="1" min="0" max="{{ $product->quantity }}"
                                            name="quantity" value="0" id="quantity">
                                    @endif
                                    {{-- <input type="button" value="-" id="minus"> --}}

                                    {{-- <input type="button" value="+" id="plus"> --}}
                                </div>

                            </div>
                            <div id="liveAlertPlaceholder"></div>

                            <div class="card_area">

                                @auth
                                    @if ($productQuantity > 0)
                                        <button type="submit" class="main_btn" data-toggle="modal"
                                            data-product-id="{{ $product->id }}" data-target="#exampleModal">
                                            Add to Cart
                                        </button>
                                    @else
                                        <span class="popup main_btn" onclick="myFunction()"> Add to Cart
                                            <span class="popuptext" id="myPopup">Out of stock!</span>
                                        </span>
                                    @endif
                                @endauth
                                @guest
                                    <a href="{{ url('/login') }}">
                                        <span class="main_btn">
                                            Add to Cart
                                        </span>
                                    </a>

                                @endguest
                                <a class="icon_btn" href="#">
                                    <i class="lnr lnr lnr-diamond"></i>
                                </a>

                            </div>
                        </form>
                        <form id="like-form" action="{{ route('products.like', ['id' => $product->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary" id="like-btn">Like</button>
                        </form>
                        <form id="unlike-form" action="{{ route('products.unlike', ['id' => $product->id]) }}"
                            method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger" id="unlike-btn">Unlike</button>
                        </form>
                        <h3>Total Likes: <span id="total-likes">{{ $product->total_likes }}</span></h3>

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <form method="POST" action="{{ route('comments.store', $product->id) }}">
        @csrf

        <div class="form-group">
            <label for="comment">Comment</label>
            <textarea name="comment" class="form-control" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Add Comment</button>
    </form> --}}
    <!--================End Single Product Area =================-->

    <!--================Product Description Area =================-->
    <section class="product_description_area">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                {{-- <li class="nav-item">
                    <a class="nav-link " id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                        aria-controls="profile" aria-selected="false">Specification</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                        aria-controls="contact" aria-selected="false">Comments</a>
                </li> --}}
            </ul>
            <div class="tab-content" id="myTabContent">

                {{-- <div class="tab-pane fade " id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <h5>Width</h5>
                                    </td>
                                    <td>
                                        <h5>128mm</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Height</h5>
                                    </td>
                                    <td>
                                        <h5>508mm</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Depth</h5>
                                    </td>
                                    <td>
                                        <h5>85mm</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Weight</h5>
                                    </td>
                                    <td>
                                        <h5>52gm</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Quality checking</h5>
                                    </td>
                                    <td>
                                        <h5>yes</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Freshness Duration</h5>
                                    </td>
                                    <td>
                                        <h5>03days</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>When packeting</h5>
                                    </td>
                                    <td>
                                        <h5>Without touch of hand</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Each Box contains</h5>
                                    </td>
                                    <td>
                                        <h5>60pcs</h5>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> --}}
                <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="review_box">
                                {{-- <form action="{{ route('comment.store', ['product' => $product->id]) }}" method="POST">
                                    @csrf

                                    <textarea name="comment">TEST</textarea>
                                    <button type="submit">TEST</button>

                                </form> --}}
                                <h4>Post a comment</h4>
                                @if (Auth::check())
                                    <form action="{{ route('comment.store', ['product' => $product->id]) }}" method="POST"
                                        class="row contact_form" id="contactForm" novalidate="novalidate">
                                        @csrf

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea class="form-control" name="comment" rows="3" placeholder="Enter Comments"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-right">
                                            <button type="submit" class="btn submit_btn">
                                                Submit Now
                                            </button>
                                        </div>
                                    </form>
                                @else
                                    <p>You need to <a href="{{ route('login') }}">log in</a> to leave a comment.</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="comment_list">
                                @if ($product->comments->isEmpty())
                                    <p>No comments yet.</p>
                                @else
                                    @foreach ($product->comments as $comment)
                                        <div class="review_item" style="max-width: 500px">
                                            <div class="media">
                                                <div class="d-flex">
                                                    <img src="img/product/single-product/review-1.png" alt="" />
                                                </div>

                                                <div class="media-body">
                                                    <h4>{{ $comment->user->name }}</h4>
                                                    <h5>{{ $comment->created_at }}</h5>
                                                    <div class="">
                                                        <p>{{ $comment->comment }}</p>
                                                        {{-- <p>{{ \Illuminate\Support\Str::limit($comment->comment, 200) }}
                                                    </p> --}}
                                                        {{-- <button class="btn show-more"
                                                        style="font-size: 10px;background:none;color:blue">Show
                                                        More</button> --}}

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    @endforeach
                                @endif

                            </div>
                        </div>

                    </div>
                </div>
                {{-- <div class="tab-pane fade " id="review" role="tabpanel" aria-labelledby="review-tab">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row total_rate">
                                <div class="col-6">
                                    <div class="box_total">
                                        <h5>Overall</h5>
                                        <h4>4.0</h4>
                                        <h6>(03 Reviews)</h6>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="rating_list">
                                        <h3>Based on 3 Reviews</h3>
                                        <ul class="list">
                                            <li>
                                                <a href="#">5 Star
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i> 01</a>
                                            </li>
                                            <li>
                                                <a href="#">4 Star
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i> 01</a>
                                            </li>
                                            <li>
                                                <a href="#">3 Star
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i> 01</a>
                                            </li>
                                            <li>
                                                <a href="#">2 Star
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i> 01</a>
                                            </li>
                                            <li>
                                                <a href="#">1 Star
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i> 01</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="review_list">
                                <div class="review_item">
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="img/product/single-product/review-1.png" alt="" />
                                        </div>
                                        <div class="media-body">
                                            <h4>Blake Ruiz</h4>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna
                                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                        ullamco laboris nisi ut aliquip ex ea commodo
                                    </p>
                                </div>
                                <div class="review_item">
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="img/product/single-product/review-2.png" alt="" />
                                        </div>
                                        <div class="media-body">
                                            <h4>Blake Ruiz</h4>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna
                                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                        ullamco laboris nisi ut aliquip ex ea commodo
                                    </p>
                                </div>
                                <div class="review_item">
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="img/product/single-product/review-3.png" alt="" />
                                        </div>
                                        <div class="media-body">
                                            <h4>Blake Ruiz</h4>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna
                                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                        ullamco laboris nisi ut aliquip ex ea commodo
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="review_box">
                                <h4>Add a Review</h4>
                                <p>Your Rating:</p>
                                <ul class="list">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-star"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-star"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-star"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-star"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-star"></i>
                                        </a>
                                    </li>
                                </ul>
                                <p>Outstanding</p>
                                <form class="row contact_form" action="contact_process.php" method="post"
                                    id="contactForm" novalidate="novalidate">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Your Full name" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Email Address" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="number" name="number"
                                                placeholder="Phone Number" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="message" id="message" rows="1" placeholder="Review"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <button type="submit" value="submit" class="btn submit_btn">
                                            Submit Now
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
@endsection


@section('scripts')

    <script>
        $(document).ready(function() {
            // Add to cart button click event listener
            $('.add-to-cart-btn').on('click', function(e) {
                e.preventDefault();
                var $btn = $(this);
                var productId = $btn.data('product-id');

                // Check the cart's quantity for the product
                $.ajax({
                    url: '/cart/quantity/' + productId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.quantity >= response.product.quantity) {
                            // Disable the button if the cart's quantity is equal to the product's quantity
                            $btn.prop('disabled', true);
                            alert('You have reached the maximum quantity for this product.');
                        } else {
                            // Add the product to the cart
                            // ...
                        }
                    },
                    error: function() {
                        // Handle errors
                        // ...
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#plus').click(function() {
                var currentVal = parseInt($('#quantity').val());
                if (!isNaN(currentVal) && currentVal < parseInt("{{ $product->quantity }}")) {
                    $('#quantity').val(currentVal + 1);
                }
            });

            $('#minus').click(function() {
                var currentVal = parseInt($('#quantity').val());
                if (!isNaN(currentVal) && currentVal > 1) {
                    $('#quantity').val(currentVal - 1);
                }
            });
        });
    </script>
    <script>
        const comments = document.querySelectorAll('.comment');

        comments.forEach(comment => {
            const showMoreButton = comment.querySelector('.show-more');
            const commentText = comment.querySelector('p');

            showMoreButton.addEventListener('click', () => {
                commentText.classList.add('full-text');
                showMoreButton.style.display = 'none';
            });
        });
    </script>
    <script>
        // When the user clicks on div, open the popup
        function myFunction() {
            var popup = document.getElementById("myPopup");
            popup.classList.toggle("show");
        }
    </script>
    {{-- @if (session('success'))
        <script>
            $(document).ready(function() {
                $('#exampleModal').modal('show');
            });
            setTimeout(function() {
                $('#myModal').modal('hide');
            }, 3000);
        </script>
    @endif --}}
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title m-auto" id="exampleModalLabel">Success!</h5>

                </div>
                <div class="modal-body">
                    Product added to cart successfully!
                </div>

            </div>
        </div>
    </div> --}}
    <style>
        /* Popup container - can be anything you want */
        .popup {
            position: relative;
            display: inline-block;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* The actual popup */
        .popup .popuptext {
            visibility: hidden;
            width: 160px;
            background-color: #ff6363;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 8px 0;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -80px;
        }

        /* Popup arrow */
        .popup .popuptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        /* Toggle this class - hide and show the popup */
        .popup .show {
            visibility: visible;
            -webkit-animation: fadeIn 1s;
            animation: fadeIn 1s;
        }

        /* Add animation (fade in the popup) */
        @-webkit-keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
@endsection
