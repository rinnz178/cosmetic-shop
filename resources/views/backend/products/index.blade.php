@extends('backend.backend_template')
<style>

</style>
@section('content')
    <div class="pagetitle ">
        <div class="row">
            <div class="col-auto me-auto">
                <h1 style="font-size: 28px;font-weight:bolder;opacity: 0.8">Product List</h1>
                <p class="mt-3">In this page, you can see porducts. If you want to add a product, click “<b>Add
                        Product</b>"" .</p>

            </div>
            <div class="col-auto">
                <a href="{{ url('admin/products/create') }}">
                    <button class="btn " style="background-color: #4154f1;color:#fff;font-size: 14px">Add
                        Product
                    </button>
                </a>
            </div>
        </div>

    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
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
                    <div class="card-body mt-4">

                        <table class="table datatable ">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    {{-- <th>Image</th> --}}
                                    <th>Name</th>
                                    <th>Brand</th>
                                    <th>Price</th>

                                    <th >Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr >
                                        <td>{{ ++$i }}</td>
                                        {{-- <td style="
                                      ">
                                            <img src="/image/{{ $product->image }}" width="70px"
                                                style="border-radius: 50px">
                                        </td> --}}
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->brand }}</td>
                                        <td>{{ $product->price }}</td>

                                        <td>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">

                                                <a class="btn"
                                                    style="background-color: rgb(102, 214, 156);border-radius:20px"
                                                    href="{{ route('products.show', $product->id) }}">
                                                    <i class="bi bi-eye-fill" style="color:white"></i>
                                                </a>

                                                <a class="btn "
                                                    style="background-color: rgb(78, 155, 255);border-radius:20px"
                                                    href="{{ route('products.edit', $product->id) }}">
                                                    <i class="bi bi-pencil-square 
                                                "
                                                        style="color:white"></i>
                                                </a>

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn "
                                                    style="background-color: rgb(255, 78, 78);border-radius:20px"><i
                                                        class="bi bi-trash-fill
                                            "
                                                        style="color:white"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
