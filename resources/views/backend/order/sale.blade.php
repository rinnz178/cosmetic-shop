@extends('backend.backend_template')
@section('title','Sales')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="pagetitle ">
        <div class="row">
            <div class="col-auto me-auto">
                <h1 style="font-size: 28px;font-weight:bolder;opacity: 0.8">Sale List</h1>
                <p class="mt-3">In this page, you can see Sales. </p>

            </div>
            {{-- <div class="col-auto">
                <a href="{{ route('categories.create') }}">
                    <button class="btn " style="background-color: #4154f1;color:#fff;font-size: 14px">Add
                        Category
                    </button>
                </a>
            </div> --}}
        </div>

    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body mt-4">


                        <table class="table datatable ">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Product Name</th>
                                    {{-- <th>Quantity</th> --}}
                                    <th>Customer Name</th>

                                    <th>Action</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($doneOrders as $order)
                                    <tr>
                                        <td> #{{ $order->id }}</td>

                                        <td>
                                            @foreach ($order->orderProducts as $product)
                                                <li> {{ $product->name }}
                                                </li>
                                            @endforeach

                                        </td>
                                        {{-- <td>

                                        </td> --}}
                                        {{-- <td>
                                            @foreach ($order->orderProducts as $product)
                                                {{ $product->quantity }}
                                            @endforeach
                                        </td> --}}
                                        <td>
                                            {{ $order->name }}
                                        </td>
                                        <td>
                                            {{-- <form action="{{ route('orders.destroy', $product->id) }}" method="POST"> --}}

                                            <a class="btn" onclick="myFunction()"
                                                href="{{ route('orders.show', ['id' => $order->id]) }}"
                                                style="background-color: rgb(102, 214, 156);border-radius:20px">
                                                <i class="bi bi-eye-fill" style="color:white"></i>
                                            </a>



                                            {{-- <a class="btn "
                                                    style="background-color: rgb(78, 155, 255);border-radius:20px"
                                                    href="{{ route('products.edit', $product->id) }}">
                                                    <i class="bi bi-pencil-square 
                                                "
                                                        style="color:white"></i>
                                                </a> --}}

                                            {{-- @csrf
                                                @method('DELETE') --}}
                                            {{-- 
                                                <button type="submit" class="btn "
                                                    style="background-color: rgb(255, 78, 78);border-radius:20px"><i
                                                        class="bi bi-trash-fill
                                            "
                                                        style="color:white"></i></button> --}}
                                            {{-- </form> --}}
                                        </td>
                                        <td>
                                            @if ($order->status === 'pending')
                                                {{-- Display Pending Button --}}
                                                <form action="{{ route('orders.update', ['order' => $order->id]) }}"
                                                    method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="done">
                                                    <button type="submit" class="badge bg-warning"
                                                        style="border: none;padding: 4px 14px">Pending</button>
                                                </form>
                                            @elseif ($order->status === 'done')
                                                {{-- Display Approved Button --}}
                                                <span class="badge bg-success" style=" ">Approved</span>
                                            @endif
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

@section('scripts')
    <script>
        function myFunction() {
            var x = document.getElementById("myDIV");
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }
    </script>
@endsection
