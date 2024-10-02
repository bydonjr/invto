@extends('admin.master')
@section('admin')



    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">Payment</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Payment</li>
                </ul>
            </div>
            <div class="page-header-right ms-auto">
                <div class="page-header-right-items">
                    <div class="d-flex d-md-none">
                        <a href="javascript:void(0)" class="page-header-right-close-toggle">
                            <i class="feather-arrow-left me-2"></i>
                            <span>Back</span>
                        </a>
                    </div>
                    <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">



                        <a href="/pos" class="btn btn-primary">
                            <i class="feather-plus me-2"></i>
                            <span>Create Sales</span>
                        </a>
                    </div>
                </div>
                <div class="d-md-none d-flex align-items-center">
                    <a href="javascript:void(0)" class="page-header-right-open-toggle">
                        <i class="feather-align-right fs-20"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- [ page-header ] end -->
        <!-- [ Main Content ] start -->
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card stretch stretch-full">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover" id="paymentList">
                                    <thead>
                                        <tr>
                                            <th class="wd-30"></th>
                                            <th>Sale ID</th>
                                            <th>Customer</th>
                                            <th>Products</th>
                                            <th>Sub Total</th>
                                            <th>Tax</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th class="text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sales as $sale)
                                            <tr class="single-item">
                                                <td></td>
                                                <td class="fw-bold">#{{ $sale->id }}</td>
                                                <td>
                                                    <a href="javascript:void(0)" class="hstack gap-3">
                                                        <div class="avatar-image avatar-md bg-teal text-white">
                                                            {{ strtoupper(substr($sale->customer->name, 0, 1)) }}
                                                        </div>
                                                        <div>
                                                            <span class="text-truncate-1-line">{{ $sale->customer->name }}</span>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td>
                                                    {{ $sale->saleItems->pluck('product.name')->implode(', ') }}
                                                </td>
                                                <td class="fw-bold text-dark">{{ number_format($sale->subtotal, 2) }} TZS</td>
                                                <td class="fw-bold text-dark">{{ number_format($sale->tax_amount, 2) }} TZS</td>
                                                <td class="fw-bold text-dark">{{ number_format($sale->total_amount, 2) }} TZS</td>
                                                <td>
                                                    <div class="badge bg-soft-success text-success">Completed</div>
                                                </td>
                                                <td>
                                                    <div class="hstack gap-2 justify-content-end">

        <a href="javascript:void(0);" class="avatar-text avatar-md" onclick="confirmDelete({{ $sale->id }})">
            <i class="feather-trash-2"></i>
        </a>

        <form id="delete-form-{{ $sale->id }}" action="{{ route('sales.destroy', $sale->id) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!-- [ Main Content ] end -->
    </div>
    <!-- [ Footer ] start -->

    <script>
        function confirmDelete(saleId) {
            if (confirm('Are you sure you want to delete this sale?')) {
                document.getElementById('delete-form-' + saleId).submit();
            }
        }
    </script>




@endsection
