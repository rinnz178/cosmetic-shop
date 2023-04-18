@extends('backend.backend_template')

@section('content')
    <div class="pagetitle">

        <div class="row">
            <div class="col-auto me-auto">
                <h1 style="font-size: 28px;font-weight:bolder;opacity: 0.8">Product Details</h1>
                {{-- <p class="mt-3">In this page, you can see porducts. If you want to add a product, click “<b>Add
                        Product</b>"" .</p> --}}

            </div>
            <div class="col-auto">
                <a href="{{ route('products.index') }}">
                    <button class="btn " style="background-color: #4154f1;color:#fff;font-size: 14px">
                        Back
                    </button>
                </a>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row mt-5">
            <div class="col-lg-9 m-auto">
                <div class="card p-4">
                    <div class="row">
                        <img class="m-auto col-lg-6" src="/image/{{ $product->image }}" width="230px">
                        <div class="col-6">
                            <ol class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Product Name</div>
                                        <span style="opacity: 0.8">{{$product->name}}</span>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Category Name</div>
                                        <span style="opacity: 0.8">{{$categoryName}}</span>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Brand</div>
                                        <span style="opacity: 0.8">{{$product->brand}}</span>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Price</div>
                                        <span style="opacity: 0.8">{{$product->price}}</span>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Skin Type</div>
                                        <span style="opacity: 0.8">{{$product->skin_type}}</span>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Skin Care Benefits</div>
                                        <span style="opacity: 0.8">{{$product->skin_care_benefits}}</span>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">{{$product->name}} 's Details</div>
                                        <span style="opacity: 0.8">{{$product->detail}}</span>
                                    </div>
                                </li>
                                
                            </ol>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
@endsection
