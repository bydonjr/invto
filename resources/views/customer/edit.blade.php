@extends('admin.master')
@section('admin')


<div class="main-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card border-top-0">
                <div class="card-header p-0">
                    <ul class="nav nav-tabs flex-wrap w-100 text-center customers-nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item flex-fill border-top" role="presentation">
                            <a href="javascript:void(0);" class="nav-link active" data-bs-toggle="tab" data-bs-target="#profileTab" role="tab">Edit Profile</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="profileTab" role="tabpanel">
                        <div class="card-body personal-info">
                            <!-- Ensure the form action points to the correct update route -->
                            <form id="customerForm" action="{{ route('customers.update', $customer->id) }}" method="POST">
                                @csrf
                                @method('PUT') <!-- Use the PUT method for updating -->

                                <div class="mb-4 d-flex align-items-center justify-content-between">
                                    <h5 class="fw-bold mb-0 me-4">
                                        <span class="d-block mb-2">Personal Information:</span>
                                        <span class="fs-12 fw-normal text-muted text-truncate-1-line">Following information is publicly displayed, be careful!</span>
                                    </h5>
                                </div>

                                <!-- Name Input -->
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="fullnameInput" class="fw-semibold">Name: </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-user"></i></div>
                                            <input type="text" name="name" class="form-control" id="fullnameInput" value="{{ old('name', $customer->name) }}" placeholder="Name" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Phone Input -->
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="phoneInput" class="fw-semibold">Phone: </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-phone"></i></div>
                                            <input type="text" name="phone" class="form-control" id="phoneInput" value="{{ old('phone', $customer->phone) }}" placeholder="Phone" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Email Input -->
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="mailInput" class="fw-semibold">Email: </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-mail"></i></div>
                                            <input type="email" name="email" class="form-control" id="mailInput" value="{{ old('email', $customer->email) }}" placeholder="Email" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-12 text-end">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="feather-user-plus me-2"></i>
                                            <span>Save Changes</span>
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>








@endsection
