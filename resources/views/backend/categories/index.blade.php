@extends('backend.backend_template')
@section('title','Category')

@section('content')
    <div class="pagetitle ">
        <div class="row">
            <div class="col-auto me-auto">
                <h1 style="font-size: 28px;font-weight:bolder;opacity: 0.8">Category List</h1>
                <p class="mt-3">In this page, you can see categories. If you want to add a product, click “<b>Add
                        Category</b>"" .</p>

            </div>
            <div class="col-auto">
                <a href="{{ route('categories.create') }}">
                    <button class="btn " style="background-color: #4154f1;color:#fff;font-size: 14px">Add
                        Category
                    </button>
                </a>
            </div>
        </div>

    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="card">
                    <div class="card-body mt-4">


                        <table class="table datatable ">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Category Name</th>
                                    <th width="280px">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">

                                                {{-- <a class="btn" style="background-color: rgb(102, 214, 156);border-radius:20px"
                                                    href="{{ route('categories.show', $category->id) }}">
                                                    <i class="bi bi-eye-fill" style="color:white"></i>
                                                </a> --}}

                                                <a class="btn " style="background-color: rgb(78, 155, 255);border-radius:20px"
                                                    href="{{ route('categories.edit', $category->id) }}">
                                                    <i
                                                        class="bi bi-pencil-square 
                                                    " style="color:white"></i>
                                                </a>

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn " style="background-color: rgb(255, 78, 78);border-radius:20px"><i
                                                    class="bi bi-trash-fill
                                                " style="color:white"></i></button>
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
