@extends('layouts/contentNavbarLayout')

@section('title', 'Add Books')

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

    <div class="mt-3">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookmodal">
            <span class="tf-icons bx bx-book-add me-1"></span>Add Book
        </button>

        <!--Create Book Modal -->z
        <div class="modal fade" id="bookmodal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- Dismissible "x" button -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <!-- End of Dismissible "x" button -->
                        <form id="book-register">
                            @csrf
                            <h5 class="modal-title" id="exampleModalLabel1">User</h5>
                    </div>
                    <div class="modal-body">
                        <div id="book-errors" class="alert alert-danger" style="display: none;"></div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" value="{{ old('name') }}"
                                    placeholder="Enter Book Title" required>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label class="form-label">Author</label>
                                <input type="text" name="author" class="form-control" value="{{ old('address') }}"
                                    placeholder="Enter Book Author" required>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label class="form-label">Book Number</label>
                                <input type="text" name="book_number" class="form-control" value="{{ old('phone') }}"
                                    placeholder="Enter Book Number" required>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label class="form-label">Genre</label>
                                <input type="text" name="genre" class="form-control" value="{{ old('email') }}"
                                    placeholder="Enter Book Genre" required>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label class="form-label">Status</label>
                                <select name="availability_status" class="form-select" required>
                                    <option></option>
                                    <option value="available">Available</option>
                                    <option value="not_available">Not Available</option>
                                </select>
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
    </div>

    <!--Edit Modal-->
    <div class="modal fade" id="edit-book-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- Dismissible "x" button -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <!-- End of Dismissible "x" button -->
                    <form id="update-book-new">
                        @csrf
                        <h5 class="modal-title" id="exampleModalLabel1">User</h5>
                </div>
                <div class="modal-body">
                    <div id="book-errors" class="alert alert-danger" style="display: none;"></div>
                    <input type="hidden" id="bookId" name="book_id">
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" id="title" name="title" class="form-control"
                                placeholder="Enter Book Title" required>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label class="form-label">Author</label>
                            <input type="text" id="author" name="author" class="form-control"
                                placeholder="Enter Book Author" required>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label class="form-label">Book Number</label>
                            <input type="text" id="book_number" name="book_number" class="form-control"
                                placeholder="Enter Book Number" required>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label class="form-label">Genre</label>
                            <input type="text" id="genre" name="genre" class="form-control"
                                placeholder="Enter Book Genre" required>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label class="form-label">Status</label>
                            <select id="availability_status" name="availability_status" class="form-select" required>
                                <option></option>
                                <option value="Available">Available</option>
                                <option value="Not_Available">Not_Available</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="update-book" class="btn btn-primary" data-book-id="">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <table id="book-table" class="cell-border" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Author</th>
                <th>Book Number</th>
                <th>Genre</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                @include('_partials.book_row')
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Author</th>
                <th>Book Number</th>
                <th>Genre</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
    <div class="mt-5"></div>
@endsection
