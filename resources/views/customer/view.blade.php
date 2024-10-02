@extends('admin.master')
@section('admin')

        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Customers</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item">Customers</li>
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



                            <a href="/customer/create" class="btn btn-primary">
                                <i class="feather-plus me-2"></i>
                                <span>Add Customer</span>
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
                                    <table class="table table-hover" id="customerList">
                                        <thead>
                                            <tr>

                                                <th>Customer</th>
                                                <th>Email</th>

                                                <th>Phone</th>

                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($customers as $customer)  <!-- Loop through the customers -->
                                            <tr class="single-item">

                                                <td>
                                                    <a href="{{ route('customer.view', $customer->id) }}" class="hstack gap-3">
                                                        <div>
                                                            <span class="text-truncate-1-line">{{ $customer->name }}</span>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td><a href="mailto:{{ $customer->email }}">{{ $customer->email }}</a></td>
                                                <td><a href="tel:{{ $customer->phone }}">{{ $customer->phone }}</a></td>
                                                <td>
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <a href="{{ route('customers.edit', $customer->id) }}" class="avatar-text avatar-md">
                                                            <i class="feather-edit"></i>
                                                        </a>

                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="avatar-text avatar-md" onclick="confirmDelete({{ $customer->id }})">
                                                                <i class="feather-trash-2"></i>
                                                            </a>

                                                            <form id="delete-form-{{ $customer->id }}" action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </div>
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
            function confirmDelete(customerId) {
                if (confirm('Are you sure you want to delete this customer?')) {
                    document.getElementById('delete-form-' + customerId).submit();
                }
            }
        </script>



@endsection
