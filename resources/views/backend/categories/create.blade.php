@extends('backend.backend_template')
@section('title','Add New Category')

@section('content')
    <div class="pagetitle">

        <div class="row">
            <div class="col-auto me-auto">
                <h1 style="font-size: 28px;font-weight:bolder;opacity: 0.8">Add Category</h1>
                {{-- <p class="mt-3">In this page, you can see porducts. If you want to add a product, click “<b>Add
                        Product</b>"" .</p> --}}

            </div>
            <div class="col-auto">
                <a href="{{ route('categories.index') }}">
                    <button class="btn " style="background-color: #4154f1;color:#fff;font-size: 14px">
                        Back
                    </button>
                </a>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row" style="margin-bottom: 20vh">
            <div class="col-lg-6 m-auto">
                <div class="card " style="margin-top: 5vh">
                    <div class="card-body " style="margin-top: 70px">
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
                        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-4">
                                {{-- <label for="inputText" class="col-sm-3 col-form-label">Category Name</label> --}}
                                <div class="col-sm-9 m-auto"> <input type="text" name="name" class="form-control"
                                        placeholder="Enter Category Name"></div>
                            </div>
                            <div class="row mx-5 mb-5"> 
                                <button type="submit" class="btn btn-primary  m-auto">Submit
                                    Form</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
