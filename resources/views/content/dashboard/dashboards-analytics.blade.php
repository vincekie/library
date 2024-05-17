@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Library Book Borrowing and Returning System')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection

@section('content')

    <hr class="my-5">
    <div class="row my-5">
        <div class="col-lg-8 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-8">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Welcome {{ Auth::user()->name }}! 🎉</h5>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="{{ asset('assets/img/illustrations/man-with-laptop-light.png') }}" height="140"
                                alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- User Count Card -->
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card text-center">
                <div class="card-body d-flex align-items-center">
                    <i class="bx bx-user text-primary" style="font-size: 4rem; margin-right: 20px;"></i>
                    <div>
                        <p class="mb-0"> Number of Users</p>
                        <h2 class="font-weight-bold mb-0">{{ $userCount }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Book Count Card -->
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card text-center">
                <div class="card-body d-flex align-items-center">
                    <i class="bx bx-book text-primary" style="font-size: 4rem; margin-right: 20px;"></i>
                    <div>
                        <p class="mb-0">Number of Books</p>
                        <h2 class="font-weight-bold mb-0">{{ $bookCount }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
