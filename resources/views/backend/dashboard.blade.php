@extends('backend.backend_template')
@section('title','Admin Dashboard')
@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
    </div>
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-xxl-3 col-md-3">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Sales</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-receipt"></i>

                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$doneOrdersCount}}</h6>
                                        <a href="{{ url('admin/sales') }}">
                                            <span class="small pt-2 ps-1" style="color:blue">
                                                See More...
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-3">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Orders</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>

                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$pendingOrdersCount}}</h6>
                                        <a href="{{ url('admin/orders') }}">
                                            <span class="small pt-2 ps-1" style="color:blue">
                                                See More...
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-3 col-md-3">
                        <div class="card info-card revenue-card">

                            <div class="card-body">
                                <h5 class="card-title">Products </h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-boxes"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$productCount}}</h6>
                                        <a href="{{ route('products.index') }}">
                                            <span class="small pt-2 ps-1" style="color:blue">
                                                See More...
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-3">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Categories </h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-card-list"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$categoryCount}}</h6>
                                        <a href="{{ route('categories.index') }}">
                                            <span class="small pt-2 ps-1" style="color:blue">
                                                See More...
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <h4>Data Chart</h4>
                            <canvas id="order-status-chart" style="max-height: 300px"></canvas>
                        </div>
                        <div class="col-8">
                            <div class="card recent-sales overflow-auto">
                                {{-- <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div> --}}
                                <div class="card-body">
                                    <h5 class="card-title">Recent Sales <span>| Today</span></h5>
                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Customer</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($todayOrders as $order)
                                                <tr>
                                                    <td scope="row"><a href="#">#{{ $order->id }}</a></td>
                                                    <td>{{ $order->name }}</td>

                                                    <td>
                                                        @foreach ($order->orderProducts as $product)
                                                            <li> {{ $product->name }}
                                                            </li>
                                                        @endforeach

                                                    </td>
                                                    <td>${{ $order->total_price }}</td>
                                                    <td>
                                                        @if ($order->status === 'pending')
                                                            {{-- Display Pending Button --}}
                                                            <form
                                                                action="{{ route('orders.update', ['order' => $order->id]) }}"
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

                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        var orderStatusData = {!! json_encode($chartData) !!};
                        var orderStatusChart = new Chart(document.getElementById("order-status-chart"), {
                            type: 'pie',
                            data: {
                                labels: Object.keys(orderStatusData),
                                datasets: [{
                                    backgroundColor: [
                                        "#f6c23e",
                                        "#1cc88a",
                                    ],
                                    data: Object.values(orderStatusData)
                                }]
                            },
                            options: {
                                title: {
                                    display: true,
                                    text: 'Order Status Breakdown'
                                }
                            }
                        });
                    </script>

                </div>
            </div>
        </div>
    </section>
@endsection

@isset($chartData)
    <script>
        var pieChart = new Chart(document.getElementById("myPieChart"), {
            type: 'pie',
            data: {
                labels: {!! json_encode(array_keys($chartData)) !!},
                datasets: [{
                    data: {!! json_encode(array_values($chartData)) !!},
                    backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745'],
                }],
            },
        });
    </script>
@endisset
