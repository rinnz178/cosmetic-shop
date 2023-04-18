@extends('frontend.frontend_template')
@section('title', 'Cart')

@section('content')

    @if (session('success'))
        <div class="alert alert-success" style="text-align: center">
            <audio autoplay>
                <source src="{{ asset('frontend/noti.mp3') }}" type="audio/mpeg">
            </audio>
            {{ session('success') }}
        </div>
    @endif
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h2>Cart</h2>
                        <p>Very us move be blessed multiply night</p>
                    </div>
                    <div class="page_link">
                        <a href="index.html">Home</a>
                        <a href="cart.html">Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    {{-- <form action="{{ route('cart.update') }}" method="POST">
                        @csrf --}}
                    {{-- @csrf
                        @method('PATCH') --}}
                    {{-- <form> --}}
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($cartItems->isEmpty())
                                <p style="text-align:center">There is no items in this cart.</tr>
                                @else
                                    @foreach ($cartItems as $item)
                                        <tr>
                                            <td style="width: 1000px">
                                                <div class="media">
                                                    <div class="d-flex">
                                                        <img style="width: 50px" src="/image/{{ $item->product->image }}"
                                                            alt="" />
                                                    </div>
                                                    <div class="media-body">
                                                        <p>{{ $item->product->name }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td style="width: 30px">
                                                <h5>{{ $item->product->price }}</h5>
                                            </td>
                                            <form method="POST" action="{{ route('cart.update', ['id' => $item->id]) }}">
                                                @csrf
                                                @method('PUT')
                                                <td>

                                                    <div class="product_count">
                                                        <input type="number" step="1" min="1"
                                                            max="{{ $item->product->quantity }}" name="quantity"
                                                            value="{{ $item->quantity }}" id="quantity">
                                                        <input type="hidden" name="cart_id" value="{{ $item->id }}">
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5>{{ $item->quantity * $item->product->price }}</h5>
                                                </td>
                                                <td>
                                                    <button type="submit"
                                                        style="background-color: #91CDFF;border:none;border-radius:20px;font-size:13px;padding:2px 10px;color:white">
                                                        {{-- <img src="{{ asset('assets/add-2.png') }}"
                                                            style="width: 25px;opacity:0.7" alt=""> --}}
                                                        Update
                                                    </button>

                                                </td>
                                            </form>
                                            <td style="width: 30px">
                                                <form method="POST"
                                                    action="{{ route('cart.delete', ['id' => $item->id]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        style="background-color: #ff9191;border:none;border-radius:20px;font-size:13px;padding:2px 10px;color:white">
                                                        {{-- <img src="{{ asset('assets/add-2.png') }}"
                                                            style="width: 25px;opacity:0.7" alt=""> --}}
                                                        Remove
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                            @endif

                            <tr class="bottom_button">
                                <td>
                                    {{-- <button type="submit" class="btn">Update Cart</button> --}}

                                </td>
                                <td></td>
                                <td>
                                    <h5>Total</h5>
                                </td>
                                <td>
                                    <h5>${{ $total }}</h5>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>

                            </tr>
                            {{-- <tr class="shipping_area">
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <h5>Shipping</h5>
                                    </td>
                                    <td>
                                        <div class="shipping_box">
                                            <ul class="list">
                                                <li>
                                                    <a href="#">Flat Rate: $5.00</a>
                                                </li>
                                                <li>
                                                    <a href="#">Free Shipping</a>
                                                </li>
                                                <li>
                                                    <a href="#">Flat Rate: $10.00</a>
                                                </li>
                                                <li class="active">
                                                    <a href="#">Local Delivery: $2.00</a>
                                                </li>
                                            </ul>
                                            <h6>
                                                Calculate Shipping
                                                <i class="fa fa-caret-down" aria-hidden="true"></i>
                                            </h6>
                                            <select class="shipping_select">
                                                <option value="1">Bangladesh</option>
                                                <option value="2">India</option>
                                                <option value="4">Pakistan</option>
                                            </select>
                                            <select class="shipping_select">
                                                <option value="1">Select a State</option>
                                                <option value="2">Select a State</option>
                                                <option value="4">Select a State</option>
                                            </select>
                                            <input type="text" placeholder="Postcode/Zipcode" />
                                            <a class="gray_btn" href="#">Update Details</a>
                                        </div>
                                    </td>
                                </tr> --}}
                            <tr class="out_button_area">
                                <td> <a class="gray_btn" href="{{ url('/shop') }}">Continue Shopping</a></td>
                                <td></td>
                                <td></td>
                                <td>



                                </td>
                                <td></td>
                                <td style="justify-content:center">
                                    @if ($cartItems == null)
                                        <span class="btn popup" style="background-color:#91CDFF;color:white"
                                            onclick="myFunction()">
                                            Checkout
                                            <span class="popuptext" id="myPopup">Your cart is Empty!</span>

                                        </span>
                                    @else
                                        <button type="button" id="myBtn" class="btn "
                                            style="background-color:#91CDFF;color:white;font-size:14px;border-radius:20px"
                                            href="#" data-toggle="modal" data-target="#exampleModal">Checkout</button>
                                        {{-- <span class="popup main_btn" onclick="myFunction()"> Add to Cart
                                            <span class="popuptext" id="myPopup">Out of stock!</span>
                                        </span> --}}
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    {{-- </form> --}}

                </div>
            </div>
        </div>
        @if ($cartItems->isEmpty())
            {{-- <p style="text-align:center">There is no items in this cart.</tr> --}}
        @else
            <form method="POST" action="{{ route('checkout') }}">
                @csrf
                <div id="myModal" class="modal">
                    <div class="col-lg-4 m-auto modal-content">
                        <span class="close" style="text-align:end">&times;</span>

                        <div class="order_box">
                            <h2>Your Order</h2>
                            <ul class="list">
                                <li>
                                    <a href="#">Product
                                        <span>Total</span>
                                    </a>
                                </li>
                                @foreach ($cartItems as $item)
                                    <li>
                                        <a href="#">{{ $item->product->name }}
                                            <span class="middle">x {{ $item->quantity }}</span>
                                            <span class="last">{{ $item->quantity * $item->product->price }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <ul class="list list_2">
                                {{-- <li>
                    <a href="#"
                      >Subtotal
                      <span>$2160.00</span>
                    </a>
                  </li> --}}
                                {{-- <li>
                    <a href="#"
                      >Shipping
                      <span>Flat rate: $50.00</span>
                    </a>
                  </li> --}}
                                <li>
                                    <a href="#">Total
                                        <span>{{ $total }}</span>
                                    </a>
                                </li>
                            </ul>
                            {{-- <div class="payment_item">
                            <div class="radion_btn">
                                <input type="radio" id="f-option5" name="selector" />
                                <label for="f-option5">Check payments</label>
                                <div class="check"></div>
                            </div>
                            <p>
                                Please send a check to Store Name, Store Street, Store Town,
                                Store State / County, Store Postcode.
                            </p>
                        </div> --}}
                            {{-- <div class="payment_item active">
                            <div class="radion_btn">
                                <input type="radio" id="f-option6" name="selector" />
                                <label for="f-option6">Paypal </label>
                                <img src="img/product/single-product/card.jpg" alt="" />
                                <div class="check"></div>
                            </div>
                            <p>
                                Please send a check to Store Name, Store Street, Store Town,
                                Store State / County, Store Postcode.
                            </p>
                        </div> --}}
                            <div class="mt-2">
                                <label for="phone">Phone:</label>
                                <input type="tel" class="form-control"name="phone" id="phone"
                                    value="{{ old('phone') }}" placeholder="+959123456789" required>
                            </div>
                            <div class="mt-2">
                                <label for="address">Address:</label>
                                <textarea name="address" class="form-control" id="address" required>{{ old('address') }}</textarea>
                            </div>
                            <input type="hidden" name="total_price" value="{{ $total }}" />

                            <div class="creat_account mt-2">
                                <input type="checkbox" id="f-option4" name="selector" />
                                <label for="f-option4">I’ve read and accept the </label>
                                <a href="#">terms & conditions*</a>
                            </div>
                            <button class="main_btn" type="submit" href="#">Proceed to Paypal</button>
                        </div>
                    </div>
                </div>
            </form>
        @endif

        </div>
    </section>
    {{-- <form method="POST" action="{{ route('checkout') }}">
        @csrf
        <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>
       </div>
        <div>
            <label for="phone">Phone:</label>
            <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" required>
        </div>
        <div>
            <label for="address">Address:</label>
            <textarea name="address" id="address" required>{{ old('address') }}</textarea>
        </div>
        <input type="hidden" name="total_price" value="{{ $total }}" />
        <div>
            <button type="submit">Checkout</button>
        </div>
    </form> --}}

@section('scripts')
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
    <script>
        // When the user clicks on div, open the popup
        function myFunction() {
            var popup = document.getElementById("myPopup");
            popup.classList.toggle("show");
        }
    </script>
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
@endsection
@endsection
