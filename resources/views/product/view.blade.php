@extends('admin.master')
@section('admin')



        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Products</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Products</li>
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

                            <a href="/product/create" class="btn btn-md btn-primary">
                                <i class="feather-plus me-2"></i>
                                <span>Add Product</span>
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

                    <div class="col-xl-12">
                        <div class="card stretch stretch-full">
                            <div class="card-header">
                                <h5 class="card-title">All Products</h5>

                            </div>
                            <div class="card-body custom-card-action p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Products</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Price</th>
                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($products as $product)
                                            <tr>
                                                <td>
                                                    <div class="hstack gap-3">
                                                        <div class="avatar-image rounded">
                                                            <img class="img-fluid" src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}">
                                                        </div>
                                                        <div>
                                                            <a href="javascript:void(0);" class="d-block">{{ $product->name }}</a>
                                                            <span class="fs-12 text-muted">Product description.</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-soft-primary text-primary">{{ $product->quantity }} in stock</a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-soft-primary text-primary">{{ $product->price }} TZS</a>
                                                </td>
                                                <td>
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <a href="{{ route('products.edit', $product->id) }}" class="avatar-text avatar-md" title="Edit Product">
                                                            <i class="feather-edit"></i>
                                                        </a>

                                                        <div class="dropdown">
                                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" id="delete-form-{{ $product->id }}" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                            <a href="javascript:void(0);" class="avatar-text avatar-md" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $product->id }}').submit();">
                                                                <i class="feather-trash-2"></i>
                                                            </a>
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
        </div>


@endsection
