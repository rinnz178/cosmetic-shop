@extends('backend.backend_template')

@section('content')
    <div class="pagetitle">

        <div class="row">
            <div class="col-auto me-auto">
                <h1 style="font-size: 28px;font-weight:bolder;opacity: 0.8">Add Product</h1>
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
        <div class="row">
            <div class="col-lg-11 m-auto">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="card-body mt-5">
                        <form action="{{ route('products.update', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"> Category name</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="category_id" aria-label="Default select example">
                                        <option selected value="{{$product->category_id}}">{{$categoryName}}</option>
                                        <option  disabled>Choose Category</option>
                                        @foreach ($categories as $category)
                                            <option value={{ $category->id }}>{{ $category->name }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Product Name</label>
                                <div class="col-sm-10"> <input type="text" name="name" value="{{ $product->name }}"
                                        class="form-control" placeholder="Product Name"></div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Brand Name</label>
                                <div class="col-sm-10"> <input type="text" name="brand" value="{{ $product->brand }}"
                                        class="form-control" placeholder="Brand Name"></div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10"> <input type="number" name="price" value="{{ $product->price }}"
                                        class="form-control" placeholder="Price"></div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Quantity</label>
                                <div class="col-sm-10"> <input type="number" value="{{ $product->quantity }}"
                                        name="quantity" class="form-control" placeholder="Quantity"></div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Skin type</label>
                                <div class="col-sm-10"> <input type="text" value="{{ $product->skin_type }}"
                                        name="skin_type" class="form-control" placeholder="Skin type"></div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Skin Care Benefits</label>
                                <div class="col-sm-10"> <input type="text" name="skin_care_benefits"
                                        value="{{ $product->skin_care_benefits }}" class="form-control"
                                        placeholder="Skin Care Benifits"></div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                                <div class="col-sm-10"> <input type="file" name="image" class="form-control"
                                        placeholder="image">
                                    <img src="/image/{{ $product->image }}" width="300px">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Product Details</label>
                                <div class="col-sm-10">
                                    <textarea name="detail" id="" class="form-control">{{ $product->detail }}
                                    </textarea>
                                </div>
                            </div>

                            <div class="row mx-5"> <button type="submit" class="btn btn-primary  m-auto">Submit
                                    Form</button></div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
