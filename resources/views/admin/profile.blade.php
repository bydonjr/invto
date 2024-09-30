@extends('admin.master')
@section('admin')

<div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Profile</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">View</li>
                    </ul>
                </div>

            </div>



            <div class="main-content">
                <div class="row">
                    <div class="col-xxl-4 col-xl-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="mb-4 text-center">
                                    <div class="wd-150 ht-150 mx-auto mb-3 position-relative">
                                        <div class="avatar-image wd-150 ht-150 border border-5 border-gray-3">
                                            <img src="assets/images/avatar/1.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="wd-10 ht-10 text-success rounded-circle position-absolute translate-middle" style="top: 76%; right: 10px">
                                            <i class="bi bi-patch-check-fill"></i>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <a href="javascript:void(0);" class="fs-14 fw-bold d-block"> {{ $adminData->name}}</a>
                                        <a href="javascript:void(0);" class="fs-12 fw-normal text-muted d-block">{{ $adminData->email}}</a>
                                    </div>

                                </div>
                                <ul class="list-unstyled mb-4">
                                    <li class="hstack justify-content-between mb-4">
                                        <span class="text-muted fw-medium hstack gap-3"><i class="feather-map-pin"></i>Location</span>
                                        <a href="javascript:void(0);" class="float-end">Mlimani City, Dar Es Salaam</a>
                                    </li>
                                    <li class="hstack justify-content-between mb-4">
                                        <span class="text-muted fw-medium hstack gap-3"><i class="feather-phone"></i>Phone</span>
                                        <a href="javascript:void(0);" class="float-end">+01 (375) 2589 645</a>
                                    </li>
                                    <li class="hstack justify-content-between mb-0">
                                        <span class="text-muted fw-medium hstack gap-3"><i class="feather-mail"></i>Email</span>
                                        <a href="javascript:void(0);" class="float-end">{{ $adminData->email}}</a>
                                    </li>
                                </ul>

                            </div>
                        </div>

                    </div>
                    <div class="col-xxl-8 col-xl-6">
                        <div class="card border-top-0">

                            <div class="tab-content">
                                <div class="tab-pane fade show active p-4" id="overviewTab" role="tabpanel">

                                    <div class="profile-details mb-5">
                                        <div class="mb-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0">Profile Details:</h5>
                                            <a href="{{ route('edit.profile')}}" class="w-10 btn btn-primary">
                                        <i class="feather-edit me-2"></i>
                                        <span>Edit Profile</span>
                                    </a>
                                        </div>
                                        <div class="row g-0 mb-4">
                                            <div class="col-sm-6 text-muted">Full Name:</div>
                                            <div class="col-sm-6 fw-semibold">{{ $adminData->name}}</div>
                                        </div>
                                        <div class="row g-0 mb-4">
                                            <div class="col-sm-6 text-muted">Username:</div>
                                            <div class="col-sm-6 fw-semibold">{{ $adminData->username}}</div>
                                        </div>
                                        <div class="row g-0 mb-4">
                                            <div class="col-sm-6 text-muted">Company:</div>
                                            <div class="col-sm-6 fw-semibold">invto.</div>
                                        </div>
                                        <div class="row g-0 mb-4">
                                            <div class="col-sm-6 text-muted">Date of Birth:</div>
                                            <div class="col-sm-6 fw-semibold">26 May, 2000</div>
                                        </div>
                                        <div class="row g-0 mb-4">
                                            <div class="col-sm-6 text-muted">Mobile Number:</div>
                                            <div class="col-sm-6 fw-semibold">+01 (375) 5896 3214</div>
                                        </div>
                                        <div class="row g-0 mb-4">
                                            <div class="col-sm-6 text-muted">Email Address:</div>
                                            <div class="col-sm-6 fw-semibold">{{ $adminData->email}}</div>
                                        </div>
                                        <div class="row g-0 mb-4">
                                            <div class="col-sm-6 text-muted">Location:</div>
                                            <div class="col-sm-6 fw-semibold">Mlimani City, Dar Es Salaam</div>
                                        </div>
                                        <div class="row g-0 mb-4">
                                            <div class="col-sm-6 text-muted">Joining Date:</div>
                                            <div class="col-sm-6 fw-semibold">{{ $adminData->created_at}}</div>
                                        </div>
                                        <div class="row g-0 mb-4">
                                            <div class="col-sm-6 text-muted">Country:</div>
                                            <div class="col-sm-6 fw-semibold">Tanzania</div>
                                        </div>


                                    </div>


                                </div>





                            </div>
                        </div>
                    </div>
                </div>
            </div>



@endsection
