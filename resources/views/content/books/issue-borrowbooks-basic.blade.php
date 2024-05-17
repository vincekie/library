@extends('layouts/contentNavbarLayout')

@section('title', 'Issue Borrow Books')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/extended-ui-perfect-scrollbar.js')}}"></script>
@endsection

@section('content')


<hr class="my-5">

<!-- Responsive Table -->
<div class="card mt-3">
  <h5 class="card-header">Issue Borrow Request</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr class="text-nowrap">
          <th>#</th>
          <th>Name</th>
          <th>Book Name</th>
          <th>ISBN Number</th>
          <th>Genre</th>
          <th>Availability</th>
          <th>Due Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <tr>
          <th scope="row">1</th>
          <td>Table cell</td>
          <td>Table cell</td>
          <td>Table cell</td>
          <td>Table cell</td>
          <td>Table cell</td>
          <td>Table cell</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-like text-success me-1"></i> Accept</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-dislike text-danger me-1"></i> Reject</a>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Table cell</td>
          <td>Table cell</td>
          <td>Table cell</td>
          <td>Table cell</td>
          <td>Table cell</td>
          <td>Table cell</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-like text-success me-1"></i> Accept</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-dislike text-danger me-1"></i> Reject</a>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Table cell</td>
          <td>Table cell</td>
          <td>Table cell</td>
          <td>Table cell</td>
          <td>Table cell</td>
          <td>Table cell</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-like text-success me-1"></i> Accept</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-dislike text-danger  me-1"></i> Reject</a>
              </div>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<!--/ Responsive Table -->


<div class="mt-5"></div>
@endsection
