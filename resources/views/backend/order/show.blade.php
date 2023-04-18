@extends('backend.backend_template')
@section('title', 'Order Details')

@section('content')
    <div class="pagetitle">

        <div class="row">
            <div class="col-auto me-auto">
                <h1 style="font-size: 28px;font-weight:bolder;opacity: 0.8">Order Details</h1>
                {{-- <p class="mt-3">In this page, you can see porducts. If you want to add a product, click “<b>Add
                        Product</b>"" .</p> --}}

            </div>
            <div class="col-auto">
                <a href="{{ url('admin/orders') }}">
                    <button class="btn " style="background-color: #4154f1;color:#fff;font-size: 14px">
                        Back
                    </button>
                </a>
            </div>
        </div>
    </div>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <div class="page-content container">


        <div class="container px-0">
            <div class="row mt-4">
                <div class="col-12 col-lg-12">

                    <!-- .row -->

                    <hr class="row brc-default-l1 mx-n1 mb-4" />
                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <span class="text-sm text-grey-m2 align-middle">To:</span>
                                <span class="text-600 text-110 text-blue align-middle">{{ $order->name }}</span>
                            </div>
                            <div class="text-grey-m2">
                                <div class="my-1">
                                    {{ $order->address }} </div>

                                <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b
                                        class="text-600">{{ $order->phone }}</b></div>
                            </div>
                        </div>
                        <!-- /.col -->

                        <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                            <hr class="d-sm-none" />
                            <div class="text-grey-m2">
                                <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                    Invoice
                                </div>

                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                        class="text-600 text-90">ID:</span> #{{ $order->id }}</div>

                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                        class="text-600 text-90">Issue Date:</span>
                                    {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/y') }}</div>

                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                        class="text-600 text-90">Status:</span>
                                    @if ($order->status === 'pending')
                                        {{-- Display Button A --}}
                                        {{-- For example: --}}
                                        <span class="badge bg-warning">Pending</span>
                                    @elseif ($order->status === 'done')
                                        {{-- Display Button B --}}
                                        {{-- For example: --}}
                                        <button id="buttonB" style="border:none;background:none"><span class="badge bg-success">Approved</span></button>
                                    @endif
                                    <span class="badge badge-warning badge-pill px-25">Unpaid</span>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>

                    <div class="mt-4">
                        <div class="row text-600 text-white  py-25" style="background-color: #4e73df;padding:10px">
                            <div class="d-none d-sm-block col-1">#</div>
                            <div class="col-9 col-sm-5">Description</div>
                            <div class="d-none d-sm-block col-4 col-sm-2">Qty</div>
                            <div class="d-none d-sm-block col-sm-2">Unit Price</div>
                            <div class="col-2">Amount</div>
                        </div>
                        @php
                            $totalAmount = 0;
                        @endphp
                        <div class="text-95 text-secondary-d3">
                            @foreach ($order->orderProducts as $product)
                                <div class="row mb-2 mb-sm-0 py-25">
                                    <div class="d-none d-sm-block col-1">{{ $i++ }}</div>
                                    <div class="col-9 col-sm-5">{{ $product->name }}</div>
                                    <div class="d-none d-sm-block col-2">{{ $product->quantity }}</div>
                                    <div class="d-none d-sm-block col-2 text-95">${{ $product->price }}</div>
                                    <div class="col-2 text-secondary-d2">${{ $product->quantity * $product->price }}
                                    </div>
                                </div>
                                @php
                                    $totalAmount += $product->quantity * $product->price;
                                @endphp
                            @endforeach


                        </div>

                        <div class="row border-b-2 brc-default-l2"></div>



                        <div class="row mt-3">
                            <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                                {{-- Extra note such as company or payment information... --}}
                            </div>

                            <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">

                                <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                    <div class="col-7 text-right">
                                        Total Amount
                                    </div>
                                    <div class="col-5">
                                        <span class="text-150 text-success-d3 opacity-2">{{ $totalAmount }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr />

                        <div style="float: right">
                            <span class="text-secondary-d1 text-105">Thank you for your business</span>
                            <a href="{{ route('orders.export', ['id' => $order->id]) }}"
                                style="justify-content: center;background-color: #4154f1;color:white"
                                class="btn btn-bold px-4  mt-3 mt-lg-0">
                                <i class="bi bi-download"></i>
                                Export</a>
                        </div>
                    </div>
                    {{-- @endforeach --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')

    .text-secondary-d1 {
    color: #728299!important;
    }
    .page-header {
    margin: 0 0 1rem;
    padding-bottom: 1rem;
    padding-top: .5rem;
    border-bottom: 1px dotted #e2e2e2;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-align: center;
    align-items: center;
    }
    .page-title {
    padding: 0;
    margin: 0;
    font-size: 1.75rem;
    font-weight: 300;
    }
    .brc-default-l1 {
    border-color: #dce9f0!important;
    }

    .ml-n1, .mx-n1 {
    margin-left: -.25rem!important;
    }
    .mr-n1, .mx-n1 {
    margin-right: -.25rem!important;
    }
    .mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
    }

    hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(0,0,0,.1);
    }

    .text-grey-m2 {
    color: #888a8d!important;
    }

    .text-success-m2 {
    color: #86bd68!important;
    }

    .font-bolder, .text-600 {
    font-weight: 600!important;
    }

    .text-110 {
    font-size: 110%!important;
    }
    .text-blue {
    color: #478fcc!important;
    }
    .pb-25, .py-25 {
    padding-bottom: .75rem!important;
    }

    .pt-25, .py-25 {
    padding-top: .75rem!important;
    }
    .bgc-default-tp1 {
    background-color: rgba(121,169,197,.92)!important;
    }
    .bgc-default-l4, .bgc-h-default-l4:hover {
    background-color: #f3f8fa!important;
    }
    .page-header .page-tools {
    -ms-flex-item-align: end;
    align-self: flex-end;
    }

    .btn-light {
    color: #757984;
    background-color: #f5f6f9;
    border-color: #dddfe4;
    }
    .w-2 {
    width: 1rem;
    }

    .text-120 {
    font-size: 120%!important;
    }
    .text-primary-m1 {
    color: #4087d4!important;
    }

    .text-danger-m1 {
    color: #dd4949!important;
    }
    .text-blue-m2 {
    color: #68a3d5!important;
    }
    .text-150 {
    font-size: 150%!important;
    }
    .text-60 {
    font-size: 60%!important;
    }
    .text-grey-m1 {
    color: #7b7d81!important;
    }
    .align-bottom {
    vertical-align: bottom!important;
    }







@endsection
