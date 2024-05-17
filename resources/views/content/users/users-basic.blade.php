@extends('layouts/contentNavbarLayout')

@section('title', 'Add Users')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/extended-ui-perfect-scrollbar.js') }}"></script>
@endsection

@section('content')


    <hr class="my-5">
    <div class="mt-0">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
            <span class="tf-icons bx bx-user-plus me-1"></span>Add User
        </button>

        <!-- Create Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document"> <!-- Centered modal and wider -->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <form id="register-form">
                            @csrf
                    </div>
                    <div class="modal-body">
                        <div id="registration-errors" class="alert alert-danger" style="display: none;"></div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                    placeholder="Enter Name" required>
                            </div>
                            <div class="col">
                                <label class="form-label">Address</label>
                                <input type="text" name="address" class="form-control" value="{{ old('address') }}"
                                    placeholder="Enter Address" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}"
                                    placeholder="Enter Phone" required>
                            </div>
                            <div class="col">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                    placeholder="Enter Email" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Usertype</label>
                                <select name="usertype" class="form-select" required>
                                    <option></option>
                                    <option value="Admin">Admin</option>
                                    <option value="User">User</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <label class="form-label">Password</label>
                            <input type="password" pattern=".{8,}" name="password" class="form-control"
                                value="{{ old('password') }}" placeholder="Enter Password" required>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    value="{{ old('password') }}" placeholder="Enter Password Again" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="register-button" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="mt-0">
            <div class="modal fade" id="edit-modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <!-- Centered modal and wider -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <form id="edit-form">
                                @csrf
                        </div>
                        <input type="hidden" id="userId" name="user_id">
                        <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label">Name</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        placeholder="Enter Name" required>
                                </div>
                                <div class="col">
                                    <label class="form-label">Address</label>
                                    <input type="text" id="address" name="address" class="form-control"
                                        placeholder="Enter Address" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label">Phone</label>
                                    <input type="text" id="phone" name="phone" class="form-control"
                                        placeholder="Enter Phone" required>
                                </div>
                                <div class="col">
                                    <label class="form-label">Email</label>
                                    <input type="email" id="email" name="email" class="form-control"
                                        placeholder="Enter Email" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label">Usertype</label>
                                    <select name="usertype" id="usertype" class="form-select" required>
                                        <option></option>
                                        <option value="Admin">Admin</option>
                                        <option value="User">User</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer mt-0">
                            <button type="button" class="btn btn-outline-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="update-btn" class="btn btn-primary update-btn"
                                data-user-id="">Update</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <table id="example" class="cell-border" style="width:100%">
        <!-- Table Headings -->
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Usertype</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <!-- Table Body -->
        <tbody>
            @foreach ($users as $user)
                @include('_partials.user_row', ['users' => $user])
            @endforeach
        </tbody>
        <!-- Table Footer -->
        <tfoot>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Usertype</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
    <div class="mt-5"></div>
@endsection
