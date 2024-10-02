@extends('admin.master')
@section('admin')


 <!-- [ page-header ] start -->
 <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Dashboard</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                    </ul>
                </div>

            </div>
            <!-- [ page-header ] end -->


<div class="main-content">

                <div class="row">
                    <!-- [Invoices Awaiting Payment] start -->

                    <!-- [Invoices Awaiting Payment] end -->
                    <!-- [Converted Leads] start -->

                    <!-- [Converted Leads] end -->
                    <!-- [Projects In Progress] start -->

                    <!-- [Projects In Progress] end -->
                    <!-- [Conversion Rate] start -->

                    <!-- [Conversion Rate] end -->
                    <!-- [Payment Records] start -->

                    <!-- [Payment Records] end -->
                    <!-- [Total Sales] start -->
                    <div class="col-xl-12">
                        <div class="card stretch stretch-full overflow-hidden">
                            <div class="bg-primary text-white">
                                <div class="p-4">
                                    <span class="badge bg-light text-primary text-dark float-end">12%</span>
                                    <div class="text-start">
                                        <h4 class="text-reset">{{ $totalSalesCount }}</h4>
                                        <p class="text-reset m-0">Total Sales</p>
                                    </div>

                                </div>
                                <div id="total-sales-color-graph"></div>
                            </div>

                               <!-- List All Sales --] end !-->

                               <div class="card-body">
                                @foreach($sales as $sale)
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="hstack gap-3">
                                            <div class="avatar-image avatar-lg p-2 rounded">
                                                <img class="img-fluid" src="{{ asset('backend/assets/images/brand/shopify.png') }}" alt="Sale Image" />
                                            </div>
                                            <div>

                                                <a href="javascript:void(0);" class="d-block">
                                                    {{ $sale->saleItems->pluck('product.name')->implode(', ') }}
                                                </a>

                                                <span class="fs-12 text-muted">{{ $sale->customer->name }}</span>
                                            </div>
                                        </div>
                                        <div>

                                            <div class="fw-bold text-dark">
                                                {{ number_format($sale->total_amount, 2) }} TZS
                                            </div>
                                        </div>
                                    </div>

                                    @if (!$loop->last)
                                        <hr class="border-dashed my-3" />
                                    @endif
                                @endforeach
                            </div>





                            <a href="/sales/all" class="card-footer fs-11 fw-bold text-uppercase text-center py-4">View All Sales</a>
                        </div>
                    </div>
                    <!-- [Total Sales] end !-->

                    <!--! END: [Team Progress] !-->
                </div>
            </div>

@endsection
