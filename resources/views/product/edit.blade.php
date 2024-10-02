@extends('admin.master')
@section('admin')


<div class="page-header">
    <div class="page-header-left d-flex align-items-center">
        <div class="page-header-title">
            <h5 class="m-b-10">Products</h5>
        </div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Edit Product</li>
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
                <a href="javascript:void(0);" class="btn btn-light-brand successAlertMessage">
                    <i class="feather-layers me-2"></i>
                    <span>Save as Draft</span>
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

<div class="main-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card border-top-0">
                <div class="card-header p-0">
                    <ul class="nav nav-tabs flex-wrap w-100 text-center customers-nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item flex-fill border-top" role="presentation">
                            <a href="javascript:void(0);" class="nav-link active" data-bs-toggle="tab" data-bs-target="#profileTab" role="tab">Edit Product</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="profileTab" role="tabpanel">
                        <div class="card-body personal-info">
                            <form id="productForm" action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT') <!-- Use PUT for update -->

                                <!-- Name Input -->
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="fullnameInput" class="fw-semibold">Name: </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-user"></i></div>
                                            <input type="text" name="name" class="form-control" id="fullnameInput" placeholder="Product Name" value="{{ old('name', $product->name) }}" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Quantity Input -->
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="quantityInput" class="fw-semibold">Quantity: </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-box"></i></div>
                                            <input type="number" name="quantity" class="form-control" id="quantityInput" placeholder="Product Quantity" value="{{ old('quantity', $product->quantity) }}" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Price Input -->
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="priceInput" class="fw-semibold">Price: </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-box"></i></div>
                                            <input type="number" name="price" class="form-control" id="priceInput" placeholder="Product Price" value="{{ old('price', $product->price) }}" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Photo Input -->
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label class="fw-semibold">Product Photo: </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="file" name="photo" accept="image/*">
                                        <!-- Display current photo if available -->
                                        @if($product->photo)
                                            <img src="{{ Storage::url($product->photo) }}" alt="Current Photo" class="mt-2" style="max-width: 150px;">
                                        @endif
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-12 text-end">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="feather-user-plus me-2"></i>
                                            <span>Update Product</span>
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <!-- Success Message -->
                            @if (session('success'))
                                <div class="alert alert-success mt-4">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>





@endsection
