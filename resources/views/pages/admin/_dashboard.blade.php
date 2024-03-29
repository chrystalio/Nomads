@extends('layouts._admin')
@section('title', 'Nomads Dashboard')
@section('content')
    <div class="page-heading d-flex justify-content-between">
        <h3>Nomads Dashboard</h3>
        <form action="{{route('logout')}}" method="post">
            @csrf
            <button class="btn btn-outline-danger shadow-md btn-sm d-flex justify-content-end" type="submit">Logout</button>
        </form>
    </div>
    <div class="page-content">

        <section class="row">
            <div class="col-12 col-lg-12">
                @if(auth()->user()->email_verified_at === null)
                    <div class="alert alert-light-danger color-danger alert-dismissible">
                        <i class="bi bi-exclamation-circle"></i> Your account has not been verified. Please check your email for verification instructions.
                    </div>
                @endif
                <div class="card d-sm-block hidden">
                    <div class="card-body py-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="{{url('backend/assets/images/faces/2.jpg')}}" alt="Face 1">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">{{auth()->user()->name}}</h5>
                                <h6 class="text-muted mb-0 fs-6">{{auth()->user()->roles}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon purple mb-2">
                                            <i class="iconly-boldFolder"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-bold">
                                            <a href="{{route('travel-package.index')}}" class="text-decoration-none">
                                                Travel Packages
                                            </a>
                                        </h6>
                                        <h6 class="font-extrabold mb-0">{{$travelPackagesCount}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon blue mb-2">
                                            <i class="iconly-boldBuy"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-bold">
                                            <a href="{{route('transaction.index')}}" class="text-decoration-none">
                                                Transactions
                                            </a>
                                        </h6>
                                        <h6 class="font-extrabold mb-0">{{$transactionsCount}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon red mb-2">
                                            <i class="iconly-boldTime-Circle"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-bold">Pending</h6>
                                        <h6 class="font-extrabold mb-0">{{$pendingTransactionsCount}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon green mb-2">
                                            <i class="iconly-boldSend"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-bold">Success</h6>
                                        <h6 class="font-extrabold mb-0">{{$successTransactionsCount}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Customer Growth</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-profile-visit"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
