@extends('layouts/blankLayout')

@section('title', 'Register Basic - Pages')

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">
@endsection


@section('content')
    <div class="container">
        <form method="post" class="register active" action="{{ route('auth-register-user-basic') }}">
            @csrf
            @method('post')
            <h2 class="title">Register your account</h2>
            <div class="form-group">
                <label for="email">Name</label>
                <div class="input-group">
                    <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Your name"
                        required>
                    <i class='bx bx-user'></i>
                </div>
                @error('name')
                    <div class="danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <div class="input-group">
                    <input type="text" id="name" name="address" value="{{ old('address') }}"
                        placeholder="Your address" required>
                    <i class='bx bx-address'></i>
                </div>
                @error('name')
                    <div class="danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Phone</label>
                <div class="input-group">
                    <input type="text" id="name" name="phone" value="{{ old('phone') }}" placeholder="Your phone"
                        required>
                    <i class='bx bx-phone'></i>
                </div>
                @error('name')
                    <div class="danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-group">
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        placeholder="Email address" required>
                    <i class='bx bx-envelope'></i>
                </div>
                <span class="help-text">Email must be unique</span>
                @error('email')
                    <div class="danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <input type="password" pattern=".{8,}" id="password" name="password" value="{{ old('password') }}"
                        placeholder="Your password" required>
                    <i class='bx bx-lock-alt'></i>
                </div>
                <span class="help-text">At least 8 characters</span>
            </div>
            <div class="form-group">
                <label for="confirm-pass">Confirm password</label>
                <div class="input-group">
                    <input type="password" id="confirm-pass" name="password_confirmation" value="{{ old('password') }}"
                        placeholder="Enter password again" required>
                    <i class='bx bx-lock-alt'></i>
                </div>
                <span class="help-text">Confirm password must be same with password</span>
                @error('password')
                    <div class="danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="usertype">User Type</label>
                <div class="input-group">
                    <select id="usertype" name="usertype" required>
                        <option></option>
                        <option value="User">User</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>
            </div>
            <input type="submit" class="btn-submit" value="Register">
            <p>I already have an account. <a href="{{ route('auth-login-basic') }}">Login</a></p>
        </form>
    </div>
@endsection
