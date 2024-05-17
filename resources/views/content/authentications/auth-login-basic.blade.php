@extends('layouts/blankLayout')

@section('title', 'Login')

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">
@endsection

@section('content')
    <div class="container">
        <form class="login active" id="frmlogin">
            @method('post')
            @csrf
            <h2 class="title" style="text-align: center;">Library Book Borrowing and Returning System</h2>
            <div class="google-sign-in-container">
                <div id="g_id_onload" data-client_id="{{ env('GOOGLE_CLIENT_ID') }}" data-callback="onSignIn">
                </div>
                <div class="g_id_signin form-control mb-2" data-type="standard"></div>
            </div>
            <div class="or-text text-muted mt-3" style="text-align: center">─── OR ENTER YOUR ACCOUNT BELOW ───</div>
            <div class="form-group mt-3">
                <div class="danger text-center mt-6">
                    <p id="error" style="display: none;"></p>
                    <p id="error-message" style="display: none;"></p>
                    <p id="error-time" style="display: none;"></p>
                </div>
                <label for="email">Email</label>
                <div class="input-group">
                    <input type="email" name="email" class="form-control" placeholder="Email address"
                        value="{{ old('email') }}" required>
                    <i class='bx bx-envelope input-icon'></i>
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <input type="password" pattern=".{8,}" name="password" id="password" class="form-control"
                        placeholder="Your password" required>
                    <i class='bx bx-lock-alt input-icon'></i>
                </div>
                <span class="help-text">At least 8 characters</span>
            </div>
            <button type="submit" class="btn btn-primary btn-block mt-3" id="subtn">Login</button>
        </form>
    </div>

@endsection
